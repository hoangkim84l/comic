<?php
$this->load->model('chapter_model');
$this->load->model('catalog_model');
$this->load->model('story_model');
?>
<div class="w-full p-6 md:p-10">
  <div class="flex flex-row items-center md:pr-6">
    <div class="mr-6 self-center text-left">
      <div class="relative inline-block text-left">
        <div>
          <button class="inline-flex justify-center rounded-full bg-indigo-500 px-4 py-2 shadow-xl shadow-indigo-100 transition hover:scale-105 hover:bg-indigo-600 hover:shadow-indigo-200 focus:outline-none md:hidden" id="headlessui-menu-button-undefined" type="button" aria-haspopup="true" aria-expanded="false"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="text-white" aria-hidden="true" height="25" width="25" xmlns="http://www.w3.org/2000/svg"  aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-30">
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
  <?php $this->load->view('site/slide', $this->data); ?>
  <img class="h-16 translate-y-5 object-contain" src="<?php echo public_url() ?>site/images/zenitsu.png" alt="Zenitsu - Cafesuanovel" />
  <div class="space-y-6 md:px-6">
    <div class="flex-row space-x-4 2xl:flex">
      <div class="2xl:basis-9/12">
        <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
          <p class="text-3xl font-bold text-gray-700 antialiased">Chương mới cập bến.</p>
          <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-3 2xlc:grid-cols-3 3xlc:grid-cols-5">
            <?php foreach ($data_homes as $data_home) :
              if ($data_home->status == 0) {
              } else {
                $story = $this->story_model->get_info($data_home->story_id);
            ?>
                <div data-id="<?php echo $data_home->story_id ?>" style="background:url(<?php echo $story->image_link != '' ? base_url('upload/stories/' . $story->image_link) : base_url('upload/stories/default.jpg') ?>) no-repeat center center;background-size:cover" class="flex aspect-[2/3] h-56 cursor-pointer flex-col rounded-3xl bg-cover transition hover:scale-105 hover:saturate-150 lg:h-72">
                  <div class="grow p-4">
                    <?php
                    $input_chap = array();
                    $input_chap['limit'] = array(1, 0);
                    $input_chap['where'] = array('story_id' => $data_home->story_id);
                    $input_chap['order'] = array('created', 'DESC');
                    $final_chap = $this->chapter_model->get_list($input_chap);
                    foreach ($final_chap as $row) {
                      if ($row->status == 0) {
                      } else {
                    ?><a href="<?php echo site_url('truyen/' . $story->slug . '/' . $row->slug . '/' . $row->id) ?>">
                          <div class="th-dots w-min rounded-full bg-indigo-500 py-1 px-5 text-white"><?php echo $row->name ?></div>
                        </a>
                    <?php
                      }
                    }
                    ?>
                  </div>
                  <div class="text-md w-full rounded-b-3xl bg-black/70 py-4 px-2 text-center font-medium text-white backdrop-opacity-50">
                    <span class="line-clamp-2"><a href="<?php echo site_url('xem-truyen/' . $story->slug . '/' . $story->id) ?>"><?php echo $story->name; ?></a></span>
                  </div>
                </div>
            <?php }
            endforeach; ?>
          </div>
          <div class="flex space-x-2">
            <button class="rounded-full bg-indigo-500 p-2 text-xl text-white shadow-lg shadow-indigo-200 transition duration-200 hover:scale-105"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <a href="<?php echo site_url('truyen') ?>">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </a>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="hidden 2xl:inline 2xl:basis-1/4">
        <div class="w-full space-y-8 rounded-3xl bg-indigo-500 p-8">
          <p class="text-3xl font-bold text-white antialiased">Top Manga</p>
          <div class="grid grid-cols-1 space-y-6 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 2xl:grid-cols-1">
            <?php
            $i = 1;
            foreach ($story_views as $story_view) {
            ?>
              <div class="flex flex-row self-end">
                <div class="self-center rounded-l-xl border-y-4 border-l-4 border-indigo-200 px-3 py-2 text-2xl text-indigo-200">
                  <?php echo $i; ?>
                </div>
                <img class="h-40 cursor-pointer rounded-xl transition hover:scale-105 hover:saturate-150" src="<?php echo $story_view->image_link != '' ? base_url('upload/stories/' . $story_view->image_link) :  base_url('upload/stories/default.jpg') ?>" title="<?php echo $story_view->site_title; ?>" alt="<?php echo $story_view->meta_desc ?>" />
                <div class="inline-flex flex-col space-y-1 pl-4 2xl:hidden 3xlc:inline-flex">
                  <span class="text-lg font-semibold text-white antialiased line-clamp-2">
                    <a href="<?php echo site_url('xem-truyen/' . $story_view->slug . '/' . $story_view->id) ?>">
                      <?php echo $story_view->name; ?>
                    </a>
                  </span>
                  <div class="flex flex-row">
                    <span class="mr-4 flex flex-row items-center text-white"> <!-- --><?php echo number_format($story_view->view); ?> lượt xem</span>
                  </div>
                </div>
              </div>
            <?php
              $i++;
            }
            ?>
            <img class="mx-auto h-72 object-contain" src="<?php echo public_url() ?>site/images/songoku.png" alt="Goku &amp; Vegeta - Cafesuanovel" />
          </div>
        </div>
      </div>
    </div>
    <div class="flex 2xl:hidden">
      <div class="w-full space-y-8 rounded-3xl bg-indigo-500 p-8">
        <p class="text-3xl font-bold text-white antialiased">Top Manga</p>
        <div class="grid grid-cols-1 space-y-6 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 2xl:grid-cols-1">
          <?php
          $i = 1;
          foreach ($story_views as $story_view) {
          ?>
            <div class="flex flex-row self-end">
              <div class="self-center rounded-l-xl border-y-4 border-l-4 border-indigo-200 px-3 py-2 text-2xl text-indigo-200">
                <?php echo $i; ?>
              </div>
              <img class="h-40 cursor-pointer rounded-xl transition hover:scale-105 hover:saturate-150" src="<?php echo $story_view->image_link != '' ? base_url('upload/stories/' . $story_view->image_link) :  base_url('upload/stories/default.jpg') ?>" title="<?php echo $story_view->site_title; ?>" alt="<?php echo $story_view->meta_desc ?>" />
              <div class="inline-flex flex-col space-y-1 pl-4 2xl:hidden 3xlc:inline-flex">
                <span class="text-lg font-semibold text-white antialiased line-clamp-2"><a href="<?php echo site_url('xem-truyen/' . $story->slug . '/' . $story->id) ?>"><?php echo $story_view->name; ?></a></span>
                <div class="flex flex-row">
                  <span class="mr-4 flex flex-row items-center text-white">
                    <svg stroke="currentColor" fill="white" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="mr-1" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                      <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                      </polygon>
                    </svg> <!-- --><?php echo number_format($story_view->view); ?> lượt xem</span>
                </div>
              </div>
            </div>
          <?php $i++;
          } ?>
          <img class="mx-auto h-72 object-contain" src="<?php echo public_url() ?>site/images/songoku.png" alt="Goku &amp; Vegeta - Cafesuanovel" />
        </div>
      </div>
    </div>
    <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
      <p class="text-3xl font-bold text-gray-700 antialiased">Truyện mới cập bến</p>
      <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-4 2xlc:grid-cols-5 3xlc:grid-cols-6">
        <?php foreach ($story_news as $story_new) { ?>
          <div style="background:url(<?php echo $story_new->image_link != '' ? base_url('upload/stories/' . $story_new->image_link) :  base_url('upload/stories/default.jpg') ?>) no-repeat center center;background-size:cover" class="flex aspect-[2/3] h-56 cursor-pointer flex-col rounded-3xl bg-cover transition hover:scale-105 hover:saturate-150 lg:h-72">
            <div class="grow p-4">
              <div class="w-min rounded-full bg-indigo-500 py-1 px-5 text-white"><?php echo get_year($story_new->created); ?> </div>
            </div>
            <div class="text-md w-full rounded-b-3xl bg-black/70 py-4 px-2 text-center font-medium text-white backdrop-opacity-50">
              <span class="line-clamp-2"><a href="<?php echo site_url('xem-truyen/' . $story_new->slug . '/' . $story_new->id) ?>"><?php echo $story_new->name; ?></a></span>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var found = {};
    jQuery('[data-id]').each(function() {
      var $this = $(this);
      if (found[$this.data('id')]) {
        $this.remove();
      } else {
        found[$this.data('id')] = true;
      }
    });
  });
</script>