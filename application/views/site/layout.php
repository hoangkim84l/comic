<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('site/head'); ?>
</head>

<body>
	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar" class="">
			<?php $this->load->view('site/left'); ?>
		</nav>

		<!-- Page Content Holder -->
		<main class="main-active">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<button id="sidebar-button" class="btn btn-primary btn-sm">
						<img alt="list-icon" src="<?php echo public_url() ?>site/assets/list.svg"><!--  toggle menu -->
					</button>
					<!--button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fas fa-align-justify"></i>
						</button-->

					<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="col-lg-12 search-form-normal">
								<form id="frm-search" class="form-inline position-relative ml-lg-4" action="<?php echo site_url('truyen/tim-kiem-truyen') ?>" method="get">
									<input class="form-control px-0 w-100 typeahead " type="search" autocomplete="off" placeholder="Tìm kiếm truyện..." value="<?php echo isset($key) ? $key : '' ?>" name="key-search" id="text-search">
									<button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button>
								</form>
							</div>
						</div> -->
				</div>
			</nav>
			<?php if (isset($message)) : ?>
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body">
								<p>
								<h3 class="nontification"><?php echo $message ?></h3>
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

			<?php endif; ?>
			<?php $this->load->view($temp, $this->data); ?>


	</div>
	<!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><img width="30px" src="<?php echo public_url() ?>site/images/ot.png" alt="đọc truyện cafe sữa, cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></button>
	<a class="go-to-homepage" title="Go to home page" href="https://cafesuanovel.com"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_05.png'); ?>" alt="cafe sữa novel"></a> -->
	</div>

	<script type="text/javascript">
		//  jQuery(document).ready(function(){
		//  	jQuery('*').bind('cut copy paste contextmenu', function (e) {
		//  		e.preventDefault();
		//  	})
		//  	$("#exampleModal").modal('show');
		//  });

		//block f12 key
		//  $(document).keydown(function (event) {
		//  	if (event.keyCode == 123) { // Prevent F12
		//  		return false;
		//  	} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
		// 		return false;
		//  	}
		//  });
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {
			scrollFunction()
		};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			window.scrollTo({
				top: 0,
				behavior: 'smooth'
			});
		}
		jQuery(function() {
			jQuery("img.img-fluid").lazyload({
				effect: "fadeIn",
				threshold: 500
			});
		});
	</script>
	<script src="<?php echo public_url() ?>site/js/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="<?php echo public_url() ?>site/js/bootstrap.min.js"></script>
    <script src="<?php echo public_url() ?>site/js/script.js"></script>
</body>

</html>