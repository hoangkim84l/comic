<div class="py-6 md:px-6">
	<div class="slider-position">
		<swiper-container class="mySwiper" pagination="true" effect="coverflow" grab-cursor="true" centered-slides="true" slides-per-view="auto" coverflow-effect-slide-shadows="true" autoplay-delay="2500" autoplay-disable-on-interaction="false" pagination-clickable="true" space-between="30">
			<?php
			foreach ($sliders as $row) :
				if ($row->status == 0) {
				} else {
			?>
					<swiper-slide>
						<a href="<?php echo site_url('xem-truyen/' . $row->slug . '/' . $row->id) ?>">
							<img src="<?php echo $row->image_link != '' ? base_url('upload/stories/' . $row->image_link) :  base_url('upload/stories/default.jpg') ?>" alt="cafesua novel" />
						</a>
					</swiper-slide>
			<?php
				}
			endforeach;
			?>
			<div class="autoplay-progress" slot="container-end">
				<svg viewBox="0 0 48 48">
					<circle cx="24" cy="24" r="20"></circle>
				</svg>
				<span></span>
			</div>
		</swiper-container>
	</div>
</div>