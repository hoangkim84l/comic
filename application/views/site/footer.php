<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <?php if($support->slogan != ''){ ?>
            <div class="slogan">
              <?php echo $support->slogan;?>
            </div>
          <?php } else{ ?>
            <p>
              Muốn đi nhanh thì đi một mình<br/>
              muốn đi xa thì dùng google maps.
            </p>
          <?php } ?>
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
            <li class="font-secondary text-dark">Phone: <a href="tel:+<?php echo $support->phone?>"><?php echo $support->phone?></a> </li>
            <li class="font-secondary text-dark">Tác quyền: <?php echo $support->author?></li>
            <li class="font-secondary text-dark">Hotline: <a href="tel:+<?php echo $support->hotline?>"><?php echo $support->hotline?></a> </li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <h6>Follow</h6>
          <ul class="list-inline d-inline-block">
            <li class="list-inline-item"><a href="<?php echo $support->fanpage_fb?>" class="text-dark"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a href="<?php echo $support->fanpage_twitter?>" class="text-dark"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a href="<?php echo $support->fanpage_linkedin?>" class="text-dark"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item"><a href="mailto:<?php echo $support->skype?>" class="text-dark"><i class="ti-skype"></i></a></li>
          </ul>
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcafesuateam&tabs=timeline&width=340&height=150&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=720902514969277" width="340" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center pb-3 color-text">
    <p class="mb-0">Copyright ©<script>var CurrentYear = new Date().getFullYear()  
    document.write(CurrentYear)</script>   <?php echo $support->copyright?></p>
  </div>