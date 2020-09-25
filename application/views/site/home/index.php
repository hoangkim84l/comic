<?php $this->load->view('site/slide', $this->data);?>

<!-- blog post -->
<section class="section">
  <div class="container">
    <div class="row masonry-container">
      <?php foreach($data_home as $row) : if($row->status == 0){ }else{?>

        <div class="col-lg-4 col-sm-6 mb-5">
          <article class="text-center">
            <img class="img-fluid mb-4" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>">
            <p class="text-uppercase mb-2">
              <?php
                $this->load->model('catalog_model');
                $catalog = $this->catalog_model->get_info($row->category_id);
                echo $catalog->name;
              ?>
            </p>
            <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
            <h4 class="title-border"><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name?></a></h4>
            <!-- <p><?php echo substr($row->description, 0, 200).'...'?></p> -->
            <div style="height: 80px;overflow: hidden;"><?php echo $row->description?></div>
            <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>" class="btn btn-transparent">xem hết</a>
          </article>
        </div>

      <?php } endforeach;?>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="truyen.html" class="btn btn-transparent" style="width: 100%;">XEM TẤT CẢ</a>
      </div>
    </div>
  </div>
</section>
<!-- /blog post -->
