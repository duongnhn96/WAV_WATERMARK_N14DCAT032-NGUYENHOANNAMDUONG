<?php session_start();
include_once("../classmusic.php"); 
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 180);
$conn = new PDO("mysql:host=localhost;dbname=musicbyduong;charset=utf8", "root", "");
if (isset($_SESSION['user'])){
	require_once '../google-api-php-client-2.2.1/vendor/autoload.php';
	$client = new Google_Client();
	putenv('GOOGLE_APPLICATION_CREDENTIALS=../google-api-php-client-2.2.1/service_account_keys.json');
	$client = new Google_Client();
	$client->addScope(Google_Service_Drive::DRIVE);
	$client->useApplicationDefaultCredentials();
	$service = new Google_Service_Drive($client);


	$id = $_GET["buysongid"]; 
	$qr = $conn->prepare("select tenBaiHat, caSi,fieldsid from music where id = :id limit 1;");
	$qr->bindParam(":id", $id, PDO::PARAM_STR);
	$qr->execute();
	$rs_songandsinger = $qr->fetch();
	$fileId=$rs_songandsinger['fieldsid'];
	$fileName = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $rs_songandsinger['tenBaiHat'] . ' - ' . $rs_songandsinger['caSi'] . ' - ' . bin2hex(random_bytes(16)) . '.wav');

	$content = $service->files->get($fileId, array("alt" => "media"));
	if (!is_dir("music/")){
		mkdir("music/", 0777);
	}
	$outHandle = fopen("music/" . $fileName, "w+");
	while (!$content->getBody()->eof()) {
		fwrite($outHandle, $content->getBody()->read(1024));
	}
	fclose($outHandle);

	if (file_exists("music/" . $fileName)){ 

		$wavFile = new WavFile;
		$tmp = $wavFile->ReadFile("music/" . $fileName);
		unlink("music/" . $fileName);
		function TexttoBin($text){
			$bin = "";
			for($i = 0; $i < strlen($text); $i++)
				$bin .= str_pad(decbin(ord($text[$i])), 8, '0', STR_PAD_LEFT);
			return $bin;
		}

		$signature = TexttoBin(str_pad(strlen($_SESSION['user']), 10, '0', STR_PAD_LEFT) . $_SESSION['user']);

		$subchunk3data = unpack("H*", $tmp['subchunk3']['data']);
		if (strlen($subchunk3data[1]) >= strlen($signature)){
			for($i = 0; $i < strlen($signature); $i++){
				$newhex = str_pad(dechex(bindec(substr_replace(str_pad(hex2bin(substr($subchunk3data[1], $i*2, 2)), 8, '0', STR_PAD_LEFT), substr($signature, $i, 1), 7, 1))), 2, '0', STR_PAD_LEFT);
				$subchunk3data[1] = substr_replace($subchunk3data[1], $newhex, $i*2, 2);
			}

			$tmp['subchunk3']['data'] = pack("H*", $subchunk3data[1]);
			$newFileName = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $rs_songandsinger['caSi'] . ' - ' . $rs_songandsinger['tenBaiHat'] . ' - ' . $_SESSION['user'] . '.wav');
			$wavFile->WriteFile($tmp, "music/" . $newFileName);

			if (file_exists("music/" . $newFileName)){

				$newContent = file_get_contents("music/" . $newFileName);
				$fileMetadata = new Google_Service_Drive_DriveFile(array('name' => $newFileName));
				$file = $service->files->create($fileMetadata, array(
					'data' => $newContent,
					'mimeType' => 'audio/wav',
					'uploadType' => 'multipart',
					'fields' => 'id'));
				$newFileId = $file->id;
				unlink("music/" . $newFileName);

				$service->getClient()->setUseBatch(true);
				$batch = $service->createBatch();
				$newFilePermission = new Google_Service_Drive_Permission(array(
					'type' => 'anyone',
					'role' => 'reader',
				));
				$request = $service->permissions->create($newFileId, $newFilePermission, array('fields' => 'id'));
				$batch->add($request, 'anyone');
				$results = $batch->execute();
				$service->getClient()->setUseBatch(false);
				$newFileUrl = "https://drive.google.com/file/d/" . $newFileId . "/view?usp=sharing";

				$qr = $conn->prepare("insert into music ( fieldsid,fieldspr, tenBaiHat, caSi, link, nguoiSoHuu) values (:id, :parentid, :song, :singer, :url, :owner);");
				$qr->bindParam(":id", $newFileId, PDO::PARAM_STR);
				$qr->bindParam(":parentid", $fileId, PDO::PARAM_STR);
				$qr->bindParam(":song", $rs_songandsinger['tenBaiHat'], PDO::PARAM_STR);
				$qr->bindParam(":singer", $rs_songandsinger['caSi'], PDO::PARAM_STR);
				$qr->bindParam(":url", $newFileUrl, PDO::PARAM_STR);
				$qr->bindParam(":owner", $_SESSION['user'], PDO::PARAM_STR);

				$qr->execute();
				echo "buy success";
			}
			else
				echo "Có lỗi xảy ra!";
		}
		else
			echo "Có lỗi xảy ra!";
	}else
	echo "Có lỗi xảy ra!";
}
else
	echo "Có lỗi xảy ra!";
?>