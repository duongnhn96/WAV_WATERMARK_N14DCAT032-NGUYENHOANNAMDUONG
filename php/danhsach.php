<?php
include_once("classmusic.php");
$mm= new MyMusic;
$showMusic= $mm->showMusic();
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 180);
?>
<div class="about">

	<div class="top">

		<div class="col-md-5" id="hover">

			<div class="hover1">
				<h2>Bạn cần biết! </h2>
				<p>Để tải hoặc nghe được nhạc bạn cần đăng nhập và chọn mua bài hát dưới đây, bài hát sẽ tự động cập nhật về danh sách "Nhạc của tui". Nhạc sau khi download đã được watermasrk tên bạn vui lòng không share dưới mọi hình thức để đảm bảo bản quyền cho tác giả!</p>
				<a href="<?php echo $url_host;?>Nhac-cua-tui.html" class="button outline-inward">Nhạc của tui</a>
			</div>

		</div>

		<div class="col-md-4 col-sm-push-2" id="hover">

			

			<img src="./images/girl.png" alt="girl">
			
			
		</div>
		
		<div class="clearfix"></div>
		<div class="container-fluid">
			<table class="table table-condensed  table-fixed table-list ">
				<thead>
					<tr>
						<th class="col-xs-1">#</th>
						<th class="col-xs-5">Tên Bài Hát</th>
						<th class="col-xs-4">Ca sĩ</th>
						<th class="col-xs-2">Trạng thái</th>
					</tr>
				</thead>
				<tbody class="dbody">
					<?php
					$i = 1;
					while($rowMusic = mysqli_fetch_array($showMusic)){ 


						echo "<tr> <td class=\"dbody col-xs-1\">" . $i . "</td>
						<td class=\"dbody col-xs-5\">" . $rowMusic['tenBaiHat'] . "</td>
						<td class=\"dbody col-xs-4\">" . $rowMusic['caSi'] . "</td>
						<td class=\"dbody col-xs-2\">";

						if (isset($_SESSION['user'])){
							if(($mm->checkListBuy($rowMusic['fieldspr'],$_SESSION['user']))==0){


								echo "<button id='".$rowMusic['id']."' class='muanhac'><img src='images/buy.png'/></button>";
							}
							else{
								echo "Đã mua";
							}
						}
						else{
							echo "Vui lòng đăng nhập";
						}
						echo "  </td>
						</tr>";
						$i++;
					}
					?>
				</tbody>
			</table>
		</div><!-- /.container -->
		<div class="clearfix"></div>

	</div>

	

</div>


<div class="clearfix"></div>


<script>
	(function ($) {
		"use strict";
		$('.column100').on('mouseover',function(){
			var table1 = $(this).parent().parent().parent();
			var table2 = $(this).parent().parent();
			var verTable = $(table1).data('vertable')+"";
			var column = $(this).data('column') + ""; 

			$(table2).find("."+column).addClass('hov-column-'+ verTable);
			$(table1).find(".row100.head ."+column).addClass('hov-column-head-'+ verTable);
		});

		$('.column100').on('mouseout',function(){
			var table1 = $(this).parent().parent().parent();
			var table2 = $(this).parent().parent();
			var verTable = $(table1).data('vertable')+"";
			var column = $(this).data('column') + ""; 

			$(table2).find("."+column).removeClass('hov-column-'+ verTable);
			$(table1).find(".row100.head ."+column).removeClass('hov-column-head-'+ verTable);
		});
		$(".muanhac").click(function(){
			$("*").css("cursor", "wait");
			var buysongid = $(this).attr("id");
			$.ajax({
				url: "php/check.php",
				type: "GET",
				data: { buysongid : buysongid },
				success : function(response){
					$("*").css("cursor", "default");
					if (response == "buy success"){
						alert("Bạn đã mua thành công!");
						window.location="";
					}
					else {
						alert(response);
						window.location="";
					}
				}
			});
		});


	})(jQuery);

</script>