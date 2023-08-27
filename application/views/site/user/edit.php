<div class="w-full p-2 md:p-10">
	<div class="py-6 md:px-6">
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="mb-4">Chỉnh sửa thông tin thành viên</h2>
						<div class="row">
							<ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
								<li property="itemListElement" typeof="ListItem">
									<meta property="position" content="1" />
									<a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url() ?>">
										<span itemprop="title" property="name">Trang chủ / </span>
									</a>
								</li>
								<li property="itemListElement" typeof="ListItem">
									<meta property="position" content="2" />
									<a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/edit') ?>">
										<span itemprop="title" property="name"> Chỉnh sửa thông tin thành viên</span>
									</a>
								</li>
							</ul>
						</div>
						<form class="w3-container" method="post" action="<?php echo site_url('user/edit') ?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6">
									<input type="email" class="w3-input w3-animate-input" id="email" name="email" value="<?php echo $user->email ?>" placeholder="Email" require disabled>
								</div>
								<div class="col-lg-6">
									<input type="text" class="w3-input w3-animate-input" id="name" name="name" value="<?php echo $user->name ?>" placeholder="Họ và tên" require>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<input type="number" class="w3-input w3-animate-input" id="phone" name="phone" value="<?php echo $user->phone ?>" placeholder="Số điện thoại" require>
								</div>
								<div class="col-lg-6">
									<textarea name="address" id="address" class="w3-input w3-animate-input" placeholder="Địa chỉ..."><?php echo $user->address ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<label for="Avatar">Avatar</label><br />
									<input type="file" name="image" id="image" size="25"><br /> <br />
									<img src="<?php echo $user->image_link != '' ? base_url('upload/user/' . $user->image_link) : base_url('upload/stories/default.jpg') ?>" style="height:150px">
									<br />
								</div>
								<div class="col-lg-6">
									<input type="password" class="w3-input w3-animate-input" id="passwords" name="passwords" placeholder="Nhập mật khẩu xác nhận" require>
									<input type="hidden" class="w3-input w3-animate-input" id="password" name="password" value="<?php echo $user->password ?>">
									<div class="clear"></div>
									<div class="error" id="passwords_error"><?php echo form_error('passwords') ?></div>
								</div>
							</div>
							<div class="col-12 mt-2">
								<button class="w3-btn w3-blue">Cập nhật</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>