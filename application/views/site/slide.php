<!-- featured post -->
<section>
  <div class="container-fluid p-sm-0">
    <div class="row featured-post-slider">
      <?php 
        $count = 0;
        intval($count);
        foreach($data_slides as $data):
        if($data->status == 0){ }else{  
        $count++;
        if($count > 8 ) break;  
      ?>
      <div class="col-lg-3 col-sm-12 mb-2 mb-lg-0 px-1 ">
        <article class="card bg-dark text-center text-white border-0 rounded-0">
          <img class="card-img rounded-0 img-fluid w-100" style="min-height: 476px;" src="<?php echo $data->image_link != '' ? base_url('upload/stories/'.$data->image_link) :  base_url('upload/stories/default.jpg')?>" alt="<?php echo $data->name?>">
          <div class="card-img-overlay">
            <div class="card-content">
              <p class="text-uppercase mb-2 catalog"><?php 
                                        $this->load->model('catalog_model');
                                        $catalog = $this->catalog_model->get_list();
                                        $cata = json_decode($data->category_id);
                                        foreach ($catalog as $row){
                                            if (in_array($row->id, $cata)) { ?>
                                          <a class="new-links" style='color:#fff' href='/danh-muc/<?php echo $row->id;
                                            ?>'><?php echo $row->name.".";?></a>
                                        <?php }
                                        }?></p>
              <h4 class="card-title mb-4">
                <a class="text-white fix-title-2-line" href="<?php echo site_url('xem-truyen/'.$data->slug.'-'.$data->id)?>"><?php echo $data->name?></a>
              </h4>
              <a class="btn btn-outline-light" href="<?php echo site_url('xem-truyen/'.$data->slug.'-'.$data->id)?>">Xem Hết..</a>
            </div>
          </div>
        </article>
      </div>
      <?php } endforeach; ?>
    </div>
  </div>
</section>
<!-- /featured post -->