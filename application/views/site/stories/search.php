<!-- page-title -->
<section class="section bg-secondary">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h4>Kết quả tìm kiếm với từ khóa "<?php echo $key?>"</h4>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->
<div class="container-fluid">
    <div class="row">
      <br>
    <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
      <li property="itemListElement" typeof="ListItem">
          <meta property="position" content="1" />
          <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
              <span itemprop="title" property="name">Trang chủ / </span>
          </a>
      </li>
      <li property="itemListElement" typeof="ListItem">
          <meta property="position" content="2" />
          <a property="item" itemprop="url" typeof="WebPage" href="/truyen/tim-kiem-truyen?key-search=">
              <span itemprop="title" property="name"> Tìm truyện : <?php echo $key?></span>
          </a>
      </li>
  </ul>
  </div>
</div>
<!-- category post -->
<section >
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="row masonry-container pt-5">
            <?php foreach($list as $row): if($row->status == 0){ }else{?>
              <div class="col-lg-3 col-sm-6 mb-5">
                <article class="text-center box-content">
                <a href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>">
                  <img class="img-fluid mb-4 img-fluid-stories" loading="lazy" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?>" title="<?php echo $row->site_title?>">
                </a>
                  <center><div class='raty' style='margin:10px 0px' id='<?php echo $row->id?>' data-score='<?php echo  ($row->rate_count > 0) ? $row->rate_total/$row->rate_count : 0?>'></div></center>
                  <h4 class="title-border">
                    <a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row->slug.'/'.$row->id)?>"><?php echo $row->name?></a>
                  </h4>
                  <div class="text-center">
                    <i class="ti-eye mr-2"></i><?php echo number_format($row->view)?> Lượt xem
                  </div>
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

		        </div>
            <nav>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /category post -->