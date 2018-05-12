<?php 
include_once("classmusic.php");
$mm= new MyMusic;
$showListDaMua= $mm->showListDaMua($_SESSION['user']);
$n = mysqli_num_rows($showListDaMua);


?>

<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>    
<script type="text/javascript" src="js/musicplayer.js"></script>


<div class="clearfix"></div>
<?php 
if(isset($_SESSION['user'])){

  ?>
  <div class="container-fluid ">
    <div class="row">
      <h2 style="color:white; margin-top: 20px; margin-left: 230px;">Vui lòng click chọn bài hát để play</h2>
      <div class="example col-sm-push-2 col-sm-6">

        <div class="playlist">
          

          <table class="table table-condensed table-fixed" >

           <tbody>

            <?php
            if($n>0){

            $i = 1;
            while($rowMusic = mysqli_fetch_array($showListDaMua)){

              

                ?>
                <tr>
                  <td class="col-xs-10" >

                    <?php echo'<div data-cover="http://digital.akauk.com/utils/musicPlayer/data/dubstep.jpg" ><a href="http://docs.google.com/uc?export=open&id='.$rowMusic['fieldsid'].'&type=.wav"></a>'.$i.". ".$rowMusic['tenBaiHat']."-".$rowMusic['caSi'].' </div>'
                    ?>
                  </td>
                  <td class="col-xs-2">
                    <?php echo '<a href="http://docs.google.com/uc?export=open&id='.$rowMusic['fieldsid'].'&type=.wav" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>'
                    ?>
                  </td>
                </tr>
                

                <?php $i++; } 

                      } else echo "<h3 class='text-center'>Bạn chưa mua bài hát nào</h3>";
                       ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="col-sm-7 col-sm-push-3" id="girl">

        <div class="headphone">
          <img src="./images/girl.png" alt="girl">
        </div>

      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->

  <script>
    $(".example").musicPlayer({
      playlistItemSelector: 'div',
      elements: ['artwork', 'information', 'controls', 'progress', 'time'], 
    });




  </script>

  <?php } else echo '<div class="button outline-inward""><h2 style="color:#333;">Xin lỗi bạn chưa đăng nhập!</h2></div>'; ?>


