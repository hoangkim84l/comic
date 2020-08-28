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
			<h3 class="nontification"><?php echo $message?></h3>
			<?php endif;?>
			<?php $this->load->view($temp , $this->data);?>
		</div>
		
		<div class="clear"></div>
		
		<footer class="bg-secondary">
				<?php $this->load->view('site/footer');?>
		</footer>
	<!-- jQuery -->
	<script src="<?php echo public_url()?>site/plugins/jQuery/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo public_url()?>site/plugins/bootstrap/bootstrap.min.js"></script>
	<!-- slick slider -->
	<script src="<?php echo public_url()?>site/plugins/slick/slick.min.js"></script>
	<!-- masonry -->
	<script src="<?php echo public_url()?>site/plugins/masonry/masonry.js"></script>
	<!-- instafeed -->
	<script src="<?php echo public_url()?>site/plugins/instafeed/instafeed.min.js"></script>
	<!-- smooth scroll -->
	<script src="<?php echo public_url()?>site/plugins/smooth-scroll/smooth-scroll.js"></script>
	<!-- headroom -->
	<script src="<?php echo public_url()?>site/plugins/headroom/headroom.js"></script>
	<!-- reading time -->
	<script src="<?php echo public_url()?>site/plugins/reading-time/readingTime.min.js"></script>

	<!-- Main Script -->
	<script src="<?php echo public_url()?>site/js/script.js"></script>	       
    </body>
</html>