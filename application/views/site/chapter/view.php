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
          <img class="w-100 img-fluid mb-4" src="<?php echo $chapter->image_link != '' ? base_url('upload/chapter/'.$chapter->image_link) : base_url('upload/chapter/default.jpg') ?>" alt="<?php echo $chapter->name?>">
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
          <?php if(count($array_values) == 1){
              echo "";
          }else{ ?>
          <?php if ((array_pop($array_values)->id) != ($id)) { ?>
            <a href="<?php echo base_url('truyen/'.$story->slug.'-'.($id-1))?>" class="previous">&laquo; Chương trước</a>
          <?php } else {
              echo "";
          }?>
          <?php if ((array_shift($array_values)->id) != ($id)) { ?>
            <a href="<?php echo base_url('truyen/'.$story->slug.'-'.($id+1))?>" class="next">Chương sau &raquo;</a>
          <?php } else {
              echo "";
          }}?>
        </div>
      </div>  
      <div class="widget">
          <h6 class="mb-4">CHƯƠNG/CHAPTER</h6>
          <div class="scrollbar" id="style-1">
              <div class="force-overflow">
              <?php 
                foreach($list_chapters as $row_chapter): if($row_chapter->status == 0){ }else{?>
                <div class="media mb-4">
                  <div class="media-body">
                    <ul class="list-inline d-flex justify-content-between mb-2">
                      <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_chapter->author ?> <i class="ti-eye mr-2"></i><?php echo number_format($row_chapter->view)?></li>
                      <li class="list-inline-item"><?php echo $row_chapter->created?></li>
                    </ul>
                    <h6><a class="text-dark <?php if ($row_chapter->id == $id) {
                    echo "current-chap";
                } else {
                    echo "";
                }?>" href="<?php echo site_url('truyen/'.$story->slug.'-'.$row_chapter->slug.'-'.$row_chapter->id)?>"><?php echo $row_chapter->name?></a></h6>
                  </div>
                </div>
                <?php } endforeach;?>
              </div>
          </div>
        </div>  
        <div class="widget">
          <h6 class="mb-4">Thể loại</h6>
          <ul class="list-inline tag-list">
              <?php foreach($catalogs as $row_catalog):?>
                <li class="list-inline-item m-1"><a href="<?php echo site_url('danh-muc/'.$row_catalog->slug.'-'.$row_catalog->id)?>"><?php echo $row_catalog->name?></a></li>
              <?php endforeach;?>
          </ul>
        </div>
        <div class="widget">
          <h6 class="mb-4">Truyện cùng danh mục</h6>
          <?php 
            $count = 0;
            intval($count);
            foreach($list_stories as $row_stories):
            if($row_stories->status == 0){ }else{
                $count++;
                if ($count > 5) {
                    break;
                } ?>
          <div class="media mb-4">
            <div class="post-thumb-sm mr-3">
              <img class="img-fluid" src="<?php echo $row_stories->image_link != '' ? base_url('upload/stories/'.$row_stories->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row_stories->name?>">
         
            </div>
            <div class="media-body">
              <ul class="list-inline d-flex justify-content-between mb-2">
                <li class="list-inline-item"><i class="ti-user mr-2"></i> <?php echo $row_stories->author?> </li>
                <li class="list-inline-item"><?php echo $row_stories->created?></li>
              </ul>
              <h6><a class="text-dark" href="<?php echo site_url('xem-truyen/'.$row_stories->slug.'-'.$row_stories->id)?>"><?php echo $row_stories->name?></a> <i class="ti-eye mr-2"></i> <?php echo number_format($row_stories->view)?></h6>
            </div>
          </div>
          <?php
            } endforeach;?>  
        </div>
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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bình luận ở đầy nè</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bình luận với Facebook</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bình luận với Google</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br/>
            <?php if(isset($user_info)):?>
            <form action="<?php echo site_url('comment/index');?>" class="row" method="POST">
              <input type="hidden" class="form-control mb-4" name="user_id" id="user_id" value="<?php echo $user_info->id?>">
              <input type="hidden" class="form-control mb-4" name="post_id" id="post_id" value="<?php echo $chapter->id?>">
              <input type="hidden" class="form-control mb-4" name="parent_id" id="parent_id" value="0">
              <div class="col-lg-12">
                <textarea name="body" id="body" class="form-control mb-4" placeholder="Lời nhắn..."></textarea>
              </div>
              <div class="col-12">
                <button class="btn btn-primary">Lên Lên</button>
              </div>
            </form>
            <br/>
            <h6 class="mb-4">Bình luận ở đây</h6>
            <div class="scrollbar" id="style-1">
              <div class="force-overflow">
                <?php foreach($comments as $row):?>
                  <div class="media mb-4">
                    <div class="post-thumb-sm mr-3">
                      <img class="img-fluid" src="<?php echo base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->body?>">
                    </div>
                    <div class="media-body">
                      <ul class="list-inline d-flex justify-content-between mb-2">
                        <li class="list-inline-item">
                          <?php
                            $this->load->model('user_model');
                            $input = array();
                            $input['where'] = array('id'=> $row->user_id);
                            $users = $this->user_model->get_info($row->user_id);
                            echo $users->name;
                          ?>
                        </li>
                        <li class="list-inline-item"><?php echo $row->created?></li>
                      </ul>
                      <h6><?php echo $row->body?></h6>
                    </div>
                  </div>
                  <?php endforeach;?>
              </div>
                
            </div>
            <?php else:?>
              Vui lòng <a href="<?php echo site_url('user/login')?>" target="_blank" rel="noopener noreferrer">đăng nhập</a> để sử dụng tính năng này
            <?php endif;?>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br/>
            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/vi_VN/all.js#appId=170796359666689&amp;xfbml=1"></script>
            <div class="fb-comments"  data-href="<?php echo current_url() ?>"
                                    data-num-posts="5" 
                                    data-width="100%" 
                                  data-colorscheme="light">
            </div>
          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br/>
            Google + bị khai tử chúng tôi đang tìm cách thay thế...
          </div>
        </div>        
      </div>
    </div>
  </div>
</section>