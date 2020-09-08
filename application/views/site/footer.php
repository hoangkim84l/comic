<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <a href="index.html"><img src="<?php echo $support->logo != '' ? base_url('upload/logo/'.$support->logo) : base_url('upload/logo/default.jpg') ?>" alt="persa" class="img-fluid"></a>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Thông tin</h6>
          <ul class="list-unstyled">
            <li class="font-secondary text-dark">Địa chỉ : <?php echo $support->geo_placename?></li>
            <li class="font-secondary text-dark">Gmail : <a href="mailto:<?php echo $support->gmail?>"><?php echo $support->gmail?></a> </li>
            <li class="font-secondary text-dark">Skype : <?php echo $support->skype?></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Liên hệ</h6>
          <ul class="list-unstyled">
            <li class="font-secondary text-dark">Tel: <a href="tel:+<?php echo $support->phone?>"><?php echo $support->phone?></a> </li>
            <li class="font-secondary text-dark">Tác quyền: <?php echo $support->author?></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Follow</h6>
          <ul class="list-inline d-inline-block">
            <li class="list-inline-item"><a href="<?php echo $support->facebook?>" class="text-dark"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-github"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center pb-3">
    <p class="mb-0">Copyright ©<script>var CurrentYear = new Date().getFullYear()  
    document.write(CurrentYear)</script>   <?php echo $support->copyright?></p>
  </div>