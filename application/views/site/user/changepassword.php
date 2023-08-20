<div class="w-full p-2 md:p-10">
	<div class="py-6 md:px-6">
		<section class="section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="mb-4">Thay đổi mật khẩu</h2>
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
									<a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/changepassword') ?>">
										<span itemprop="title" property="name"> Thay đổi mật khẩu</span>
									</a>
								</li>
							</ul>
						</div>
						<form class="t-form form_action" method="post" action="<?php echo site_url('user/changepassword') ?>" enctype="multipart/form-data">

							<div class="row">
								<div class="col-lg-6">
									<input type="password" class="form-control mb-4" id="password" name="password" placeholder="Mật khẩu cũ" require>
									<input type="hidden" class="form-control mb-4" id="passwords" name="passwords" value="<?php echo $user->password; ?>">
									<div class="clear"></div>
									<div class="error" id="password_error"><?php echo form_error('password') ?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<input type="password" class="form-control mb-4" id="new_password" name="new_password" placeholder="Mật khẩu mới" require>
									<div class="clear"></div>
									<div class="error" id="password_error"><?php echo form_error('new_password') ?></div>
								</div>
								<div class="col-lg-6">
									<input type="password" class="form-control mb-4" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu mới" require>
									<div class="clear"></div>
									<div class="error" id="re_password_error"><?php echo form_error('re_password') ?></div>
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
	</div>
</div>