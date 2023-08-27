<div class="flex flex-row items-center md:pr-6">
	<div class="mr-6 self-center text-left">
		<div class="relative inline-block text-left">
			<div>
				<button id="menu-mobile" class="inline-flex justify-center rounded-full bg-indigo-500 px-4 py-2 shadow-xl shadow-indigo-100 transition hover:scale-105 hover:bg-indigo-600 hover:shadow-indigo-200 focus:outline-none md:hidden" id="headlessui-menu-button-undefined" type="button" aria-haspopup="true" aria-expanded="false"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="text-white" aria-hidden="true" height="25" width="25" xmlns="http://www.w3.org/2000/svg" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-30">
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				</button>
			</div>
		</div>
	</div>
	<div class="sub-text mr-10 hidden w-min rounded-l-3xl rounded-tr-3xl bg-teal-400 px-3 py-2 text-xl font-bold text-white shadow-lg shadow-teal-200 lg:inline-flex">
		Hello bồ!</div>
	<div class="relative z-50 mt-1 w-full md:w-2/5">
		<div class="relative w-full cursor-default overflow-hidden rounded-full bg-white text-left focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm">
			<form id="frm-search" class="form-inline position-relative ml-lg-4" action="<?php echo site_url('truyen/tim-kiem-truyen') ?>" method="get">
				<input type="text" autoComplete="off" class="w-full border-none bg-gray-300 py-3 pl-3 pr-10 text-sm leading-5 text-gray-800 outline-none focus:ring-0" placeholder="Huynh đài tìm truyện nào..." value="<?php echo isset($key) ? $key : '' ?>" name="key-search" id="text-search" role="combobox" aria-expanded="false" />
				<button class="absolute inset-y-0 right-0 flex items-center pr-3" id="headlessui-combobox-button-undefined" type="button" tabindex="-1" aria-haspopup="true" aria-expanded="false">
					<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
						<circle cx="11" cy="11" r="8"></circle>
						<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
					</svg>
				</button>
			</form>
		</div>
	</div>
</div>