<div class="w-full p-2 md:p-10">
  <div class="py-6 md:px-6">
    <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
      <li property="itemListElement" typeof="ListItem">
        <meta property="position" content="1" />
        <a property="item" itemprop="url" typeof="website" href="<?php echo base_url() ?>">
          <span itemprop="title" property="name">Trang chủ / </span>
        </a>
      </li>
      <li property="itemListElement" typeof="ListItem">
        <meta property="position" content="2" />
        <a property="item" itemprop="url" typeof="website" href="<?php echo site_url('xem-truyen/' . $stories->slug . '/' . $stories->id) ?>">
          <span itemprop="title" property="name"> <?php echo $stories->name ?> </span>
        </a>
      </li>
    </ul>

    <div style="box-shadow:inset 0 0 8em 0.1em black;background-image:url(<?php echo public_url() ?>site/images/footer.png)" class="md:h-42 flex h-40 w-full flex-row items-end rounded-3xl bg-cover bg-center lg:h-48"></div>
    <div class="md:space-x-34 flex h-[84px] flex-row items-stretch space-x-32 space-y-4 lg:space-x-36 xl:h-[116px] xl:space-x-56">
      <img class="absolute top-48 left-10 h-36 rounded-xl shadow-xl md:top-52 md:left-[300px] lg:top-60 lg:left-[370px] xl:top-44  xl:h-60" src="<?php echo $stories->image_link != '' ? base_url('upload/stories/' . $stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $stories->meta_desc; ?>" title="<?php echo $stories->site_title; ?>" />
      <div class="inline-flex flex-row items-center space-x-8 rounded-xl bg-indigo-500 px-8 py-5 text-white">
        <div class="flex flex-col space-y-1">
          <div class="text-md font-semibold antialiased line-clamp-2 xl:text-2xl"><?php echo $stories->name ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="space-y-6 md:px-6">
    <div class="flex-row space-x-4 2xl:flex">
      <div class="space-y-4 2xl:basis-1/2">
        <div class="space-y-6 rounded-xl bg-white px-4 py-6"><span class="text-2xl font-bold text-gray-700">Nội dung truyện</span>
          <div class="flex flex-row items-stretch rounded-xl text-emerald-900">
            <div class="grid-cols-3 gap-2 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4">
              <div class="font-gray-700 cursor-pointer justify-center space-x-2 rounded-xl py-3 text-xs shadow-md shadow-indigo-100 transition hover:bg-indigo-200">
                <?php echo $stories->description; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="space-y-6 rounded-xl bg-indigo-500 p-6"><span class="text-2xl font-bold text-white">Thông Tin truyện</span>
          <div class="flex flex-col">
            <div class="flex flex-row space-x-6"><img class="w-32 rounded-xl object-contain shadow-xl" src="<?php echo $stories->image_link != '' ? base_url('upload/stories/' . $stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $stories->meta_desc; ?>" title="<?php echo $stories->site_title; ?>" />
              <div class="flex flex-col space-y-4"><span class="text-xl font-semibold text-white"><?php echo $stories->name ?></span>
                <div class="flex flex-row space-x-16">
                  <div class="flex flex-col"><span class="text-white">Up: <?php echo $stories->author ?></span>
                    <span class="text-white"><?php echo number_format($stories->view) ?> Lượt xem</span>
                  </div>
                  <div class="flex flex-col"><span class="text-white">Xuất bản: <?php
                                                                                $date = date_create($stories->created);
                                                                                echo date_format($date, 'd-m-Y H:i:s') ?></span>
                    <span class="text-white">Tình hình: <?php echo $stories->continues == 0 ?  "Còn tiếp" :  "Hoàn thành"; ?> </span>
                    <span class="text-white"><a class="text-white" href="<?php echo site_url('danh-sach-chuong/' . $stories->slug . '/' . $stories->id) ?>"><?php echo count($input_count) ?> Chương </a></span>
                  </div>
                </div>
                <p class="text-white">
                  <?php
                  $this->load->model('catalog_model');
                  $catalog = $this->catalog_model->get_list();
                  $cata = json_decode($stories->category_id);
                  foreach ($catalog as $data) {
                    if (in_array($data->id, $cata)) { ?>
                      <a class="new-links" href='<?php echo site_url('danh-muc/' . $data->slug . '/' . $data->id) ?>'><?php echo $data->name . "."; ?></a>
                  <?php }
                  }
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="space-y-6 rounded-xl bg-white px-4 py-6"><span class="text-2xl font-bold text-gray-700">Ý kiến của huynh đài</span>
          <div class="flex-row items-stretch rounded-xl text-emerald-900">
            <div class="grid-cols-3 gap-2 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4">
              <div class="font-gray-700 cursor-pointer justify-center space-x-2 rounded-xl py-3 text-xs shadow-md shadow-indigo-100 transition hover:bg-indigo-200">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- /blog single -->
                    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab-cafesua" data-toggle="tab" href="#home-cafesua" role="tab" aria-controls="home" aria-selected="true">
                          <img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;"> Bình luận ở đây nè</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab-facebook" data-toggle="tab" href="#profile-cafesua" role="tab" aria-controls="profile" aria-selected="false"> 
                          <img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;"> Bình luận với Facebook</a>
                      </li>
                    </ul> -->
                    <div class="tab-content" id="myTabContent">
                      <!-- <div class="tab-pane fade show active" id="home-cafesua" role="tabpanel" aria-labelledby="home-tab-cafesua">
                        <br />
                        <?php if (isset($user_info)) : ?>
                          <form action="<?php echo site_url('comment/storyHaveLogin'); ?>" class="row" method="POST" id="postComment" name="postComment">
                            <input type="hidden" class="form-control " name="user_id" id="user_id" value="<?php echo $user_info->id ?>">
                            <input type="hidden" class="form-control form-control-text col-lg-4" name="name" value="">
                            <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id ?>">
                            <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
                            <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                            <input type="text" class="form-control form-control-text col-lg-12" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">

                            <div class="form-group custom-sticker-p">
                              <div id="show-stiker-selected">
                                <img src="" alt="" id="stickerSelected" width="100px">
                                <span id="deleteStiker">Xóa sticker</span>
                              </div>
                              <br />
                              <input type='button' id='hideshow' value='Chọn sticker'>
                              <div id='content-a' style="display:none;">
                                <?php $listIcons = json_decode(file_get_contents(public_url('site/js/icon.json')));
                                foreach ($listIcons as $key => $val) {
                                ?>
                                  <div class="custom-icon">
                                    <img src="<?php echo $val; ?>" width="70px" data-key="<?php echo $key; ?>" data-src="<?php echo $val; ?>">
                                  </div>
                                <?php
                                } ?>
                              </div>
                            </div>
                            <div class="col-12">
                              <button class="btn btn-primary" id="clickClear">Lên Lên</button>
                            </div>
                          </form>
                        <?php else : ?>
                          <form action="<?php echo site_url('comment/story'); ?>" class="row" method="POST" id="postComment" name="postComment">
                            <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="">
                            <input type="text" class="form-control form-control-text col-lg-4" name="name" id="name" value="" placeholder=" Tên của bạn" required autocomplete="off">
                            <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id ?>">
                            <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
                            <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                            <br /> <br />
                            <input type="text" class="form-control form-control-text col-lg-12" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
                            <br />
                            <div class="form-group custom-sticker-p">
                              <div id="show-stiker-selected">
                                <img src="" alt="" id="stickerSelected" width="100px">
                                <span id="deleteStiker">Xóa sticker</span>
                              </div>
                              <br />
                              <input type='button' id='hideshow' value='Chọn sticker'>
                              <div id='content-a' style="display:none;">
                                <?php $listIcons = json_decode(file_get_contents(public_url('site/js/icon.json')));
                                foreach ($listIcons as $key => $val) {
                                ?>
                                  <div class="custom-icon">
                                    <img src="<?php echo $val; ?>" width="70px" data-key="<?php echo $key; ?>" data-src="<?php echo $val; ?>">
                                  </div>
                                <?php
                                } ?>
                              </div>
                            </div>
                            <div class="col-12">
                              <button class="btn btn-primary" id="clickClear">Lên Lên</button>
                            </div>
                          </form>
                        <?php endif; ?>
                        <br />
                        <div class="scrollbar" id="style-1">
                          <div class="force-overflow">
                            <?php $i = 0;
                            foreach ($comments as $row) : if ($row->parent_id > 0) {
                                echo "";
                              } else { ?>
                                <div class="media mb-4" id='showReplyForm'>
                                  <div class="post-thumb-sm mr-3">
                                    <img class="img-fluid" src="<?php
                                                                $this->load->model('user_model');
                                                                if ($row->user_id == 0 || $row->user_id < 0) {
                                                                  $user_id_custom = 1;
                                                                } else {
                                                                  $user_id_custom = $row->user_id;
                                                                }
                                                                $users = $this->user_model->get_info($user_id_custom);
                                                                echo !empty($users->image_link) ? base_url('upload/user/' . $users->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->body ?>">
                                  </div>
                                  <div class="media-body">
                                    <ul class="list-inline d-flex justify-content-between mb-2">
                                      <li class="list-inline-item">
                                        <b><?php
                                            if ($row->name == null) {
                                              echo $users->name . "<small><i> - Thành viên</i> <a  href='javascript:void(0)'>Trả lời</a></small>";
                                            } else {
                                              echo $row->name . "<small><i> - Khách</i> <a  href='javascript:void(0)'>Trả lời</a></small>";
                                            }
                                            ?></b>
                                      </li>
                                      <li class="list-inline-item"><?php $date = date_create($row->created);
                                                                    echo date_format($date, 'd-m-Y') ?></li>
                                    </ul>
                                    <span><?php echo $row->body; ?></span>
                                    <p id="icon<?php echo $i; ?>" style="display:none;"><?php echo $row->icon ?></p>
                                    <img id="myIcon<?php echo $i; ?>" src="" width="70px">
                                    <script type="text/javascript">
                                      var key = $('#icon<?php echo $i; ?>').text();
                                      $('#myIcon<?php echo $i; ?>').attr('src', icon[key]);
                                    </script>
                                    <br /><br />
                                    <?php if (!empty($row->subs)) : ?>
                                      <?php foreach ($row->subs as $sub) : ?>
                                        <div class="row">
                                          <div class="col-lg-1">
                                            <img class="img-fluid" src="<?php
                                                                        $this->load->model('user_model');
                                                                        if ($sub->user_id == 0 || $sub->user_id < 0) {
                                                                          $user_id_customs = 1;
                                                                        } else {
                                                                          $user_id_customs = $sub->user_id;
                                                                        }
                                                                        $user_r = $this->user_model->get_info($user_id_customs);
                                                                        echo !empty($user_r->image_link) ? base_url('upload/user/' . $user_r->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $sub->body ?>">

                                          </div>
                                          <div class="col-lg-11">
                                            <div class="row">
                                              <div class="col-lg-12">
                                                <b><?php
                                                    if ($sub->name == null) {
                                                      echo $users->name . "<i> - Thành viên</i> &nbsp;&nbsp;&nbsp; ";
                                                    } else {
                                                      echo $sub->name . "<i> - Khách</i> &nbsp;&nbsp;&nbsp; ";
                                                    }
                                                    ?></b>
                                              </div>
                                              <div class="col-lg-12">
                                                <span><?php echo $sub->body ?></span>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                  </div>
                                  <br />
                                  <br>
                                  <?php if (isset($user_info)) : ?>
                                    <form action="<?php echo site_url('comment/replyComment'); ?>" class="row hidden" method="POST" id="postComments" name="postComments" style="padding-left: 50px;">
                                      <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="<?php echo $user_info->id ?>">
                                      <input type="hidden" class="form-control form-control-text col-lg-4" name="name" id="name" value="" placeholder=" Tên của bạn" autocomplete="off">
                                      <input type="hidden" class="form-control mb-4" name="post_id" id="post_id" value="0">
                                      <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id ?>">
                                      <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="<?php echo $row->id ?>">
                                      <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                                      <br /> <br />
                                      <input type="text" class="form-control form-control-text col-lg-10" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
                                      <br />
                                      <div class="col-12">
                                        <br />
                                        <button class="btn btn-primary" id="clickClear">Lên Lên</button>
                                        <br />
                                      </div>
                                    </form>
                                  <?php else : ?>
                                    <form action="<?php echo site_url('comment/replyComment'); ?>" class="row hidden" method="POST" id="postComments" name="postComments" style="padding-left: 50px;">
                                      <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="">
                                      <input type="text" class="form-control form-control-text col-lg-4" name="name" id="name" value="" placeholder=" Tên của bạn" required autocomplete="off">
                                      <input type="hidden" class="form-control mb-4" name="post_id" id="post_id" value="0">
                                      <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id ?>">
                                      <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="<?php echo $row->id ?>">
                                      <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                                      <br /> <br />
                                      <input type="text" class="form-control form-control-text col-lg-10" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
                                      <br />
                                      <div class="col-12">
                                        <br />
                                        <button class="btn btn-primary" id="clickClear">Lên Lên</button>
                                        <br />
                                      </div>
                                    </form>
                                  <?php endif; ?>
                                </div>

                            <?php $i++;
                              }
                            endforeach; ?>
                          </div>

                        </div>

                      </div> -->
                      <div class="tab-pane fade" id="profile-cafesua" role="tabpanel" aria-labelledby="profile-tab-facebook">
                        <br />
                        <div id="fb-root"></div>
                        <script src="https://connect.facebook.net/vi_VN/all.js#appId=170796359666689&amp;xfbml=1"></script>
                        <div class="fb-comments" data-href="<?php echo current_url() ?>" data-num-posts="5" data-width="100%" data-colorscheme="light">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hidden space-y-6 2xl:inline 2xl:basis-1/2">
        <div class="space-y-8 rounded-xl bg-white p-5">
          <div id="style-15" class="react-tabs scrollbar" data-rttabs="true">
            <div class="force-overflow  gap-y-4 sm:grid-cols-10 md:grid-cols-7 lg:grid-cols-10 xl:grid-cols-12 2xl:grid-cols-10 3xlc:grid-cols-12 react-tabs__tab-panel--selected" role="tabpanel" id="react-tabs-1" aria-labelledby="react-tabs-0">
              <?php
              foreach ($list_chapters as $row) :
                if ($row->status == 0) {
                } else { ?>
                  <a href="<?php echo site_url('truyen/' . $stories->slug . '/' . $row->slug . '/' . $row->id) ?>">
                     <div class="custom-chapter cursor-pointer rounded-xl bg-teal-500 p-1 text-center font-semibold text-white transition hover:scale-105 hover:bg-teal-600">
                      <?php echo $row->name ?>
                      </div>
                  </a>
              <?php
                }
              endforeach;
              ?>
            </div>
          </div>
        </div>
        <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
          <p class="text-3xl font-bold text-gray-700 antialiased">Truyện mới</p>
          <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-4 2xlc:grid-cols-2 3xlc:grid-cols-3">
            <?php
            foreach ($view_stories as $row_stories) :
              if ($row_stories->status == 0) {
              } else { ?>
                <a href="<?php echo site_url('xem-truyen/' . $row_stories->slug . '/' . $row_stories->id)?>">
                  <div style="background:url(<?php echo $row_stories->image_link != '' ? base_url('upload/stories/' . $row_stories->image_link) : base_url('upload/stories/default.jpg') ?>) no-repeat center center;background-size:cover" class="flex aspect-[2/3] h-56 cursor-pointer flex-col rounded-3xl bg-cover transition hover:scale-105 hover:saturate-150 lg:h-72">
                    <div class="grow p-4">
                    </div>
                    <div class="text-md w-full rounded-b-3xl bg-black/70 py-4 px-2 text-center font-medium text-white backdrop-opacity-50">
                      <span class="line-clamp-2"><?php echo $row_stories->name; ?></span>
                    </div>
                  </div>
                </a>
            <?php }
            endforeach; ?>
          </div>
        </div>
        <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
          <p class="text-3xl font-bold text-gray-700 antialiased">Truyện vừa xem</p>
          <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-4 2xlc:grid-cols-2 3xlc:grid-cols-3">
            <?php
            $list_stories = array_unique($recentlyViewed);
            $list_stories_new = array();
            $this->load->model('story_model');
            foreach ($list_stories as $val) {
              $stories_view = $this->story_model->get_info($val);
              array_push($list_stories_new, $stories_view);
            }
            foreach ($list_stories_new as $row_stories) :
              if ($row_stories->status == 0) {
              } else { ?>
                <a href="<?php echo site_url('xem-truyen/' . $row_stories->slug . '/' . $row_stories->id)?>">
                  <div style="background:url(<?php echo $row_stories->image_link != '' ? base_url('upload/stories/' . $row_stories->image_link) : base_url('upload/stories/default.jpg') ?>) no-repeat center center;background-size:cover" class="flex aspect-[2/3] h-56 cursor-pointer flex-col rounded-3xl bg-cover transition hover:scale-105 hover:saturate-150 lg:h-72">
                    <div class="grow p-4">
                    </div>
                    <div class="text-md w-full rounded-b-3xl bg-black/70 py-4 px-2 text-center font-medium text-white backdrop-opacity-50">
                      <span class="line-clamp-2"><?php echo $row_stories->name; ?></span>
                    </div>
                  </div>
                </a>
            <?php }
            endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="space-y-6 2xl:hidden">
      <div class="space-y-8 rounded-xl bg-white p-5">
        <div class="react-tabs" data-rttabs="true">
          <div class="gap-y-4 sm:grid-cols-10 md:grid-cols-7 lg:grid-cols-10 xl:grid-cols-12 2xl:grid-cols-10 3xlc:grid-cols-12 react-tabs__tab-panel--selected" role="tabpanel" id="react-tabs-3" aria-labelledby="react-tabs-2">
            <?php
            foreach ($list_chapters as $row) :
              if ($row->status == 0) {
              } else { ?>
                <div class="custom-chapter cursor-pointer rounded-xl bg-teal-500 p-1 text-center font-semibold text-white transition hover:scale-105 hover:bg-teal-600">
                  <a href="<?php echo site_url('truyen/' . $stories->slug . '/' . $row->slug . '/' . $row->id) ?>">
                    <?php echo $row->name ?>
                  </a>
                </div>
            <?php
              }
            endforeach;
            ?>

          </div>
        </div>
      </div>
      <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
        <p class="text-3xl font-bold text-gray-700 antialiased">Truyện mới</p>
        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-2 md+:grid-cols-3 lgc:grid-cols-2 xlc:grid-cols-4 2xlc:grid-cols-5 3xlc:grid-cols-6">
          <?php
          foreach ($view_stories as $row_stories) :
            if ($row_stories->status == 0) {
            } else { ?>
              <div style="background:url(<?php echo $row_stories->image_link != '' ? base_url('upload/stories/' . $row_stories->image_link) : base_url('upload/stories/default.jpg') ?>) no-repeat center center;background-size:cover" class="flex aspect-[2/3] h-56 cursor-pointer flex-col rounded-3xl bg-cover transition hover:scale-105 hover:saturate-150 lg:h-72">
                <div class="grow p-4">
                </div>
                <div class="text-md w-full rounded-b-3xl bg-black/70 py-4 px-2 text-center font-medium text-white backdrop-opacity-50">
                  <span class="line-clamp-2"><?php echo $row_stories->name; ?></span>
                </div>
              </div>
          <?php }
          endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>