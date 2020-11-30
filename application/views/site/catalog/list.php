<!-- page-title -->
<section class="section bg-secondary section-detail">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4><?php echo $catalog->name?></h4>
        <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>danh-muc/<?php echo $catalog->id?>">
                    <span itemprop="title" property="name"><?php echo $catalog->name?></span>
                </a>
            </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- category post -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        
        <div class="row masonry-container pt-5">
            <?php foreach($list_story as $row):?>  
                <div class="col-sm-4 mb-5">
                <article class="text-center">
                    <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
                      <img class="img-fluid mb-4 img-fluid-stories" loading="lazy" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?>" title="<?php echo $row->site_title?>">
                    </a>
                      <p class="text-uppercase mb-2 catalog">
                        <?php
                         $catalog = $this->catalog_model->get_list();
                         $cata = json_decode($row->category_id);
                         foreach ($catalog as $data){
                             if (in_array($data->id, $cata)) { ?>
                           <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                             ?>'><?php echo $data->name.",";?></a>
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
            <?php endforeach;?>   
        </div> 
      </div>
      <!-- /blog post -->
      <div class="col-lg-4">
        <div class="widget">
          <h6 class="mb-4">Truyện được quan tâm</h6>
            <?php foreach($story_newest as $row):?>     
              <div class="media mb-4">
                <div class="post-thumb-sm mr-3">
                  <a  href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
                    <img class="img-fluid mb-4" loading="lazy" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->meta_desc?>" title="<?php echo $row->site_title?>">
                  </a>
                </div>
                <div class="media-body">
                  <ul class="list-inline d-flex justify-content-between mb-2">
                    <li class="list-inline-item"><i class="ti-user mr-2"></i>  <?php echo $row->author?></li>
                    <li class="list-inline-item"><?php echo $row->created?></li>
                  </ul>
                  <h6><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>"><?php echo $row->name?></a></h6>
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
<!-- /category post -->