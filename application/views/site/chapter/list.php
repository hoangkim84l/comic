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
          <li class="list-inline-item"><i class="ti-user mr-2"></i><?php echo $story->author?></li>
          <li class="list-inline-item"><i class="ti-calendar mr-2"></i><?php $date = date_create($story->created);
                                                                              echo date_format($date,'d-m-Y H:i:s')?></li>
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