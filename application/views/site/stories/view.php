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
<!-- Raty -->
<script type="text/javascript">
$(document).ready(function() {
	//raty
	$('.raty_detailt').raty({
    	  score: function() {
    	    return $(this).attr('data-score');
    	  },
    	  half    : true,
    	  click: function(score, evt) {
        	  var rate_count = $('.rate_count');
        	  var rate_count_total = rate_count.text();
    		  $.ajax({
	  				url: '<?php echo site_url('stories/raty')?>',
	  				type: 'POST',
	  				data: {'id':'<?php echo $stories->id?>','score':score},
	  				dataType: 'json',
	  				success: function(data)
	  				{
	  					if(data.complete)
	  					{
		  					var total = parseInt(rate_count_total)+1;
	  						rate_count.html(parseInt(total));
		  				}
	  					alert(data.msg);	
	  				} 
    		  });
  		  }
      });
});
</script>
<!-- blog single -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <ul class="list-inline d-flex justify-content-between py-3">
        <!--   <li class="list-inline-item"><i class="ti-user mr-2"></i><?php echo $stories->author?></li>
          <li class="list-inline-item"><i class="ti-calendar mr-2"></i><?php echo $stories->created?></li>-->
        </ul> 
        <div class="row">
          <div class="col-lg-7 col-sm-12" style="display: flex;justify-content: center;">
              <img class=" img-fluid mb-4" src="<?php echo $stories->image_link != '' ? base_url('upload/stories/'.$stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $stories->name?>">
          </div>
          <div class="col-lg-5 col-sm-12">
            <h6 class="title-book"><?php echo $stories->name?></h6>
            <span class="info-book"><i class="ti-user mr-2"></i><?php echo $stories->author?></span>
            <span class="info-book"><i class="ti-calendar mr-2"></i><?php 
                              $date = date_create($stories->created);
                              echo date_format($date,'d-m-Y H:i:s')?>
            </span>
            <span class="info-book"><i class="ti-eye mr-2"></i><?php echo number_format($stories->view)?> Lượt xem</span>
            <span class="info-book"><i class="ti-book mr-2"></i> <a href="<?php echo site_url('danh-sach-chuong/'.$stories->slug.'-'.$stories->id)?>" style="color: #000;padding-left:0px;"><?php echo count($list_chapters)?> Chương </a></span>
            <span class="info-book"><i class="ti-pencil mr-2"></i><?php echo $stories->continues == 0 ?  "Còn tiếp" :  "Hoàng thành";?></span>
            <span class="info-book"><i class="ti-flag-alt-2 mr-2"></i> <?php echo $name_catalog->name?></span>
            <span class="info-book">Đánh giá: 
            <?php if(isset($user_info)):?>
              <span class='raty_detailt' style = 'margin:5px' id='<?php echo $stories->id?>' data-score='<?php echo  ($stories->rate_count > 0) ? $stories->rate_total/$stories->rate_count : 0?>'></span> <br/>
            <?php else: ?>
              <br/><a href="<?php echo site_url('user/login')?>" target="_blank" rel="noopener noreferrer" class="link-login">Đăng nhập</a> để đánh giá về truyện<br/>
            <?php endif; ?> 
                    Tổng số: <b  class='rate_count'><?php echo $stories->rate_count?> Đánh giá</b>
            </span>
          </div>
        </div>

        <!--view list chapter-->
        <section class="section">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <!-- /blog single -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active f-s-tab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cốt truyện</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link f-s-tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Danh sách chương</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="content">
                        <p><?php echo $stories->description ?></p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br/>
                    <h6>Danh sách Chương/Chapter</h6>
                    <div class="container-fluid">
                      <div class="scrollbar scrollbar-type-3" id="style-1">
                        <div class="force-overflow">
                          <div class="row">
                              <?php foreach($list_chapters as $row):?>
                              <div class="col-xs-12 col-sm-4 list-chapters"><a href="<?php echo site_url('truyen/'.$stories->slug.'-'.$row->slug.'-'.$row->id)?>"> <?php echo $row->name?></a></div>
                              <?php endforeach;?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>        
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-lg-4">
      <div class="widget"><br/>
          <a href="<?php echo site_url('danh-sach-chuong/'.$stories->slug.'-'.$stories->id)?>"><h6 class="mb-4">CHƯƠNG/CHAPTER</h6></a>
            <div class="scrollbar" id="style-1">
              <div class="force-overflow">
              <?php foreach($list_chapters as $row_chapter): if($row_chapter->status == 0){ }else{?>
                <div class="media mb-4">
                  <div class="media-body">
                    <ul class="list-inline d-flex justify-content-between mb-2">
                      <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $stories->author ?></li>
                      <li class="list-inline-item"><?php $date = date_create($row_chapter->created);
                                                          echo date_format($date,'d-m-Y H:i:s')?></li>
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
                <li class="list-inline-item"><?php $date = date_create($row_stories->created);
                                                          echo date_format($date,'d-m-Y H:i:s')?></li>
              </ul>
              <h6><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>"><?php echo $row_stories->name?></a>  <i class="ti-eye mr-2"></i><?php echo number_format($row_stories->view)?></h6>
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
<!-- /story single -->
