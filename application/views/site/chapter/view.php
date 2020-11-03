<!-- page-title -->
<section class="section bg-secondary section-detail">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo site_url('xem-truyen/'.$story->slug.'-'.$story->id)?>"><h4><?php
          echo $story->name;?></h4></a>
        <h5>&nbsp;&nbsp;&nbsp;<?php echo $chapter->name?></h5>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->
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
      <div class="col-lg-12">
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
                    <span itemprop="title" property="name"> <?php echo $story->name?> / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('truyen/'.$story->slug.'-'.$chapter->slug.'-'.$chapter->id)?>">
                    <span itemprop="title" property="name"> <?php echo $chapter->name; ?> / </span>
                </a>
            </li>
        </ul>
      </div>
        <div class="row">
          <div class="col-lg-12 cus-text-right">
            <div class="btn-click row">
                <?php
                  $id = $this->uri->rsegment(3);
                  $output = explode("-",$id);
                  $id =  $output[count($output)-1]; 
                  $array_values = array_values($list_chapters);
                  $chapnext = '';
                  $chapprev = '';
                  foreach($list_chapters as $k => $val){
                    if($val->slug === $chapter->slug){

                      // echo  $val->slug;
                    }
                  }
                  foreach ($list_chapters as $key => $cv ) {
                    $previous = array_key_exists($key - 1, $list_chapters) ? $list_chapters[$key -1] : false;
                    $next = array_key_exists($key + 1, $list_chapters) ? $list_chapters[$key +1] : false;
                    if($cv->slug === $chapter->slug){
                        if($previous){
                          $chapnext = $previous->id;
                        }
                        if($next){
                          $chapprev = $next->id;
                        }
                    }
                    
                }
                ?>
                <?php if(count($array_values) == 1){
                    echo "";
                }else{ ?>
                <?php if ((array_pop($array_values)->id) != ($id)) { ?>
                  <!-- <a href="<?php echo base_url('truyen/'.$story->slug.'-'. $chapter->slug.'-'.($id-1))?>" class="previous">&laquo; Chương trước</a> -->
                  <a href="<?php echo base_url('truyen/'.$story->slug.'-'. $chapprev)?>" class="previous">&laquo; Chương trước</a>
                <?php } else {
                    echo "";
                }?>
                <div class="dropdown ">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Chương
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu list-chapter">
                    <?php foreach($list_chapters as $row_chapter): if($row_chapter->status == 0){ }else{?>
                      <li><a class="<?php if ($row_chapter->id == $id) {
                                    echo "current-chap";
                                } else {
                                    echo "";
                                }?> custom-border"  href="<?php echo site_url('truyen/'.$story->slug.'-'.$row_chapter->slug.'-'.$row_chapter->id)?>"><?php echo $row_chapter->name?></a></li>
                      <?php } endforeach;?>
                  </ul>
                </div>
                <?php if ((array_shift($array_values)->id) != ($id)) { ?>
                  <!-- <a href="<?php echo base_url('truyen/'.$story->slug.'-'.($id+1))?>" class="next">Chương sau &raquo;</a> -->
                  <a href="<?php echo base_url('truyen/'.$story->slug.'-'.$chapnext)?>" class="next">Chương sau &raquo;</a>
                <?php } else {
                    echo "";
                }}?>
              </div>
          </div>
        </div>
        <?php if($chapter->audio_link != ''){?>
        <div class="row">
          <div class="col-lg-12 cus-text-right">        
            <audio controls>
              <source src="<?php echo base_url('upload/chapter/'.$chapter->audio_link)?>" type="audio/mpeg">
            </audio>
          </div>
        </div>
        <?php }?>
        <?php if($chapter->image_link != '' && $chapter->show_img == 1){ ?>
        <div class="scrollbar scrollbar-style-2" id="style-1">
          <div class="force-overflow">
            
            <h6>Bằng hữu có thể click vào ảnh để zoom đó</h6><br/>
            <img id="custom-setid-zoom-image" class="w-100 img-fluid mb-4" src="<?php echo $chapter->image_link != '' ? base_url('upload/chapter/'.$chapter->image_link) : base_url('upload/chapter/default.jpg') ?>" alt="<?php echo $chapter->name?>">
            <!-- <img  src="https://media.geeksforgeeks.org/wp-content/uploads/20190912174307/qwe1.png" alt="Snow" style="width:100%;max-width:300px"> -->
            <!-- The Modal -->
            <div id="custom-model-zoom-image" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="custom-zoom-image">
            </div>
          </div>
        </div> 
        <?php } else{ echo "";}?>  
        <div class="force-overflow-new">
          <div class="content">
            <p><?php echo $chapter->content ?></p>
          </div>
        </div>  

        <div class="row">
          <div class="col-lg-12 cus-text-right">
            <div class="btn-click row">
                <?php
                  $id = $this->uri->rsegment(3);
                  $output = explode("-",$id);
                  $id =  $output[count($output)-1]; 
                  $array_values = array_values($list_chapters);
                ?>
                <?php if(count($array_values) == 1){
                    echo "";
                }else{ ?>
                <?php if ((array_pop($array_values)->id) != ($id)) { ?>
                  <a href="<?php echo base_url('truyen/'.$story->slug.'-'.$chapprev)?>" class="previous">&laquo; Chương trước</a>
                <?php } else {
                    echo "";
                }?>
                <div class="dropdown ">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Chương
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu list-chapter">
                    <?php foreach($list_chapters as $row_chapter): if($row_chapter->status == 0){ }else{?>
                      <li><a class="<?php if ($row_chapter->id == $id) {
                                    echo "current-chap";
                                } else {
                                    echo "";
                                }?> custom-border"  href="<?php echo site_url('truyen/'.$story->slug.'-'.$row_chapter->slug.'-'.$row_chapter->id)?>"><?php echo $row_chapter->name?></a></li>
                      <?php } endforeach;?>
                  </ul>
                </div>
                <?php if ((array_shift($array_values)->id) != ($id)) { ?>
                  <a href="<?php echo base_url('truyen/'.$story->slug.'-'.$chapnext)?>" class="next">Chương sau &raquo;</a>
                <?php } else {
                    echo "";
                }}?>
              </div>
          </div> 
      </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h6 class="mb-4">Chap/Chương bạn vừa xem</h6>
          <?php 
            $list_chap = array_unique($recentlyChapViewed);
            $list_chap_new = array();
            $this->load->model('story_model');
            $this->load->model('chapter_model');
            foreach($list_chap as $val){
              $chapter = $this->chapter_model->get_info($val);
              array_push($list_chap_new,$chapter);
            }    
            foreach($list_chap_new as $row_chap):
            if($row_chap->status == 0){ }else{
              $story = $this->story_model->get_info($row_chap->story_id);
            ?>
              <div class="col-lg-6 media mb-4 ">
                <div class="media-body">
                  <ul class="list-inline d-flex justify-content-between mb-2">
                    <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $story->author;?> | <?php $date = date_create($row_chap->created); echo date_format($date,'d-m-Y')?></li>
                    <li class="list-inline-item"></li>
                  </ul>
                  <h6><a class="text-dark fix-title-2-line" href="<?php echo site_url('truyen/'.$story->slug.'-'.$row_chap->slug.'-'.$row_chap->id)?>"><?php echo $row_chap->name?></a></h6>
                </div>
              </div>
          <?php
            } endforeach;?> 
      </div>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <h6 class="mb-4">Thể loại</h6>
          <ul class="list-inline tag-list">
              <?php foreach($catalogs as $row_catalog):?>
                <li class="list-inline-item m-1"><a href="<?php echo site_url('danh-muc/'.$row_catalog->slug.'-'.$row_catalog->id)?>"><?php echo $row_catalog->name?></a></li>
              <?php endforeach;?>
          </ul>
      </div>
    </div>
  </div>
</section>
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
            <form action="<?php echo site_url('comment/index');?>" class="row" method="POST" id="postComment">
              <input type="hidden" class="form-control " name="user_id" id="user_id" value="<?php echo $user_info->id?>">
              <input type="hidden" class="form-control form-control-text col-lg-4" name="name"  value="">
              <input type="hidden" class="form-control mb-4" name="post_id" id="post_id" value="<?php echo $chapter->id?>">
              <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="">
              <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
              <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
              <div class="col-lg-12">
                <textarea name="body" id="body" class="form-control mb-4" placeholder="Lời nhắn..."></textarea>
              </div>
              <div class="form-group custom-sticker-p">
                  <div id="show-stiker-selected">
                    <img src="" alt="" id="stickerSelected" width="100px">
                    <span id="deleteStiker">Xóa sticker</span>
                  </div>
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
              <form action="<?php echo site_url('comment/ChapCommentWithoutLogin');?>" class="row" method="POST">
                <input type="hidden" class="col-lg-4" name="user_id" id="user_id" value="">
                
                <input type="text" class="form-control form-control-text col-lg-4" id="name" name="name" value="" placeholder=" Tên của bạn" required>
                
                <input type="hidden" class="form-control mb-4" name="story_id" id="story_id" value="">
                <input type="hidden" class="form-control mb-4" name="post_id" id="post_id" value="<?php echo $chapter->id?>">
                <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
                <input type="hidden" class="form-control mb-4" name="icon" id="icon" value="">
                <br/>
                <div class="col-lg-12">
                  <textarea name="body" id="body" class="form-control mb-4" placeholder="Lời nhắn..."></textarea>
                </div>
                <div class="form-group custom-sticker-p">
                  <div id="show-stiker-selected">
                    <img src="" alt="" id="stickerSelected" width="100px">
                    <span id="deleteStiker">Xóa sticker</span>
                  </div>
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
            <?php endif;?>
            <br/>
            
            <div class="scrollbar" id="style-1">
              <div class="force-overflow">
                <?php $i = 0 ; foreach($comments as $row):
                     $this->load->model('user_model');
                     $users = $this->user_model->get_info($row->user_id);
                  ?>
                  <div class="media mb-4">
                    <div class="post-thumb-sm mr-3">
                      <img class="img-fluid" src="<?php echo !empty($users->image_link) ? base_url('upload/user/'.$users->image_link) : base_url('upload/stories/default.jpg');?>" alt="<?php echo $row->body?>">
                    </div>
                    <div class="media-body">
                      <ul class="list-inline d-flex justify-content-between mb-2">
                        <li class="list-inline-item">
                          <b><?php 
                            if($row->name == NULL){
                              echo $users->name."<i> - Thành viên</i>";
                            }else{
                              echo $row->name."<i> - Khách</i>";
                            }
                          ?></b>
                        </li>
                        <li class="list-inline-item"><?php $date = date_create($row->created); echo date_format($date,'d-m-Y')?></li>
                      </ul>
                      <span><?php echo $row->body?></span>
                      <p id="icon<?php echo $i;?>" style="display:none;"><?php echo $row->icon ?></p>
                      <img id="myIcon<?php echo $i;?>" src="" width="70px">
                      <script type="text/javascript">
                          var key = $('#icon<?php echo $i;?>').text();
                          $('#myIcon<?php echo $i;?>').attr('src', icon[key]);
                      </script>
                    </div>
                  </div>
                  <?php $i++; endforeach;?>
              </div>
                
            </div>
            
          </div>
          <div class="tab-pane fade" id="profile-cafesua" role="tabpanel" aria-labelledby="profile-tab-facebook">
            <br/>
            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/vi_VN/all.js#appId=170796359666689&amp;xfbml=1"></script>
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
  });
    
});

$('#deleteStiker').click(function(e){
    e.preventDefault(); //to prevent standard click event
    $('#stickerSelected').attr('src', '');
    document.getElementById("show-stiker-selected").style.display  = "none";
});

</script>
<script>
    // Get the modal
    var modal = document.getElementById("custom-model-zoom-image");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("custom-setid-zoom-image");
    var modalImg = document.getElementById("custom-zoom-image");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    $(document).click(function() { 
        if($(modalImg).is(':visible')) {
            popups_close();
        }
    });
</script>