<!-- page-title -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>"><h4><?php
          echo $story->name;?></h4></a>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
      <div class="container-fluid">
            <div class="row">
              <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
                  <li property="itemListElement" typeof="ListItem">
                      <meta property="position" content="1" />
                      <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                          <span itemprop="title" property="name">Trang chủ / </span>
                      </a>
                  </li>
                  <li property="itemListElement" typeof="ListItem">
                      <meta property="position" content="2" />
                      <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>">
                          <span itemprop="title" property="name"> <?php echo  $story->name;?> / </span>
                      </a>
                  </li>
                  <li property="itemListElement" typeof="ListItem">
                      <meta property="position" content="3" />
                      <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('danh-sach-chuong/'.$story->slug.'-'.$story->id)?>">
                          <span itemprop="title" property="name"> Danh sách chương - chapter</span>
                      </a>
                  </li>
              </ul>
            </div>
      </div>
        <div class="row">
          <div class="col-lg-7 col-sm-12" style="width:100%; text-align: center; ">
              <img class=" img-fluid mb-4" src="<?php echo $story->image_link != '' ? base_url('upload/stories/'.$story->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $story->meta_desc;?>" title="<?php echo $story->site_title;?>">
          </div>
          <div class="col-lg-5 col-sm-12">
            <h6 class="title-book"><?php echo $story->name?></h6>
            <span class="info-book"><i class="ti-user mr-2"></i><?php echo $story->author?></span>
            <span class="info-book"><i class="ti-calendar mr-2"></i><?php 
                              $date = date_create($story->created);
                              echo date_format($date,'d-m-Y H:i:s')?>
            </span>
            <span class="info-book"><i class="ti-eye mr-2"></i><?php echo number_format($story->view)?> Lượt xem</span>
            <span class="info-book"><i class="ti-book mr-2"></i> <a href="<?php echo site_url('danh-sach-chuong/'.$story->slug.'-'.$story->id)?>" style="color: #000;padding-left:0px;"><?php echo count($list_chapters)?> Chương </a></span>
            <span class="info-book"><i class="ti-pencil mr-2"></i><?php echo $story->continues == 0 ?  "Còn tiếp" :  "Hoàn thành";?></span>
            <span class="info-book"><i class="ti-flag-alt-2 mr-2"></i> 
              <?php 
                 $this->load->model('catalog_model');
                 $catalog = $this->catalog_model->get_list();
                 $cata = json_decode($story->category_id);
                 foreach ($catalog as $data){
                     if (in_array($data->id, $cata)) { ?>
                   <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                     ?>'><?php echo $data->name.".";?></a>
                 <?php }
                 }
              ?>
            <!-- <?php echo $name_catalog->name?> -->
            </span>
            <span class="info-book">Đánh giá: 
            <?php if(isset($user_info)):?>
              <span class='raty_detailt' style = 'margin:5px' id='<?php echo $story->id?>' data-score='<?php echo  ($story->rate_count > 0) ? $story->rate_total/$story->rate_count : 0?>'></span> <br/>
            <?php else: ?>
              <br/><a href="<?php echo site_url('user/login')?>" target="_blank" rel="noopener noreferrer" class="link-login">Đăng nhập</a> để đánh giá về truyện<br/>
            <?php endif; ?> 
                    Tổng số: <b  class='rate_count'><?php echo $story->rate_count?> Đánh giá</b>
            </span>
            <span class="info-book" title="Submit Yêu Thích để nhận mail khi có chap mới nha.">
              <form action="<?php echo site_url('story/love_lists')?>" method="post">
                <?php if(isset($user_info)): 
                  $this->load->model('lovelists_model');
                  $inputArr = array();
                  $iinputArrnput['where'] = array('user_id', $user_info->id);
                  $get_lists = $this->lovelists_model->get_list($inputArr);
                  $btnCheck = '';
                  foreach($get_lists as $val){
                    if($val->story_id == $story->id){
                      $btnCheck .= 'apper';
                    }
                  }
                  ?>
                  <?php $message = $this->session->flashdata('message'); if(isset($message)):?>
                    <label for="" style="color: #FF8C33;"><?php echo $message;?></label>
                  <?php endif;?>
                  <input type="hidden" name="user_id" value="<?php echo $user_info->id?>">
                  <input type="hidden" name="story_id" value="<?php echo $story->id?>">
                  <input type="hidden" name="user_email" value="<?php echo  $user_info->email?>">
                  <button type="submit" class="btn btn-primary" <?php if($btnCheck=="apper")echo "disabled"?>>Yêu thích</button>
                <?php else: ?>
                  <label for=""><a href="<?php echo site_url('user/login')?>" target="_blank" rel="noopener noreferrer" class="link-login">Đăng nhập</a> để sữ dụng chức năng này</label>
                  <button type="" class="btn btn-primary" disabled>Yêu thích</button>
                <?php endif;?>  
              </form>
            </span>
          </div>
        </div>

        <!--view list chapter-->
        <section class="section">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <!-- /blog single -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active f-s-tab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;">  
                      Cốt truyện
                    </a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="content">
                        <p><?php echo $story->description ?></p>
                    </div>
                  </div>
                </div>        
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-lg-4">
        <div class="widget">
          <h6 class="mb-4">Truyện mới</h6>
          <?php foreach($story_newest as $row_story): if($row_story->status == 0){ }else{?>
          <div class="media mb-4">
            <div class="post-thumb-sm mr-3">
              <a href="<?php echo site_url('xem-truyen/'.$row_story->slug.'-'.$row_story->id)?>">
                <img class="img-fluid" src="<?php echo $row_story->image_link != '' ? base_url('upload/stories/'.$row_story->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row_story->meta_desc?>" title="<?php echo $row_story->site_title;?>">
              </a>
            </div>
            <div class="media-body">
              <ul class="list-inline d-flex justify-content-between mb-2">
                <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_story->author?> </li>
                <li class="list-inline-item"><?php $date = date_create($row_story->created);  echo date_format($date,'d-m-Y')?></li>
              </ul>
              <h6><a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row_story->slug.'-'.$row_story->id)?>"><?php echo $row_story->name?></a></h6>
            </div>
          </div>
          <?php } endforeach;?>  
        </div>
      </div>
    </div>
  </div>
</section>
<!-- blog single -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <br/>
        <h6>Danh sách Chương/Chapter</h6>
        <br/>
        <div class="container-fluid" style="min-height: 300px;">
            <div class="row">
                <?php foreach($list_chapters as $row): if($row->status == 0){ }else{?>
                  <a class="col-sm-4 list-chapters" href="<?php echo site_url('truyen/'.$story->slug.'-'.$row->slug.'-'.$row->id)?>"> <?php echo $row->name?></a>
                <?php } endforeach;?>
            </div>
        </div>
        </div>
      </div> 
  </div>
</section>
<br/>