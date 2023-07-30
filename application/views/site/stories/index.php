<style>
    table td{
        padding:10px;
        /* border:1px solid #f0f0f0; */
    }

    .nav-tabs > li > a {margin: 0;padding: 8px 16px;}
    .breadcrumb input[type="radio"] {
        display: none;
    }

    .breadcrumb input[type="checkbox"] {
        display: none;
    }

    .breadcrumb {
        background: #ddd;
        display: inline-block;
        padding: 1px;
        width: 100%;
    }

    .tab-content {
        padding: 15px;
        background-color: #fff;
    }

    .breadcrumb li.displayroute {
        display: inline-block;
        background: white;
        padding: 0;
        position: relative;
        min-width:30%;
        text-decoration: none;
        -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%, 15px 50%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%, 15px 50%);
        margin-right: -13px;
    }

    .breadcrumb li.displayroute#last {
        -webkit-clip-path: polygon(0 0, calc(100% - 0px) 0, 100% 50%, calc(100% - 0px) 100%, 0 100%, 15px 50%);
        clip-path: polygon(0 0, calc(100% - 0px) 0, 100% 50%, calc(100% - 0px) 100%, 0 100%, 15px 50%);
    }

    .nav-tabs>li>a.active.show,
    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        border-bottom: 2px solid #FF8C33;
        }

    .breadcrumb li.displayroute:first-child {
    -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
    clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
    }

    @media (max-width: 408px) {
    .breadcrumb li.displayroute {
        display: inline-block;
        background: white;
        padding: 5px 30px 5px 30px;
        position: relative;
        min-width:40%;
        border:1px solid black;
        text-decoration: none;
        -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        padding-left: 20px;
        margin-right: -13px;
    }
    .breadcrumb li.displayroute#last {
        -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        padding-left: 20px;
    }
        .breadcrumb {
            background: none;
            -webkit-filter: drop-shadow(1px 1px 0px black)
        drop-shadow(1px -1px 0px black)
        drop-shadow(-1px 1px 0px black)
        drop-shadow(-1px -1px 0px black);
    filter: drop-shadow(1px 1px 0px black)
        drop-shadow(1px -1px 0px black)
        drop-shadow(-1px 1px 0px black)
        drop-shadow(-1px -1px 0px black);
            }
    }
</style>
<script type="text/javascript">
    var icon; //Tạo biến lưu nội dung file json được đọc
    //Tạo hàm đọc file
    function readTextFile(file)
    {
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function ()
        {
            if(rawFile.readyState === 4)
            {
                if(rawFile.status === 200 || rawFile.status == 0)
                {
                    var allText = rawFile.responseText;
                    icon = JSON.parse(allText); //đọc dữ liệu json của file và lưu vào biến icon
                }
            }
        }
        rawFile.send(null);
    }

    //Chọn file để đọc nào
    readTextFile("<?php echo public_url()?>site/js/icon.json");
</script>
<!-- page-title -->
<section class="section bg-secondary section-detail">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h4>TẤT CẢ TRUYỆN/MANGA</h4>
        <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('truyen.html')?>">
                    <span itemprop="title" property="name"> Danh sách truyện - Manga</span>
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <div class="masonry-container pt-5">
            <?php foreach($list_story as $row): if($row->status == 0){ }else{?>
                <div class="col-lg-3">
                  <article class="text-center box-content">
                    <a href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>">
                      <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" loading="lazy" alt="<?php echo $row->meta_desc?>" title="<?php echo $row->site_title?>">
                    </a>
                    <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
                    <h4 class="title-border">
                      <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>"><?php echo $row->name?></a>
                    </h4>
                    <div class="bg">
                      <div class="overlays">
                      <a href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>">
                        <span class="info-book"><?php echo $row->author?></span>
                        <span class="info-book"><?php
                                          $date = date_create($row->created);
                                          echo date_format($date,'d-m-Y H:i:s')?>
                        </span>
                        <span class="info-book"></i><?php echo number_format($row->view)?> Lượt xem</span>
                        <span class="info-book"><?php echo $row->continues == 0 ?  "Còn tiếp" :  "Hoàn thành";?></span>
                        
                        <span class="info-book"><?php echo $row->description;?></span>
                      </a>
                    </div>
                    </div>
                  </article>
                </div>
            <?php } endforeach;?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class='pagination'>
		            <?php echo $this->pagination->create_links();?>
		        </div>
          </div>
        </div>
      </div>
      <!-- /blog post -->
      <div class="col-lg-3">
        <div class="breadcrumb">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="displayroute">
                  <a href="#month" aria-controls="home" role="tab" data-toggle="tab">Top Tháng</a></li>
              <li role="presentation" class="displayroute">
                  <a href="#week" aria-controls="profile" role="tab" data-toggle="tab">Truyện Mới</a>
              </li>
              <li class="displayroute">
                <a href="#comments" aria-controls="profile" role="tab" data-toggle="tab">Top Bình Luận</a>
              </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="month">
              <div class="widget">
                <?php
                  $count = 1;
                  foreach($story_newest as $row): if($row->status == 0){ }else{?>
                  <div class="media mb-4">
                    <div class="post-thumb-sm mr-3">
                      <a href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>">
                        <img class="img-fluid mb-4" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>" style=" min-width: 43px; min-height: 55px; ">
                      </a>
                    </div>
                    <div class="media-body">
                      <ul class="list-inline d-flex justify-content-between">
                        <li class="list-inline-item"><?php echo $row->author?></li>
                        <li class="list-inline-item t<?php echo $count?>">Top <?php echo $count?></li>
                      </ul>
                      <h6 class="p-stori">
                        <a class="text-dark c-p-stories fix-title-1-line" href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>"><?php echo $row->name?></a> &nbsp;&nbsp;
                        <span style="right: 30px;position: absolute;"> <i class="ti-eye mr-2"></i><?php echo number_format($row->view)?></span>
                      </h6>
                    </div>
                  </div>
                <?php } $count ++ ;endforeach;?>
            </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="week">
              <?php
                  foreach($list_stories_new as $row_s_new): if($row_s_new->status == 0){ }else{?>
                  <div class="media mb-4">
                    <div class="post-thumb-sm mr-3">
                      <a href="<?php echo site_url('xem-truyen/'.$row_s_new->slug.'/'.$row_s_new->id)?>">
                        <img class="img-fluid mb-4" src="<?php echo $row_s_new->image_link != '' ? base_url('upload/stories/'.$row_s_new->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row_s_new->name?>" style=" min-width: 43px; min-height: 55px; ">
                      </a>
                    </div>
                    <div class="media-body week-list">
                      <ul class="list-inline d-flex justify-content-between">
                        <li class="list-inline-item"><?php echo $row_s_new->author?></li>
                      </ul>
                      <h6 class="p-stori">
                        <a class="text-dark c-p-stories fix-title-1-line" href="<?php echo site_url('xem-truyen/'.$row_s_new->slug.'/'.$row_s_new->id)?>"><?php echo $row_s_new->name?></a>&nbsp;&nbsp;
                        <span style="right: 30px;position: absolute;"> <i class="ti-eye mr-2"></i><?php echo number_format($row_s_new->view)?></span>
                      </h6>
                    </div>
                  </div>
                <?php } endforeach;?>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <?php $i = 0 ;  foreach($list_comments as $row_comment): ?>
                  <div class="media">
                    <div class="media-body">
                      <ul class="list-inline d-flex justify-content-between mb-2">
                        <li class="list-inline-item">
                          <?php
                            $this->load->model('user_model');
                              if($row_comment->user_id == 0 || $row_comment->user_id < 0){
                                $user_id_custom = 1;
                                }else{
                                 $user_id_custom = $row_comment->user_id;
                                }
                                $this->load->model('user_model');
                                $user = $this->user_model->get_info($user_id_custom);

                              if($row->name == NULL){
                                echo "<b>". $users->name."</b><i> - Thành viên</i>";
                              }else{
                                echo "<b>". $row_comment->name."</b><i> - Khách</i>";
                              }
                          ?>
                        </li>
                      </ul>
                      <span><?php echo $row_comment->body;?></span>
                      <?php if(!empty($row_comment->icon)){?>
                      <p id="icon<?php echo $i;?>" style="display:none;"><?php echo $row_comment->icon ?></p>
                      <img id="myIcon<?php echo $i;?>" src="" width="70px">
                      <script type="text/javascript">
                          var key = $('#icon<?php echo $i;?>').text();
                          $('#myIcon<?php echo $i;?>').attr('src', icon[key]);
                      </script>
                      <?php } ?>
                      <span><hr></span>
                    </div>
                  </div>
                <?php $i++; endforeach;?>
              </div>
          </div>
        </div>
        <div class="widget">
          <h6 class="mb-4">Thể loại</h6>
          <ul class="list-inline tag-list">
              <?php foreach($catalogs as $row_catalog):?>
                <li class="list-inline-item m-1"><a href="<?php echo site_url('danh-muc/'.$row_catalog->slug.'/'.$row_catalog->id)?>"><?php echo $row_catalog->name?></a></li>
              <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /category post -->
<script>
  $( document ).ready(function() {
    $(".displayroute").click(function(){
      this.toggleClass("active");
    });
  });
</script>