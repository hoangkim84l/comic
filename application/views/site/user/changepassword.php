<div class="w-full p-6 md:p-10">
	<div class="flex-row items-center md:pr-6">
		<div class="z-50 space-y-8 rounded-3xl bg-white p-8">
			<?php $this->load->view('site/menu-mobile', $this->data); ?>
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
								<form class="w3-container" method="post" action="<?php echo site_url('user/changepassword') ?>" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<input type="password" class="w3-input w3-animate-input" id="password" name="password" placeholder="Mật khẩu cũ" require>
											<input type="hidden" class="w3-input w3-animate-input" id="passwords" name="passwords" value="<?php echo $user->password; ?>">
											<div class="clear"></div>
											<div class="error" id="password_error"><?php echo form_error('password') ?></div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<input type="password" class="w3-input w3-animate-input" id="new_password" name="new_password" placeholder="Mật khẩu mới" require>
											<div class="clear"></div>
											<div class="error" id="password_error"><?php echo form_error('new_password') ?></div>
										</div>
										<div class="col-lg-6">
											<input type="password" class="w3-input w3-animate-input" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu mới" require>
											<div class="clear"></div>
											<div class="error" id="re_password_error"><?php echo form_error('re_password') ?></div>
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
	</div>
</div>