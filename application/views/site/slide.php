<div class="py-6 md:px-6">
	<?php
		$count = 0;
		intval($count);
		foreach ($data_slides as $data) :
			if ($data->status == 0) {
			} else {
				$count++;
				if ($count > 1) break;
		?>
	<div style="box-shadow:inset 0 0 13em 3em black; background-image:url(<?php echo $data->image_link != '' ? base_url('upload/stories/' . $data->image_link) :  base_url('upload/stories/default.jpg') ?>)" class="flex h-80 w-full flex-row items-end rounded-3xl bg-cover bg-center transition-all duration-500 ease-in-out md:h-72 lg:h-80">
		<div class="space-y-6 p-12">
			<p class="text-3xl font-bold text-white antialiased drop-shadow-2xl lg:text-4xl">
				<?php echo $data->name; ?>
			</p>
			<div class="flex w-min cursor-pointer flex-row items-center space-x-2 rounded-full bg-teal-400 px-6 py-2 text-lg font-semibold text-white shadow-lg shadow-teal-500 transition hover:scale-105 hover:bg-teal-500 hover:shadow-teal-600">
				<span class="sub-text">Khám phá</span>
			</div>
		</div>
		<div class="ml-auto inline-flex space-x-4 py-12 pr-6 xl:hidden">
			<div class="cursor-pointer rounded-full bg-white p-2 shadow-xl shadow-indigo-200 transition hover:bg-gray-200">
				<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-800" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
					<line x1="19" y1="12" x2="5" y2="12"></line>
					<polyline points="12 19 5 12 12 5"></polyline>
				</svg>
			</div>
			<div class="cursor-pointer rounded-full bg-white p-2 shadow-xl shadow-indigo-200 transition hover:bg-gray-200">
				<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-800" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
					<line x1="5" y1="12" x2="19" y2="12"></line>
					<polyline points="12 5 19 12 12 19"></polyline>
				</svg>
			</div>
		</div>
		<div class="ml-auto hidden py-12 xl:inline-flex">
			<div class="flex flex-row items-center space-x-6 rounded-l-3xl bg-white/30 p-5 backdrop-blur-xl backdrop-brightness-150 transition-all">
				<img class="aspect-[16/9] w-32 animate-pulse cursor-pointer rounded-xl object-cover transition hover:scale-105" src="../img.animeworld.tv/slider/90.png" alt="" /><img class="aspect-[16/9] w-32 cursor-pointer rounded-xl object-cover transition hover:scale-105" src="../img.animeworld.tv/slider/101.png" alt="" />
				<div class="cursor-pointer rounded-full bg-white p-2 shadow-xl shadow-indigo-200 transition hover:bg-gray-200">
					<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-800" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
						<line x1="5" y1="12" x2="19" y2="12"></line>
						<polyline points="12 5 19 12 12 19"></polyline>
					</svg>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	endforeach;
	?>
</div>