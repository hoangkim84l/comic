
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 login-user">
    <h2 class="mb-4">Thành viên đăng nhập</h2>
    <img src="<?php echo public_url()?>site/images/logo.jpg" alt="Thành viên đăng nhập" title="Hội mê truyện" class="img-fluid w-100 mb-4 login-page" height="300px">
		<h3 style="color:red"><?php echo form_error('login')?></h3>
        <form method="post" action="<?php echo site_url('user/login')?>" enctype="multipart/form-data" class="row">
          <div class="col-lg-6">
            <input type="email" class="form-control mb-4" id="email" name="email" value="<?php echo set_value('email')?>" placeholder="Email" require>
            <div class="error" id="email_error"><?php echo form_error('email')?></div>
          </div>
          <div class="col-lg-6">
            <input type="password" class="form-control mb-4" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
            <div class="clear"></div>
            <div class="error" id="password_error"><?php echo form_error('password')?></div>
        </div>
		  
          <div class="col-12">
            <button class="btn btn-primary">Đăng nhập</button>
            <a class="btn btn-primary btn-login-page" href="<?php echo site_url('user/register')?>">Đăng ký</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
