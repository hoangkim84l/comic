<!-- page-title -->
<section class="section bg-secondary section-detail">
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
<script type="text/javascript">
    var icon; //Tạo biến lưu nội dung file json được đọc
    //Tạo hàm đọc file
    function readTextFile(file) 
    {
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function ()
        {
            if(rawFile.readyState === 4)
            {
                if(rawFile.status === 200 || rawFile.status == 0)
                {
                    var allText = rawFile.responseText;
                    icon = JSON.parse(allText); //đọc dữ liệu json của file và lưu vào biến icon
                }
            }
        }
        rawFile.send(null);
    }

    //Chọn file để đọc nào
    readTextFile("<?php echo public_url()?>site/js/icon.json");
</script>

<!-- blog single -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
        <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="website" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="website" href="<?php echo site_url('xem-truyen/'.$stories->slug.'-'.$stories->id)?>">
                    <span itemprop="title" property="name"> <?php echo $stories->name?> </span>
                </a>
            </li>
        </ul>
        </div>
        <div class="row">
          <div class="col-lg-7 col-sm-12" style="width:100%; text-align: center; ">
              <img class=" img-fluid mb-4" src="<?php echo $stories->image_link != '' ? base_url('upload/stories/'.$stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $stories->meta_desc;?>" title="<?php echo $stories->site_title;?>">
          </div>
          <div class="col-lg-5 col-sm-12">
            <h6 class="title-book"><?php echo $stories->name?></h6>
            <span class="info-book"><i class="ti-user mr-2"></i><?php echo $stories->author?></span>
            <span class="info-book"><i class="ti-calendar mr-2"></i><?php 
                              $date = date_create($stories->created);
                              echo date_format($date,'d-m-Y H:i:s')?>
            </span>
            <span class="info-book"><i class="ti-eye mr-2"></i><?php echo number_format($stories->view)?> Lượt xem</span>
            <span class="info-book"><i class="ti-book mr-2"></i> <a href="<?php echo site_url('danh-sach-chuong/'.$stories->slug.'-'.$stories->id)?>" style="color: #000;padding-left:0px;"><?php echo count($input_count)?> Chương </a></span>
            <span class="info-book"><i class="ti-pencil mr-2"></i><?php echo $stories->continues == 0 ?  "Còn tiếp" :  "Hoàn thành";?></span>
            <span class="info-book"><i class="ti-flag-alt-2 mr-2"></i> 
              <?php 
                 $this->load->model('catalog_model');
                 $catalog = $this->catalog_model->get_list();
                 $cata = json_decode($stories->category_id);
                 foreach ($catalog as $data){
                     if (in_array($data->id, $cata)) { ?>
                   <a class="new-links" style='color:#585757' href='/danh-muc/<?php echo $data->id;
                     ?>'><?php echo $data->name.".";?></a>
                 <?php }
                 }
              ?>
            <!-- <?php echo $name_catalog->name?> -->
            </span>
            <span class="info-book">Đánh giá: 
            <?php if(isset($user_info)):?>
              <span class='raty_detailt' style = 'margin:5px' id='<?php echo $stories->id?>' data-score='<?php echo  ($stories->rate_count > 0) ? $stories->rate_total/$stories->rate_count : 0?>'></span> <br/>
            <?php else: ?>
              <br/><a href="<?php echo site_url('user/login')?>" target="_blank" rel="noopener noreferrer" class="link-login">Đăng nhập</a> để đánh giá về truyện<br/>
            <?php endif; ?> 
                    Tổng số: <b  class='rate_count'><?php echo $stories->rate_count?> Đánh giá</b>
            </span>
            <span class="info-book" title="Submit Yêu Thích để nhận mail khi có chap mới nha.">
              <form action="<?php echo site_url('stories/love_lists')?>" method="post">
                <?php if(isset($user_info)): 
                  $this->load->model('lovelists_model');
                  $inputArr = array();
                  $iinputArrnput['where'] = array('user_id', $user_info->id);
                  $get_lists = $this->lovelists_model->get_list($inputArr);
                  $btnCheck = '';
                  foreach($get_lists as $val){
                    if($val->story_id == $stories->id){
                      $btnCheck .= 'apper';
                    }
                  }
                  ?>
                  <?php $message = $this->session->flashdata('message'); if(isset($message)):?>
                    <label for="" style="color: #FF8C33;"><?php echo $message;?></label>
                  <?php endif;?>
                  <input type="hidden" name="user_id" value="<?php echo $user_info->id?>">
                  <input type="hidden" name="story_id" value="<?php echo $stories->id?>">
                  <input type="hidden" name="user_email" value="<?php echo  $user_info->email?>">
                  <button type="submit" class="btn btn-primary" <?php if($btnCheck=="apper")echo "disabled"?>><img width="30px" style=" padding-right: 3px; margin-right: 5px; " src="<?php echo public_url()?>site/images/fv.png" alt="đọc truyện cafe sữa, cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Yêu thích</button>
                <?php else: ?>
                  <label for=""><a href="<?php echo site_url('user/login')?>" target="_blank" rel="noopener noreferrer" class="link-login">Đăng nhập</a> để sữ dụng chức năng này</label>
                  <button type="" class="btn btn-primary" disabled> <img width="30px" style=" padding-right: 3px; margin-right: 5px; " src="<?php echo public_url()?>site/images/fv.png" alt="đọc truyện cafe sữa, cafe sữa novel, Web comic truyện tranh, truyện nhân gian">Yêu thích</button>
                <?php endif;?>  
              </form>
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
                    <a class="nav-link active f-s-tab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;">  
                      Cốt truyện
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link f-s-tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                      <img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;">
                      Danh sách chương
                    </a>
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
                              <?php foreach($list_chapters as $row): if($row->status == 0){ }else{ ?>
                                <a href="<?php echo site_url('truyen/'.$stories->slug.'-'.$row->slug.'-'.$row->id)?>" class="cus-class-12">
                                  <div class="cus-class-6"><?php echo $row->name?></div>
                                  <div class="cus-class-6"><?php echo $row->created?></div>
                                </a>
                              <?php } endforeach;?>
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
        <section class="section">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h6 class="mb-4">Truyện vừa xem</h6>
                  <?php 
                    $list_stories = array_unique($recentlyViewed);
                    $list_stories_new = array();
                    $this->load->model('story_model');
                    foreach($list_stories as $val){
                      $stories_view = $this->story_model->get_info($val);
                      array_push($list_stories_new,$stories_view);
                    }
                    foreach($list_stories_new as $row_stories):
                    if($row_stories->status == 0){ }else{
                       
                        ?>
                      <div class="col-lg-6 media mb-4 ">
                        <div class="post-thumb-sm mr-3" style="overflow:inherit">
                        <a href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>"  style="padding: 8px 0px;">
                          <img class="img-fluid" loading="lazy" src="<?php echo $row_stories->image_link != '' ? base_url('upload/stories/'.$row_stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row_stories->name?>">
                        </a>    
                        </div>
                        <div class="media-body">
                          <ul class="list-inline d-flex justify-content-between mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_stories->author?> <br/> <?php $date = date_create($row_stories->created);  echo date_format($date,'d-m-Y')?></li>
                          </ul>
                          <h6><a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>"><?php echo $row_stories->name?></a> </h6>
                        </div>
                      </div>
                  <?php
                    } endforeach;?> 
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
                      <li class="list-inline-item"><?php $date = date_create($row_chapter->created); echo date_format($date,'d-m-Y')?></li>
                    </ul>
                    <h6><a class="text-dark fix-title-2-line" href="<?php echo site_url('truyen/'.$stories->slug.'-'.$row_chapter->slug.'-'.$row_chapter->id)?>"><?php echo $row_chapter->name?></a></h6>
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
              <a href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>">
                <img class="img-fluid" src="<?php echo $row_stories->image_link != '' ? base_url('upload/stories/'.$row_stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row_stories->meta_desc?>" title="<?php echo $row_stories->site_title;?>">
              </a>
            </div>
            <div class="media-body">
              <ul class="list-inline d-flex justify-content-between mb-2">
                <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_stories->author?> </li>
                <li class="list-inline-item"><?php $date = date_create($row_stories->created);
                                                          echo date_format($date,'d-m-Y')?></li>
              </ul>
              <h6><a class="text-dark fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>"><?php echo $row_stories->name?></a></h6>
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
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- /blog single -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            
            <a class="nav-link active" id="home-tab-cafesua" data-toggle="tab" href="#home-cafesua" role="tab" aria-controls="home" aria-selected="true"><img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;"> Bình luận ở đây nè</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab-facebook" data-toggle="tab" href="#profile-cafesua" role="tab" aria-controls="profile" aria-selected="false"> <img src="<?php echo public_url('') ?>site/images/icon-stars-2.png" alt="cafe sữa novel" style="height: 30px;"> Bình luận với Facebook</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-cafesua" role="tabpanel" aria-labelledby="home-tab-cafesua">
            <br/>
            <?php if(isset($user_info)):?>
            <form action="<?php echo site_url('comment/storyHaveLogin');?>" class="row" method="POST" id="postComment" name="postComment">
              <input type="hidden" class="form-control " name="user_id" id="user_id" value="<?php echo $user_info->id?>">
              <input type="hidden" class="form-control form-control-text col-lg-4" name="name"  value="">
              <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id?>">
              <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
              <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
              <input type="text" class="form-control form-control-text col-lg-12" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
              
              <div class="form-group custom-sticker-p">
                  <div id="show-stiker-selected">
                    <img src="" alt="" id="stickerSelected" width="100px">
                    <span id="deleteStiker">Xóa sticker</span>
                  </div>
                  <br/>
                  <input type='button' id='hideshow' value='Chọn sticker'>
                  <div id='content-a' style="display:none;">
                  <?php $listIcons = json_decode(file_get_contents(public_url('site/js/icon.json')));
                       foreach ($listIcons as $key => $val) {
                           ?>
                          <div class="custom-icon">
                            <img src="<?php echo $val;?>" width="70px" data-key="<?php echo $key;?>" data-src="<?php echo $val;?>">
                          </div>
                          <?php
                          } ?>
                  </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" id="clickClear">Lên Lên</button>
              </div>
            </form>
            <?php else:?>
              <form action="<?php echo site_url('comment/story');?>" class="row" method="POST" id="postComment" name="postComment">
                <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="">
                <input type="text" class="form-control form-control-text col-lg-4" name="name" id="name" value="" placeholder=" Tên của bạn" required autocomplete="off">
                <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id?>">
                <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
                <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                <br/> <br/>
                <input type="text" class="form-control form-control-text col-lg-12" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
                <br/>
                <div class="form-group custom-sticker-p">
                  <div id="show-stiker-selected">
                    <img src="" alt="" id="stickerSelected" width="100px">
                    <span id="deleteStiker">Xóa sticker</span>
                  </div>
                  <br/>
                  <input type='button' id='hideshow' value='Chọn sticker'>
                  <div id='content-a' style="display:none;">
                  <?php $listIcons = json_decode(file_get_contents(public_url('site/js/icon.json')));
                       foreach ($listIcons as $key => $val) {
                           ?>
                          <div class="custom-icon">
                            <img src="<?php echo $val;?>" width="70px" data-key="<?php echo $key;?>" data-src="<?php echo $val;?>">
                          </div>
                          <?php
                          } ?>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" id="clickClear" >Lên Lên</button>
                </div>
              </form>
            <?php endif;?>
            <br/>
            <div class="scrollbar" id="style-1">
              <div class="force-overflow">
                <?php $i = 0 ; foreach($comments as $row): if($row->parent_id > 0){ echo "";}else{?>
                  <div class="media mb-4" id='showReplyForm'>
                    <div class="post-thumb-sm mr-3">
                      <img class="img-fluid" src="<?php
                            $this->load->model('user_model');
                            if ($row->user_id == 0 || $row->user_id < 0) {
                                $user_id_custom = 1;
                            } else {
                                $user_id_custom = $row->user_id;
                            }
                          $users = $this->user_model->get_info($user_id_custom);
                          echo !empty($users->image_link) ? base_url('upload/user/'.$users->image_link) : base_url('upload/stories/default.jpg')?>" alt="<?php echo $row->body?>">
                    </div>
                    <div class="media-body">
                      <ul class="list-inline d-flex justify-content-between mb-2">
                        <li class="list-inline-item">
                          <b><?php
                            if ($row->name == null) {
                                echo $users->name."<small><i> - Thành viên</i> <a  href='javascript:void(0)'>Trả lời</a></small>";
                            } else {
                                echo $row->name."<small><i> - Khách</i> <a  href='javascript:void(0)'>Trả lời</a></small>";
                            }
                          ?></b>
                        </li>
                        <li class="list-inline-item"><?php $date = date_create($row->created); echo date_format($date, 'd-m-Y')?></li>
                      </ul>
                      <span><?php echo $row->body;?></span>
                      <p id="icon<?php echo $i;?>" style="display:none;"><?php echo $row->icon ?></p>
                      <img id="myIcon<?php echo $i;?>" src="" width="70px">
                      <script type="text/javascript">
                          var key = $('#icon<?php echo $i;?>').text();
                          $('#myIcon<?php echo $i;?>').attr('src', icon[key]);
                      </script>
                      <br/><br/>
                      <?php if (!empty($row->subs)):?>
                        <?php foreach ($row->subs as $sub): ?>
                          <div class="row">
                            <div class="col-lg-1">
                            <img class="img-fluid" src="<?php
                                $this->load->model('user_model');
                                if ($sub->user_id == 0 || $sub->user_id < 0) {
                                    $user_id_customs = 1;
                                } else {
                                    $user_id_customs = $sub->user_id;
                                }
                              $user_r = $this->user_model->get_info($user_id_customs);
                              echo !empty($user_r->image_link) ? base_url('upload/user/'.$user_r->image_link) : base_url('upload/stories/default.jpg')?>" alt="<?php echo $sub->body?>">
                        
                            </div>
                            <div class="col-lg-11">
                              <div class="row"> 
                                <div class="col-lg-12">
                                  <b><?php
                                  if ($sub->name == null) {
                                      echo $users->name."<i> - Thành viên</i> &nbsp;&nbsp;&nbsp; ";
                                  } else {
                                      echo $sub->name."<i> - Khách</i> &nbsp;&nbsp;&nbsp; ";
                                  }
                                ?></b>
                                </div>
                                <div class="col-lg-12">
                                <span><?php echo $sub->body?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach;?>
                      <?php endif;?>
                    </div>
                    <br/>
                    <br>
                    <?php if (isset($user_info)):?>
                    <form action="<?php echo site_url('comment/replyComment');?>" class="row hidden" method="POST" id="postComments" name="postComments" style="padding-left: 50px;">
                      <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="<?php echo $user_info->id?>">
                      <input type="hidden" class="form-control form-control-text col-lg-4" name="name" id="name" value="" placeholder=" Tên của bạn"  autocomplete="off">
                      <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id?>">
                      <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="<?php echo $row->id ?>">
                      <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                      <br/> <br/>
                      <input type="text" class="form-control form-control-text col-lg-10" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
                      <br/>
                      <div class="col-12">
                        <br/>
                        <button class="btn btn-primary" id="clickClear" >Lên Lên</button>
                        <br/>
                      </div>
                    </form>
                  <?php else:?>
                    <form action="<?php echo site_url('comment/replyComment');?>" class="row hidden" method="POST" id="postComments" name="postComments" style="padding-left: 50px;">
                          <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="">
                          <input type="text" class="form-control form-control-text col-lg-4" name="name" id="name" value="" placeholder=" Tên của bạn" required autocomplete="off">
                          <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="<?php echo $stories->id?>">
                          <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="<?php echo $row->id ?>">
                          <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                          <br/> <br/>
                          <input type="text" class="form-control form-control-text col-lg-10" name="body" id="body" value="" placeholder="Ý kiến của huynh đài" autocomplete="off">
                          <br/>
                          <div class="col-12">
                            <br/>
                            <button class="btn btn-primary" id="clickClear" >Lên Lên</button>
                            <br/>
                          </div>
                        </form>
                  <?php endif;?>
                  </div>
                  
                  <?php $i++; } endforeach;?>
              </div>
                
            </div>
            
          </div>
          <div class="tab-pane fade" id="profile-cafesua" role="tabpanel" aria-labelledby="profile-tab-facebook">
            <br/>
            <div id="fb-root"></div>
            <script src="https://connect.facebook.net/vi_VN/all.js#appId=170796359666689&amp;xfbml=1"></script>
            <div class="fb-comments"  data-href="<?php echo current_url() ?>"
                 data-num-posts="5"   data-width="100%"   data-colorscheme="light">
            </div>
          </div>
         
        </div>        
      </div>
    </div>
  </div>
</section>
<script>
document.getElementById("show-stiker-selected").style.display  = "none";

$('#hideshow').click(function(e){
    e.preventDefault(); //to prevent standard click event
    $('#content-a').toggle(500);
});

$('#content-a img').each(function(){
  $(this).click(function() {
    $('#icon').val(this.getAttribute("data-key"));
    $('#stickerSelected').attr('src', this.getAttribute("data-src"));
    document.getElementById("show-stiker-selected").style.display  = "block";
    $('#content-a').toggle(500);
  });
    
});

$('#deleteStiker').click(function(e){
    e.preventDefault(); //to prevent standard click event
    $('#stickerSelected').attr('src', '');
    document.getElementById("show-stiker-selected").style.display  = "none";
});

$(document).ready(function(){
   $(".force-overflow #showReplyForm").each(function(item, index){
    $(this).click(function(){
      console.log($(this).removeClass('hidden'));
      $(this).find("#postComments").removeClass('hidden');
    })
    
  });
});
</script>