<script src="js/jquery-1.9.1.min.js"></script>
<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
$conn = new PDO("mysql:host=localhost;dbname=musicbyduong;charset=utf8", "root", "");
ini_set('memory_limit', '-1');

if (isset($_SESSION['user']) && $_SESSION['role']=="1"){

  if(isset($_POST['upfilebtn1']) && isset($_POST['upfilesinger']) && isset($_POST['upfilesong'])){
    $fileName = $_FILES["upfile1"]["tmp_name"];
    $fileType = strtolower($_FILES['upfile1']['type']);

    if ($fileType == "audio/wav"){

      require_once 'google-api-php-client-2.2.1/vendor/autoload.php';
      $client = new Google_Client();
      putenv('GOOGLE_APPLICATION_CREDENTIALS=google-api-php-client-2.2.1/service_account_keys.json');
      $client = new Google_Client();
      $client->addScope(Google_Service_Drive::DRIVE);
      $client->useApplicationDefaultCredentials();
      $service = new Google_Service_Drive($client);

      $content = file_get_contents($fileName);
      $fileMetadata = new Google_Service_Drive_DriveFile(array('name' => mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $_POST['upfilesinger'] . " - " . $_POST['upfilesong'] . ".wav")));
      $file = $service->files->create($fileMetadata, array(
        'data' => $content,
        'mimeType' => 'audio/wav',
        'uploadType' => 'multipart',
        'fields' => 'id')); 
      $fileId = $file->id;
      unlink($fileName);
      $service->getClient()->setUseBatch(true);
      $batch = $service->createBatch();
      $filePermission = new Google_Service_Drive_Permission(array(
        'type' => 'anyone',
        'role' => 'reader',
      ));
      $request = $service->permissions->create($fileId, $filePermission, array('fields' => 'id'));
      $batch->add($request, 'anyone');
      $results = $batch->execute();
      $service->getClient()->setUseBatch(false);
      $fileUrl = "https://drive.google.com/file/d/" . $fileId . "/view?usp=sharing";
      $qr = $conn->prepare("insert into music (tenBaiHat, caSi, nguoiSoHuu, link, fieldsid,fieldspr) values (:song, :singer, 'admin',:url,:id, :parentid);");
      $qr->bindParam(":id", $fileId, PDO::PARAM_STR);
      $qr->bindParam(":parentid", $fileId, PDO::PARAM_STR);
      $qr->bindParam(":song", $_POST['upfilesong'], PDO::PARAM_STR);
      $qr->bindParam(":singer", $_POST['upfilesinger'], PDO::PARAM_STR);
      $qr->bindParam(":url", $fileUrl, PDO::PARAM_STR);
      $qr->execute();
      echo '<script>alert("Đã tải lên thành công!")</script>';

    }
  }

}
?>
<div class="content">
<div class="artists " id="artists">

  <h3 style="padding-bottom: 0px;">UPLOAD AUDIO ( .WAV ONLY) </h3>

  <div class="col-sm-10 pull-right" id="profile">   

    <div class="container-fluid">

      <form class="uploadnewsong" action="" method="post" enctype="multipart/form-data" >

        <div class="form-group row">
          <div class="col-xs-7">
           <input id="upfile-song" class="form-control input-lg" name="upfilesong" type="text" placeholder="Tên bài hát" />
         </div>
       </div>

       <div class="form-group row">
        <div class="col-xs-7">
         <input id="upfile-singer" class="form-control input-lg" name="upfilesinger" type="text" placeholder="Ca sĩ" />
       </div>
     </div>

     <span class="input-group-btn">
      <div class="btn btn-default btn-lg">

        <input id="upfile-input-file-1" name="upfile1" type="file" accept='audio/wav'/>

      </div>
    </span>
    <div class="col-sm-6 pull-left">
    <button class="button outline-inward" name="upfilebtn1">UPLOAD</button>
    </div>

  </form>
</div><!-- /.container -->

</div>
</div>

</div><!-- /.content -->
<div class="clearfix"></div>