<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mb-4">Đăng ký thành viên</h2>
        <ul class="list-inline ">
          <li class="list-inline-item breadcrumb"><a href="<?php echo base_url()?>">Trang chủ</a> / Đăng ký thành viên</li>
        </ul>
        <br/>
      </div>
      <div class="col-lg-4 mb-12">
        <img src="<?php echo public_url()?>site/images/dkmh.png" alt="đăng kí thành viên" title="Hội mê truyện" class="img-fluid w-100 mb-4">
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
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
