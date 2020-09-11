<!-- page-title -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4><?php echo $stories->name?></h4>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- blog single -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <ul class="list-inline d-flex justify-content-between py-3">
          <li class="list-inline-item"><i class="ti-user mr-2"></i><?php echo $stories->author?></li>
          <li class="list-inline-item"><i class="ti-calendar mr-2"></i><?php echo $stories->created?></li>
        </ul>
        <img class="w-100 img-fluid mb-4" src="<?php echo $stories->image_link != '' ? base_url('upload/stories/'.$stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $stories->name?>">
          
        <div class="content">
          <p><?php echo $stories->description ?></p>
        </div>
      </div>
      <div class="col-lg-4">
      <div class="widget">
          <h6 class="mb-4">CHƯƠNG/CHAPTER</h6>
            <div class="scrollbar" id="style-1">
              <div class="force-overflow">
              <?php foreach($list_chapters as $row_chapter): if($row_chapter->status == 0){ }else{?>
                <div class="media mb-4">
                  <div class="media-body">
                    <ul class="list-inline d-flex justify-content-between mb-2">
                      <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $stories->author ?></li>
                      <li class="list-inline-item"><?php echo $row_chapter->created?></li>
                    </ul>
                    <h6><a class="text-dark" href="<?php echo site_url('truyen/'.$stories->slug.'-'.$row_chapter->slug.'-'.$row_chapter->id)?>"><?php echo $row_chapter->name?></a></h6>
                  </div>
                </div>
                <?php } endforeach;?>
              </div>
            </div>
        </div>
        <div class="widget">
          <h6 class="mb-4">Truyện mới</h6>
          <?php foreach($view_stories as $row_stories): if($row_stories->status == 0){ }else{?>
          <div class="media mb-4">
            <div class="post-thumb-sm mr-3">
              <img class="img-fluid" src="<?php echo $row_stories->image_link != '' ? base_url('upload/stories/'.$row_stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row_stories->name?>">
         
            </div>
            <div class="media-body">
              <ul class="list-inline d-flex justify-content-between mb-2">
                <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_stories->author?> </li>
                <li class="list-inline-item"><?php echo $row_stories->created?></li>
              </ul>
              <h6><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>"><?php echo $row_stories->name?></a>/ Lượt xem - <?php echo $row_stories->view?></h6>
            </div>
          </div>
          <?php } endforeach;?>  
        </div>
        <div class="widget">
          <h6 class="mb-4">Thể loại</h6>
          <ul class="list-inline tag-list">
              <?php foreach($catalogs as $row_catalog):?>
                <li class="list-inline-item m-1"><a href="<?php echo site_url('danh-muc/'.$row_catalog->slug.'-'.$row_catalog->id)?>"><?php echo $row_catalog->name?></a></li>
              <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /blog single -->