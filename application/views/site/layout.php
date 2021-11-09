<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('site/head-v2');?>
    </head>
    <body>
		<div class="wrapper">
			<!-- Sidebar Holder -->
			<nav id="sidebar">
				<?php $this->load->view('site/left');?>
			</nav>

			<!-- Page Content Holder -->
			<div id="main-content">

				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">

						<button type="button" id="sidebarCollapse" class="navbar-btn">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fas fa-align-justify"></i>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="col-lg-12 search-form-normal">
								<form id="frm-search" class="form-inline position-relative ml-lg-4" action="<?php echo site_url('truyen/tim-kiem-truyen')?>" method="get">
									<input class="form-control px-0 w-100 typeahead " type="search" autocomplete="off" placeholder="Tìm kiếm truyện..." value="<?php echo isset($key) ? $key : ''?>" name="key-search" id="text-search">
									<button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button>
								</form>
							</div>
						</div>
					</div>
				</nav>
				<?php if(isset($message)):?>
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
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
		</div>





















	<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
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