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

<!-- blog single -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-inline d-flex justify-content-between py-3">
        <ul class="list-inline d-flex justify-content-between py-3">
          <li class="list-inline-item breadcrumb"><a href="<?php echo base_url()?>">Trang chủ</a> / <a href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>"><?php echo $story->name?></a> / Danh sách chapter</li>
        </ul>
        </ul>
        <h6>Danh sách Chương/Chapter</h6>
        <br/>
        <div class="container-fluid" style="min-height: 300px;">
            <div class="row">
                <?php foreach($list_chapters as $row):?>
                <div class="col-sm-4 list-chapters"><a href="<?php echo site_url('truyen/'.$story->slug.'-'.$row->slug.'-'.$row->id)?>"> <?php echo $row->name?></a></div>
                <?php endforeach;?>
            </div>
        </div>
        </div>
      </div> 
  </div>
</section>
<br/>