<!-- page-title -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4>Kết quả tìm kiếm với từ khóa "<?php echo $key?>"</h4>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- category post -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row masonry-container pt-5">
            <?php foreach($list as $row): if($row->status == 0){ }else{?>  
                <div class="col-sm-4 mb-5">
                    <article class="text-center">
                    <img class="img-fluid mb-4" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>">
                    <p class="text-uppercase mb-2">
                        <?php
                            $this->load->model('catalog_model');
                            $catalog = $this->catalog_model->get_info($row->category_id);
                            echo $catalog->name;
                        ?>
                    </p>
                    <h4 class="title-border"><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name;?></a></h4>
                    <p><?php echo substr($row->description, 0, 300).'...'?></p>
                    <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>" class="btn btn-transparent">read more</a>
                    </article>

                </div>
            <?php } endforeach;?>   
        </div> 
        <div class="row">
            <div class="col-12">
                <div class='pagination'>
		            
		        </div>
            <nav>
            </nav>
          </div>
        </div>
      </div>
      <!-- /blog post -->
      <!-- <div class="col-lg-4">
        <div class="widget">
          <h6 class="mb-4">Truyện được xem nhiều nhất</h6>
            <?php foreach($story_newest as $row):?>     
              <div class="media mb-4">
                <div class="post-thumb-sm mr-3">
                    <img class="img-fluid mb-4" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>">
              </div>
                <div class="media-body">
                  <ul class="list-inline d-flex justify-content-between mb-2">
                    <li class="list-inline-item"><i class="ti-user mr-2"></i>  <?php echo $row->author?></li>
                    <li class="list-inline-item"><?php echo $row->created?></li>
                  </ul>
                  <h6><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name?></a> -  view <?php echo $row->view?></h6>
                </div>
              </div>
            <?php endforeach;?>  
        </div>
        <div class="widget">
          <h6 class="mb-4">Thể loại</h6>
          <ul class="list-inline tag-list">
              <?php foreach($catalogs as $row_catalog):?>
                <li class="list-inline-item m-1"><a href="<?php echo site_url('danh-muc/'.$row_catalog->slug.'-'.$row_catalog->id)?>"><?php echo $row_catalog->name?></a></li>
              <?php endforeach;?>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
</section>
<!-- /category post -->