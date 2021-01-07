<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mb-4">Đăng ký thành viên</h2>
        <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/register')?>">
                    <span itemprop="title" property="name"> Đăng ký</span>
                </a>
            </li>
        </ul>
        <br/>
      </div>
      <div class="col-lg-4 mb-12">
        <img src="<?php echo public_url()?>site/images/dkmh.png" loading="lazy" alt="đăng kí thành viên" title="Hội mê truyện" class="img-fluid w-100 mb-4">
      </div>
      <div class="col-lg-8 mb-12">
        <form method="post" action="<?php echo site_url('user/register')?>" enctype="multipart/form-data" class="row">
          <div class="col-lg-6">
          <input type="email" class="form-control mb-4" id="email" name="email" value="<?php echo set_value('email')?>" placeholder="Email" require>
          <div class="error" id="password_error"><?php echo form_error('email')?></div>
          </div>
          <div class="col-lg-6">
        <input type="text" class="form-control mb-4" id="name" name="name" value="<?php echo set_value('name')?>" placeholder="Họ và tên" require>
        <div class="error" id="password_error"><?php echo form_error('name')?></div>
          </div>
          <div class="col-lg-6">
              <input type="password" class="form-control mb-4" id="password" name="password" placeholder="Nhập mật khẩu" require>
            <div class="clear"></div>
                <div class="error" id="password_error"><?php echo form_error('password')?></div>
          </div>
          <div class="col-lg-6">
            <input type="password" class="form-control mb-4" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu" require>
            <div class="clear"></div>
                <div class="error" id="re_password_error"><?php echo form_error('re_password')?></div>
          </div>
          <div class="col-lg-6">
          <input type="text" class="form-control mb-4" id="phone" name="phone" value="<?php echo set_value('phone')?>" placeholder="Số điện thoại" require>
          <div class="error" id="password_error"><?php echo form_error('phone')?></div>
          </div>
          <div class="col-lg-6">
            <textarea name="address" id="address" class="form-control mb-4" placeholder="Địa chỉ..."><?php echo set_value('address')?></textarea>
            <div class="error" id="address_error"><?php echo form_error('address')?></div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary">Đăng ký</button>
            <a class="btn btn-primary btn-login-page" href="<?php echo site_url('user/login')?>">Đăng Nhập</a>
          </div>
          <div class="col-lg-12">
            <?php if(!empty($authURL)){ ?>
            <span>Hoặc huynh đài có thể đăng kí bằng những cách dưới đây.</span>
              <a href="<?php echo $authURL; ?>"><img src="<?php echo public_url()?>site/images/facebook-sign-in-button.png" width="auto" height="auto"></a>
            <?php }?>
            <?php if(isset($button_login)){?>
            <?php
              echo $button_login;
            ?>
            <?php }?>  
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
