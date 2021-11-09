<!DOCTYPE html>
<html  lang="zxx">
    <head>
        <?php $this->load->view('site/head');?>
    </head>
    <body>
		<!-- preloader -->
		<!-- <div class="preloader">
			<div class="loader">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
			</div>
		</div> -->
		<!-- /preloader -->
		<header class="navigation">
				<?php $this->load->view('site/header')?>
		</header>

		<div class="custom-contentz">
			<?php if(isset($message)):?>
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>

						</div>
						<div class="modal-body">
						<p><h3 class="nontification"><?php echo $message?></h3></p>
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

					</div>
				</div>

			<?php endif;?>
			<?php $this->load->view($temp , $this->data);?>
			<button onclick="topFunction()" id="myBtn" title="Go to top"><img width="30px" src="<?php echo public_url()?>site/images/ot.png" alt="đọc truyện cafe sữa, cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></button>
		</div>

		<div class="clear"></div>
		<!-- Modal -->
		<!-- <div class="modal fade zoom-in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
					</div>
					<div class="modal-body">
						Vì miếng cơm mah áo, vì để nhóm admin có tiền mua áo mới huynh đài click một quảng cáo là đã góp phần giúp admin có áo mới :)))
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div> -->
		<footer class="bg-secondary">
				<?php $this->load->view('site/footer');?>
		</footer>

	<!-- Bootstrap JS -->
	<script src="<?php echo public_url()?>site/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- slick slider -->
	<script src="<?php echo public_url()?>site/plugins/slick/slick.min.js"></script>
	<!-- masonry -->
	<script src="<?php echo public_url()?>site/plugins/masonry/masonry.js"></script>
	<!-- instafeed -->
	<script src="<?php echo public_url()?>site/plugins/instafeed/instafeed.min.js"></script>
	<!-- headroom -->
	<script src="<?php echo public_url()?>site/plugins/headroom/headroom.js"></script>
	<!-- reading time -->
	<script src="<?php echo public_url()?>site/plugins/reading-time/readingTime.min.js"></script>

	<!-- Main Script -->
	<script src="<?php echo public_url()?>site/js/script.js"></script>
	<script src="<?php echo public_url()?>site/js/autocomplete.js"></script>
	<script type="text/javascript" src="<?php echo public_url()?>site/js/jquery.lazyload.min.js"></script>
	<script type="text/javascript">
		// jQuery(document).ready(function(){
		// 	jQuery('*').bind('cut copy paste contextmenu', function (e) {
		// 		e.preventDefault();
		// 	})
		// 	$("#exampleModal").modal('show');
		// });

		// //block f12 key
		// $(document).keydown(function (event) {
		// 	if (event.keyCode == 123) { // Prevent F12
		// 		return false;
		// 	} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
		// 		return false;
		// 	}
		// });
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() { scrollFunction() };

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			window.scrollTo({ top: 0, behavior: 'smooth' });
		}
		jQuery(function() {
			jQuery("img.img-fluid").lazyload({
			effect : "fadeIn",
			threshold : 500
			});
		});
	</script>
    </body>
</html>