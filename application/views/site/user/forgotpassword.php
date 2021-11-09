<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
		<h2 class="mb-4">Lấy lại mật khẩu</h2>
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
					<a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/forgotpassword')?>">
						<span itemprop="title" property="name"> Lấy lại mật khẩu</span>
					</a>
				</li>
			</ul>
		</div>
        <form class="t-form form_action" method="post" action="<?php echo site_url('user/forgotpassword')?>" enctype="multipart/form-data">
        <div class="row">
		<?php $message = $this->session->flashdata('message'); if(isset($message)):?>
                        <label for="" style="color: #FF8C33;"><?php echo $message;?></label>
                    <?php endif;?>
		</div>
		<div class="row">
            <div class="col-lg-6">
                        <input type="email" class="form-control mb-4" id="email" name="email" autocomplete="off" placeholder="Nhập email để kiểm tra và lấy lại mật khẩu" require>
                        <div class="clear"></div>
                        <div class="error" id="email_error"><?php echo form_error('email')?></div>
                    </div>
            </div> 
          <div class="col-12">
            <button class="btn btn-primary">Kiểm tra</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

