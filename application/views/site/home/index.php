<?php $this->load->model('chapter_model'); $this->load->view('site/slide', $this->data);?>

<!-- blog post truyện mới -->
<section class="section section-top-page">
  <div class="container">
    <div class="row masonry-container">
      <div class="col-lg-6 col-8">
        <h5><a href="javascript:void(0)"> <img src="<?php echo public_url('') ?>site/images/icon-stars.png" alt="cafe sữa novel"> &nbsp; Truyện mới cập nhật</a></h5><br/>
      </div>
      <div class="col-lg-6 col-4">
        <a href="truyen.html" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container">
      <?php foreach($data_home as $row) : if($row->status == 0){ }else{
        $this->load->model('catalog_model');
        $this->load->model('story_model');
        $story = $this->story_model->get_info($row->story_id);
        $catalog = $this->catalog_model->get_info($story->category_id);
        ?>
        <div class="col-lg-3 col-sm-6 mb-5">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $story->image_link != '' ? base_url('upload/stories/'.$story->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>"title="<?php echo $story->name?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
                echo "<a style='color:#585757' href='/danh-muc/".$catalog->id."'>".$catalog->name."</a>";
              ?>
            </p>
            <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
            <h4 class="title-border">
              <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>"><?php echo $story->name?></a>
            </h4>
            <div class="text-left fix-title-1-line">
              <a href="<?php echo site_url('truyen/'.$story->slug.'-'.$row->slug.'-'.$row->id)?>"> <?php echo $row->name ?></a>
            </div>
           </article>
        </div>

      <?php }  endforeach; ?>
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
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>"title="<?php echo $row->name?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
                $this->load->model('catalog_model');
                $catalog = $this->catalog_model->get_info($row->category_id);
                echo "<a style='color:#585757' href='/danh-muc/".$catalog->id."'>".$catalog->name."</a>";
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
        <a href="/danh-muc/mangacomic-5" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container">
      <?php foreach($list_comic as $row) : if($row->status == 0){ }else{?>

        <div class="col-lg-3 col-sm-6 mb-5">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>"title="<?php echo $row->name?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
                $this->load->model('catalog_model');
                $catalog = $this->catalog_model->get_info($row->category_id);
                echo "<a style='color:#585757' href='/danh-muc/".$catalog->id."'>".$catalog->name."</a>";
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
<!-- blog post truyện đam mẽo-->
<section class="section section-content">
  <div class="container">
    <div class="row masonry-container">
      <div class="col-lg-6 col-8">
      <h5><a href="javascript:void(0)"> <img src="<?php echo public_url('') ?>site/images/icon-stars.png" alt="cafe sữa novel"> &nbsp; Truyện Đam mẽo</a></h5><br/>
      </div>
      <div class="col-lg-6 col-4">
        <a href="/danh-muc/djam-meo-11" class="btn btn-transparent text-right" style="width: 100%;">Xem Thêm...</a>
      </div>
    </div>
    <div class="row masonry-container">
      <?php foreach($list_dammeo as $row) : if($row->status == 0){ }else{?>

        <div class="col-lg-3 col-sm-6 mb-5">
          <article class="text-center">
          <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
            <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>"title="<?php echo $row->name?>">
          </a>
            <p class="text-uppercase mb-2 catalog">
              <?php
                $this->load->model('catalog_model');
                $catalog = $this->catalog_model->get_info($row->category_id);
                echo "<a style='color:#585757' href='/danh-muc/".$catalog->id."'>".$catalog->name."</a>";
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