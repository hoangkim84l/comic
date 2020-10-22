<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
		<h2 class="mb-4">Chỉnh sửa thông tin thành viên</h2>
		<ul class="list-inline ">
            <li class="list-inline-item breadcrumb"><a href="<?php echo base_url()?>">Trang chủ</a> / Thông tin thành viên</li>
         </ul>
        <form class="t-form form_action" method="post" action="<?php echo site_url('user/edit')?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-6">
				<input type="email" class="form-control mb-4" id="email" name="email" value="<?php echo $user->email?>" placeholder="Email" require disabled>
			</div>
			<div class="col-lg-6">
				<input type="text" class="form-control mb-4" id="name" name="name" value="<?php echo $user->name?>" placeholder="Họ và tên" require>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
					<input type="password" class="form-control mb-4" id="password" name="password" placeholder="Nếu thay đổi mật khẩu thì nhập trường này" require>
					<div class="clear"></div>
					<div class="error" id="password_error"><?php echo form_error('password')?></div>
				</div>
			<div class="col-lg-6">
				<input type="password" class="form-control mb-4" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu" require>
				<div class="clear"></div>
					<div class="error" id="re_password_error"><?php echo form_error('re_password')?></div>
				</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<input type="text" class="form-control mb-4" id="phone" name="phone" value="<?php echo $user->phone?>" placeholder="Số điện thoại" require>
			</div>
			<div class="col-lg-6">
				<textarea name="address" id="address" class="form-control mb-4" placeholder="Địa chỉ..."><?php echo $user->address?></textarea>
			</div>
		</div>  
          <div class="col-12">
            <button class="btn btn-primary">Cập nhật</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

