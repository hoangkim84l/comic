<div class="w-full p-6 md:p-10">
  <div class="flex-row items-center md:pr-6">
    <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
      <?php $this->load->view('site/menu-mobile', $this->data); ?>
      <div class="py-6 md:px-6">
        <!-- page-title -->
        <section class="section bg-secondary section-detail">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h4><?php echo $catalog->name ?></h4>
                <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
                  <li property="itemListElement" typeof="ListItem">
                    <meta property="position" content="1" />
                    <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url() ?>">
                      <span itemprop="title" property="name">Trang chủ / </span>
                    </a>
                  </li>
                  <li property="itemListElement" typeof="ListItem">
                    <meta property="position" content="2" />
                    <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url() ?>danh-muc/<?php echo $catalog->id ?>">
                      <span itemprop="title" property="name"><?php echo $catalog->name ?></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- /page-title -->
        <!-- category post -->
        <section>
          <div class="container">
            <div class="row">
              <div class="col-lg-12"><br />
                <p><?php echo $catalog->description ?></p>
                <br />
              </div>
            </div>
            <div class="row">
              <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-4 2xlc:grid-cols-5 3xlc:grid-cols-6">
                <?php foreach ($list_story as $story_new) : if ($story_new->status == 0) {
                  } else { ?>
                    <div style="background:url(<?php echo $story_new->image_link != '' ? base_url('upload/stories/' . $story_new->image_link) :  base_url('upload/stories/default.jpg') ?>) no-repeat center center;background-size:cover" class="flex aspect-[2/3] h-56 cursor-pointer flex-col rounded-3xl bg-cover transition hover:scale-105 hover:saturate-150 lg:h-72">
                      <div class="grow p-4">
                        <div class="w-min rounded-full bg-indigo-500 py-1 px-5 text-white"><?php echo get_year($story_new->created); ?> </div>
                      </div>
                      <div class="text-md w-full rounded-b-3xl bg-black/70 py-4 px-2 text-center font-medium text-white backdrop-opacity-50">
                        <span class="line-clamp-2"><a href="<?php echo site_url('xem-truyen/' . $story_new->slug . '/' . $story_new->id) ?>"><?php echo $story_new->name; ?></a></span>
                      </div>
                    </div>
                <?php }
                endforeach; ?>
              </div>
            </div>
            <div class="row">
              <br/>
              <h6 class="mb-4">Thể loại</h6>
              <ul class="list-inlin tag-list">
                <?php foreach ($catalogs as $row_catalog) : ?>
                  <li class="sub-text mr-2 mb-10 w-min rounded-l-3xl rounded-tr-3xl bg-teal-400 px-3 py-2 text-white shadow-lg shadow-teal-200 lg:inline-flex"><a href="<?php echo site_url('danh-muc/' . $row_catalog->slug . '/' . $row_catalog->id) ?>"><?php echo $row_catalog->name ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </section>
        <!-- /category post -->
      </div>
    </div>
  </div>
</div>