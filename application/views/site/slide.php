<section id="carouselCaptions" class="carousel slide carousel-fade" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
		<li data-target="#carouselCaptions" data-slide-to="1"></li>
		<li data-target="#carouselCaptions" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<?php
		$count = 0;
		intval($count);
		foreach ($data_slides as $data) :
			if ($data->status == 0) {
			} else {
				$count++;
				if ($count > 3) break;
		?>
				<div class="carousel-item active">
					<img src="<?php echo $data->image_link != '' ? base_url('upload/stories/' . $data->image_link) :  base_url('upload/stories/default.jpg') ?>" title="<?php echo $data->site_title; ?>" alt="<?php echo $data->meta_desc ?>">
					<div class="carousel-gradient-overlay">
						<div class="carousel-caption">
							<div class="carousel-content">
								<h1><?php echo $data->name; ?></h1>
								<p>Dr. Stone là một loạt manga Nhật Bản được viết bởi Riichiro Inagaki và minh họa bởi
									Boichi, đăng trên Weekly Shonen Jump từ ngày 06 tháng 3 năm 2017 với các chương đơn
									lẻ được thu thập...</p>
								<div class="carousel-tag"><span class="badge badge-pill badge-primary">English</span>

									<span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php
			}
		endforeach;
		?>
	</div>
</section>
