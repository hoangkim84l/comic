<!-- page-title -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4>Tìm truyện nâng cao</h4>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->
<div class="container">
    <div class="row">
    <ul class="list-inline d-flex justify-content-between py-3">
          <li class="list-inline-item breadcrumb"><a href="<?php echo base_url()?>">Trang chủ</a> / Tìm truyện nâng cao</li>
        </ul>
  </div>
</div>
<!--Main seach-->
<section class="section-search">
  <div class="container">
  <form method="get" action="<?php echo site_url('stories/search_adv')?>" class="list_filter form">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Truyện huynh đài muốn tìn tên gì?</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên truyện" value="<?php echo $this->input->get('name')?>">
        </div>
        <div class="form-group col-md-6">
        <div class="form-group col-md-6">
          <label for="inputState">Trạng thái</label>
            <select id="status" name="status" class="form-control">
              <option <?php if($this->input->get('status') == 0){echo "selected";}?> value="0">Còn tiếp...</option>
              <option <?php if($this->input->get('status') == 1){echo "selected";}?> value="1" >Hoàn thành</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputState">Thể loại huynh đài muốn tìm</label>
        </div>
          <?php 
            foreach ($catalogs as $row):?>
              <?php if(count($row->subs) > 1):?>
                <optgroup label="<?php echo $row->name?>">
                  <?php foreach ($row->subs as $sub):?>
                    <div class="form-check col-md-4">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="<?php echo $sub->id?>">
                    <label class="form-check-label" for="exampleCheck1"><?php echo $sub->name?></label>
                  </div>
                  <?php endforeach;?>
                </optgroup>
                <?php else:?>
                  <div class="form-group col-md-4">
                    <div class="form-check col-md-12">
                      <input <?php if(!empty($this->input->get('category_id')) && in_array($row->id,$this->input->get('category_id'))) echo 'checked'; ?> type="checkbox" class="form-check-input" name="category_id[]" id="category_id" value="<?php echo $row->id?>">
                      <label class="form-check-label" for="exampleCheck1"><?php echo $row->name?></label>
                    </div>
                  </div>
                <?php endif;?>
              <?php endforeach;?>
      </div>
      <button type="submit" class="btn btn-primary">Kiếm nào</button>
    </form>
  </div>
</section>      
<!-- category post -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row masonry-container pt-5">
            <?php
            if(count($list) === 0){
              echo '<div class="col-lg-12 col-sm-6 mb-5">
                        <div class="row">
                          <div class="col-lg-12">
                            <h4 style="color:#FF8C33">Điều kiện huynh đài đưa ra hiện không có thử cái khác nha</h4>
                          </div>
                        </div>
                      </div>';
            }
            foreach($list as $row): if($row->status == 0){ 

            }else{
              ?>  
              <div class="col-lg-3 col-sm-6 mb-5">
                <article class="text-center">
                <a href="<?php echo site_url('xem-truyen/'.$row->slug.'-'.$row->id)?>">
                  <img class="img-fluid mb-4 img-fluid-stories" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg') ?>" alt="<?php echo $row->name?>"title="<?php echo $row->name?>">
                </a>
                  <p class="text-uppercase mb-2 catalog">
                    <?php
                       $this->load->model('catalog_model');
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