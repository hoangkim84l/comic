<!-- page-title -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4><?php
          echo $story->name;?></h4>
        <h5><?php echo $chapter->name?></h5>
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
          <li class="list-inline-item"><i class="ti-user mr-2"></i><?php echo $chapter->author?></li>
          <li class="list-inline-item"><i class="ti-calendar mr-2"></i><?php echo $chapter->created?></li>
        </ul>
        <?php if($chapter->image_link != ''){ ?>
          <img class="w-100 img-fluid mb-4" loading="lazy" src="<?php echo $chapter->image_link != '' ? base_url('upload/chapter/'.$chapter->image_link) : base_url('upload/chapter/default.jpg') ?>" alt="<?php echo $chapter->name?>">
        <?php } else{ echo "";}?>  
        <div class="content">
          <p><?php echo $chapter->content ?></p>
        </div>
      </div>
      <div class="col-lg-4">
      <div class="widget">
        <div class="btn-click">
          <?php
            $id = $this->uri->rsegment(3);
            $output = explode("-",$id);
            $id =  $output[count($output)-1]; 
            $array_values = array_values($list_chapters);
          ?>
          <?php if((array_pop($array_values)->id) != ($id)){ ?>
            <a href="<?php echo base_url('truyen/'.$story->slug.'-'.($id-1))?>" class="previous">&laquo; Chương trước</a>
          <?php } else{ echo "";}?>
          <?php if((array_shift($array_values)->id) != ($id)){ ?>
            <a href="<?php echo base_url('truyen/'.$story->slug.'-'.($id+1))?>" class="next">Chương sau &raquo;</a>
          <?php } else{ echo "";}?>
        </div>
      </div>  
      <div class="widget">
          <h6 class="mb-4">CHƯƠNG/CHAPTER</h6>
          <?php 
          foreach($list_chapters as $row_chapter):?>
          <div class="media mb-4">
            <div class="media-body">
              <ul class="list-inline d-flex justify-content-between mb-2">
                <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_chapter->author ?> / Lượt xem - <?php echo $row_chapter->view?></li>
                <li class="list-inline-item"><?php echo $row_chapter->created?></li>
              </ul>
              <h6><a class="text-dark <?php if($row_chapter->id == $id){echo "current-chap";}else{ echo "";}?>" href="<?php echo site_url('truyen/'.$story->slug.'-'.$row_chapter->slug.'-'.$row_chapter->id)?>"><?php echo $row_chapter->name?></a></h6>
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
      </div>
    </div>
  </div>
</section>
<!-- /blog single -->