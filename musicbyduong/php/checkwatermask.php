<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
$conn = new PDO("mysql:host=localhost;dbname=musicbyduong;charset=utf8", "root", "");
ini_set('memory_limit', '-1');

if(isset($_POST['upfilebtn'])){
  $fileName = $_FILES["upfile"]["tmp_name"];
  $fileType = strtolower($_FILES['upfile']['type']);

  if ($fileType == "audio/wav"){
    $wavFile = new WavFile;
    $tmp = $wavFile->ReadFile($fileName);
    unlink($fileName);
    function BintoText($bin){
      $text = "";
      for($i = 0; $i < strlen($bin)/8 ; $i++)
        $text .= chr(bindec(substr($bin, $i*8, 8)));
      return $text;
    }

    $subchunk3data = unpack("H*", $tmp['subchunk3']['data']);

    $signature = "";
    for($i = 0; $i < 80; $i++){
      $signature .= substr(str_pad(base_convert(substr($subchunk3data[1], $i*2, 2), 16, 2), 8, '0', STR_PAD_LEFT), 7, 1);
    }
    $lenofsigndat = BintoText(substr($signature, 0, 80));
    if (is_numeric($lenofsigndat)){
      for($i = 80; $i < 80+$lenofsigndat*8; $i++){
        $signature .= substr(str_pad(base_convert(substr($subchunk3data[1], $i*2, 2), 16, 2), 8, '0', STR_PAD_LEFT), 7, 1);
      }
      $signdat = BintoText(substr($signature, 80, $lenofsigndat*8));
    }
  }
} 

?>



<div class="col-md-8" id="girl">

  <div class="headphone">
    <img src="./images/girl.png" alt="girl">
  </div>

</div>
<div class="artists " id="artists">

  <h3 style="padding-bottom: 0px;">Kiểm tra WaterMask file WAV</h3>

  <div class="col-sm-8 pull-right" id="profile">   

    <div class="input-group">
      <form class="getsignature" action="" method="post" enctype="multipart/form-data" ">

        <div class="row">

         <span class="input-group-btn">
          <div class="btn btn-default btn-lg">
            <input id="upfile-input-file" name="upfile" type="file" accept='audio/wav' />
          </div>
        </span>
        <button class="button outline-inward" name="upfilebtn">CHECK IT</button>
      </div>
      <div class="row" style="margin: 15px; ">
        <?php 
        if(isset($_POST['upfilebtn'])){
          echo "<div class=\" text-center alert alert-" . ($signdat!="" ? "success" : "danger") . "\">" . ($signdat!="" ? $signdat : "Không tìm thấy Watermask trong file này!") . "</div>";
        }
        ?>
      </div><!-- /.row -->
    </form>

  </div>
</div>


</div>






