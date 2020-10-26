<!DOCTYPE html>
<html  lang="zxx">
    <head>
        <?php $this->load->view('site/head');?>
    </head>
    <body>
		<!-- preloader -->
		<div class="preloader">
			<div class="loader">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
			</div>
		</div>
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
			<button onclick="topFunction()" id="myBtn" title="Go to top"><img width="30px" src="<?php echo $support->logo != '' ? base_url('upload/logo/'.$support->logo) : base_url('upload/logo/default.jpg') ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></button>
		</div>
		
		<div class="clear"></div>
		
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
	<!-- smooth scroll -->
	<!-- <script src="<?php echo public_url()?>site/plugins/smooth-scroll/smooth-scroll.js"></script> -->
	<!-- headroom -->
	<script src="<?php echo public_url()?>site/plugins/headroom/headroom.js"></script>
	<!-- reading time -->
	<script src="<?php echo public_url()?>site/plugins/reading-time/readingTime.min.js"></script>

	<!-- Main Script -->
	<script src="<?php echo public_url()?>site/js/script.js"></script>	  
	<script src="<?php echo public_url()?>site/js/autocomplete.js"></script>	  
	<script type="text/javascript">
		jQuery(document).ready(function(){
		jQuery('*').bind('cut copy paste contextmenu', function (e) {
			e.preventDefault();
		})});
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
	</script>
    </body>
</html>