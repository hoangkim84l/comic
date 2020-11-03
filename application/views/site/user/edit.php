<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
		<h2 class="mb-4">Chỉnh sửa thông tin thành viên</h2>
		<div class="row">
			<ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
				<li property="itemListElement" typeof="ListItem">
					<meta property="position" content="1" />
					<a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
						<span itemprop="title" property="name">Trang chủ / </span>
					</a>
				</li>
				<li property="itemListElement" typeof="ListItem">
					<meta property="position" content="2" />
					<a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/edit')?>">
						<span itemprop="title" property="name"> Thông tin thành viên</span>
					</a>
				</li>
			</ul>
		</div>
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
		<div class="row">
			<div class="col-lg-6">
				<label for="Avatar">Avatar</label><br/>
				<input type="file" name="image" id="image" size="25"><br/> <br/>
				<img src="<?php echo $user->image_link != '' ? base_url('upload/user/'.$user->image_link) : base_url('upload/stories/default.jpg')?>" style="height:150px">
				<br/>
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

