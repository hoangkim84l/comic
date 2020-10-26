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
      <div class="container-fluid">
            <div class="row">
            <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>">
                    <span itemprop="title" property="name"> <?php echo  $story->name;?> / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="3" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('danh-sach-chuong/'.$story->slug.'-'.$story->id)?>">
                    <span itemprop="title" property="name"> Danh sách chương - chapter</span>
                </a>
            </li>
        </ul>
            </div>
      </div>
        <br/>
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