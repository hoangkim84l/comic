
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-12 login-user">
        <h2 class="mb-4">Thành viên đăng nhập</h2>
        <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/login')?>">
                    <span itemprop="title" property="name"> Đăng nhập</span>
                </a>
            </li>
        </ul>
        <img src="<?php echo public_url()?>site/images/logo.jpg" alt="Thành viên đăng nhập" title="Hội mê truyện" class="img-fluid w-100 mb-4 login-page" height="300px">
      </div>
      <div class="col-lg-6 col-sm-12 login-user login-form">
          <form method="post" action="<?php echo site_url('user/login')?>" enctype="multipart/form-data" class="row">
          <h3 style="color:red" class="col-lg-12"><?php echo form_error('login')?></h3>
            <div class="col-lg-12">
              <input type="email" class="form-control mb-4" id="email" name="email" autocomplete="off" value="<?php echo set_value('email')?>" placeholder="Email" require >
              <div class="error" id="email_error"><?php echo form_error('email')?></div>
            </div>
            <div class="col-lg-12">
              <input type="password" class="form-control mb-4" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
              <div class="clear"></div>
              <div class="error" id="password_error"><?php echo form_error('password')?></div>
            </div>
            <div class="col-lg-12">
              <label for="autologin"> Ghi nhớ đăng nhập</label>
              <input type="checkbox" id="autologin" name="autologin" value="1">
              <div class="clear"></div>
            </div>
            <div class="col-12" style="text-align: center;">
              <button class="btn btn-primary">Đăng nhập</button>
              <a class="btn btn-primary btn-login-page" href="<?php echo site_url('user/register')?>">Đăng ký</a>
              <a class="btn btn-default" href="<?php echo site_url('user/forgotpassword')?>">Quên mật khẩu?</a>
            </div>
            
          </form>
      </div>  
    </div>
    <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($authURL)){ ?>
            <span>Hoặc huynh đài có thể đăng nhập bằng những cách dưới đây.</span>
            <a href="<?php echo $authURL; ?>"><img src="<?php echo public_url()?>site/images/facebook-sign-in-button.png" width="auto" height="auto" ></a>
          <?php }?>
          <?php if(isset($button_login)){?>
          <?php
            echo $button_login;
          ?>
          <?php }?>
        </div>
    </div>
  </div>
</section>
