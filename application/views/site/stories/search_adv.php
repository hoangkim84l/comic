<div class="w-full p-6 md:p-10">
  <div class="flex flex-row items-center md:pr-6">
    <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
      <!-- page-title -->
      <section class="section bg-secondary">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h4>Tìm truyện nâng cao</h4>
            </div>
          </div>
        </div>
      </section>
      <!-- /page-title -->
      <div class="container-fluid">
        <div class="row">
          <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
              <meta property="position" content="1" />
              <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url() ?>">
                <span itemprop="title" property="name">Trang chủ / </span>
              </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
              <meta property="position" content="2" />
              <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('truyen/tim-nang-cao') ?>">
                <span itemprop="title" property="name"> Tìm truyện nâng cao</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!--Main seach-->
      <section class="section-search">
        <br />
        <div class="container">
          <form method="get" action="<?php echo site_url('stories/search_adv') ?>" class="w3-container">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Truyện huynh đài muốn tìn tên gì?</label>
                <input type="text" class="w3-input w3-animate-input" id="name" name="name" placeholder="Nhập tên truyện" value="<?php echo $this->input->get('name') ?>">
              </div>
              <div class="form-group col-md-6 mt-2">
                <div class="form-group col-md-6">
                  <label for="inputState">Trạng thái</label>
                  <select id="status" name="status" class="form-control">
                    <option <?php if ($this->input->get('status') == 0) {
                              echo "selected";
                            } ?> value="0">Còn tiếp...</option>
                    <option <?php if ($this->input->get('status') == 1) {
                              echo "selected";
                            } ?> value="1">Hoàn thành</option>
                    <option <?php if ($this->input->get('status') == 2) {
                              echo "selected";
                            } ?> value="2">Tạm dừng</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12 mt-2">
                <label for="inputState">Thể loại huynh đài muốn tìm</label>
              </div>
              <?php
              foreach ($catalogs as $row) : ?>
                <?php if (count($row->subs) > 1) : ?>
                  <optgroup label="<?php echo $row->name ?>">
                    <?php foreach ($row->subs as $sub) : ?>
                      <div class="form-check col-md-4">
                        <input type="checkbox" class="w3-check" id="exampleCheck1" value="<?php echo $sub->id ?>">
                        <label class="form-check-label" for="exampleCheck1"><?php echo $sub->name ?></label>
                      </div>
                    <?php endforeach; ?>
                  </optgroup>
                <?php else : ?>
                  <div class="form-group col-md-4">
                    <div class="form-check col-md-12">
                      <input <?php if (!empty($this->input->get('category_id')) && in_array($row->id, $this->input->get('category_id'))) echo 'checked'; ?> type="checkbox" class="w3-check" name="category_id[]" id="category_id" value="<?php echo $row->id ?>">
                      <label class="form-check-label" for="exampleCheck1"><?php echo $row->name ?></label>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <button type="submit" class="w3-btn w3-blue mt-2" style="width: 100%;">Kiếm nào</button>
          </form>
        </div>
      </section>
      <!-- category post -->
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="row masonry-container pt-5">
                <?php
                if (count($list) === 0) {
                  echo '<div class="col-lg-12 col-sm-6 mb-5">
                        <div class="row">
                          <div class="col-lg-12">
                            <h4 style="color:#FF8C33">Điều kiện huynh đài đưa ra hiện không có thử cái khác nha</h4>
                          </div>
                        </div>
                      </div>';
                } ?>
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-4 2xlc:grid-cols-5 3xlc:grid-cols-6">
                  <?php foreach ($list as $story_new) : if ($story_new->status == 0) {
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
            </div>
          </div>
        </div>
      </section>
      <!-- /category post -->

    </div>
  </div>
</div>