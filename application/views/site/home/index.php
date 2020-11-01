<?php $this->load->model('chapter_model'); $this->load->view('site/slide', $this->data);?>
<ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList" style="display: none;">
  <li property="itemListElement" typeof="ListItem">
      <meta property="position" content="1" />
      <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
          <span itemprop="title" property="name">Trang chủ</span>
      </a>
  </li>
</ul>
<!-- blog post chap mới -->
<section class="section section-top-page">
  <div class="container">
    <div class="row masonry-container">
      <div class="col-lg-6 col-8">
        <h5><a href="javascript:void(0)"> <img src="<?php echo public_url('') ?>site/images/icon-stars.png" alt="<?php echo $support->site_title; ?>" title="<?php echo $support->site_desc;?>"> &nbsp; Truyện mới cập nhật</a></h5><br/>
      </div>
      <div class="col-lg-6 col-4">
        <a href="truyen.html" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container" id="data-homes">
      <?php
        foreach($data_home as $row) : if($row->status == 0){ }else{
        $this->load->model('catalog_model');
        $this->load->model('story_model');
        $story = $this->story_model->get_info($row->story_id);
        ?>
        <div class="col-lg-3 col-sm-6 mb-5 data-dup" data-id="<?php echo $row->story_id?>">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $story->image_link != '' ? base_url('upload/stories/'.$story->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?>" title="<?php echo $story->site_title?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
               $catalog = $this->catalog_model->get_list();
               $cata = json_decode($story->category_id);
               foreach ($catalog as $data){
                   if (in_array($data->id, $cata)) { ?>
                 <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                   ?>'><?php echo $data->name.".";?></a>
               <?php }
               }
              ?>
            </p>
            <center><div class='raty' style='margin:10px 0px' id='<?php echo $story->id?>' data-score='<?php echo  ($story->rate_count > 0) ? $story->rate_total/$story->rate_count : 0?>'></div></center>
            <h4 class="title-border">
              <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>"><?php echo $story->name?></a>
            </h4>
            <?php
              $input_chap = array();
              $input_chap['limit'] = array(3, 0);
              $input_chap['where'] = array('story_id' => $row->story_id);
              $input_chap['order'] = array('created', 'DESC');
              $get3_chap_last = $this->chapter_model->get_list($input_chap);
              foreach($get3_chap_last as $val){
                ?>
                  <div class="text-left fix-title-1-line-homepage">
                    <a href="<?php echo site_url('truyen/'.$story->slug.'-'.$val->slug.'-'.$val->id)?>"> <?php echo $val->name ?></a>  
                    <span><?php $date=date_create($val->created); echo date_format($date,"d-m-Y");?></span>
                  </div>
                <?php
              }
            ?>
           </article>
        </div>

      <?php } endforeach; ?>
    </div>
  </div>
</section>
<!-- /blog post -->
<!-- blog post truyện hot-->
<section class="section section-content">
  <div class="container">
    <div class="row masonry-container">
      <div class="col-lg-6 col-8">
        <h5><a href="javascript:void(0)"> <img src="<?php echo public_url('') ?>site/images/icon-stars.png" alt="cafe sữa novel"> &nbsp; Truyện mới đang hot</a></h5><br/>
      </div>
      <div class="col-lg-6 col-4">
        <a href="truyen.html" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container">
      <?php foreach($data_hot as $row) : if($row->status == 0){ }else{?>

        <div class="col-lg-3 col-sm-6 mb-5">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?>" title="<?php echo $row->site_title?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
                $this->load->model('catalog_model');
                $catalog = $this->catalog_model->get_list();
                $cata = json_decode($row->category_id);
                foreach ($catalog as $data){
                    if (in_array($data->id, $cata)) { ?>
                  <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                    ?>'><?php echo $data->name.".";?></a>
                <?php }
                }
              ?>
            </p>
            <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
            <h4 class="title-border">
              <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name?></a>
            </h4>
            <div class="text-left">
              <i class="ti-eye mr-2"></i><?php echo number_format($row->view)?> Lượt xem
            </div>
           </article>
        </div>

      <?php }  endforeach; ?>
    </div>
  </div>
</section>
<!-- /blog post -->
<!-- blog post truyện comic-->
<section class="section section-content">
  <div class="container">
    <div class="row masonry-container">
      <div class="col-lg-6 col-8">
        <h5><a href="javascript:void(0)"> <img src="<?php echo public_url('') ?>site/images/icon-stars.png" alt="cafe sữa novel"> &nbsp; Truyện Manga/Comic</a></h5><br/>
      </div>
      <div class="col-lg-6 col-4">
        <a href="/danh-muc/mangacomic-95" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container">
      <?php foreach($list_comic as $row) : if($row->status == 0){ }else{?>

        <div class="col-lg-3 col-sm-6 mb-5">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?> "title="<?php echo $row->site_title?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
                $this->load->model('catalog_model');
                $catalog = $this->catalog_model->get_list();
                $cata = json_decode($row->category_id);
                foreach ($catalog as $data){
                    if (in_array($data->id, $cata)) { ?>
                  <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                    ?>'><?php echo $data->name.".";?></a>
                <?php }
                }
              ?>
            </p>
            <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
            <h4 class="title-border">
              <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name?></a>
            </h4>
           </article>
        </div>

      <?php }  endforeach; ?>
    </div>
  </div>
</section>
<!-- /blog post -->
<!-- blog post truyện Novel-->
<section class="section section-content">
  <div class="container">
    <div class="row masonry-container">
      <div class="col-lg-6 col-8">
      <h5><a href="javascript:void(0)"> <img src="<?php echo public_url('') ?>site/images/icon-stars.png" alt="cafe sữa novel"> &nbsp; Truyện Novel</a></h5><br/>
      </div>
      <div class="col-lg-6 col-4">
        <a href="/danh-muc/noveltieu-thuyet-23" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container">
      <?php foreach($list_novel as $row) : if($row->status == 0){ }else{?>

        <div class="col-lg-3 col-sm-6 mb-5">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?>" title="<?php echo $row->site_title?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
               $this->load->model('catalog_model');
               $catalog = $this->catalog_model->get_list();
               $cata = json_decode($row->category_id);
               foreach ($catalog as $data){
                   if (in_array($data->id, $cata)) { ?>
                 <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                   ?>'><?php echo $data->name.".";?></a>
               <?php }
               }
              ?>
            </p>
            <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
            <h4 class="title-border">
              <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name?></a>
            </h4>
           </article>
        </div>

      <?php }  endforeach; ?>
    </div>
  </div>
</section>
<!-- /blog post -->
<script>
  var found = {};
  $('[data-id]').each(function(){
      var $this = $(this);
      if(found[$this.data('id')]){
          $this.remove();   
      }
      else{
          found[$this.data('id')] = true;   
      }
  });
  if($('[data-id]').length > 8){
   $('[data-id]:gt(7)').remove();
}
</script>