<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="mb-4">Liên hệ với chúng tôi</h2>
         <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="1" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url()?>">
                    <span itemprop="title" property="name">Trang chủ / </span>
                </a>
            </li>
            <li property="itemListElement" typeof="ListItem">
                <meta property="position" content="2" />
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('lien-he.html')?>">
                    <span itemprop="title" property="name"> Liên hệ quản trị</span>
                </a>
            </li>
        </ul> 
        <img src="<?php echo public_url()?>site/images/contact.jpg" alt="author" class="img-fluid w-100 mb-4">
        <p class="mb-5">Về bản quyền, quyền truy cập vui lòng liên hệ với chúng tôi trước khi thao tác để tránh các vấn đề kiện tụng. :)</p>
        <form action="" class="row" method="POST">
          <div class="col-lg-6">
            <input type="text" class="form-control mb-4" name="name" id="name" placeholder="Tên của bạn" require>
            <div class="error" id="name_error"><?php echo form_error('name')?></div>
          </div>
          <div class="col-lg-6">
            <input type="email" class="form-control mb-4" name="email" id="email" placeholder="Email" require>
            <div class="error" id="password_error"><?php echo form_error('email')?></div>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control mb-4" name="phone" id="phone" placeholder="Số điện thoại" require>
            <div class="error" id="phone_error"><?php echo form_error('phone')?></div>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control mb-4" name="address" id="address" placeholder="Địa chỉ" require>
            <div class="error" id="address_error"><?php echo form_error('address')?></div>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control mb-4" name="title" id="title" placeholder="Tiêu đề" require>
            <div class="error" id="title_error"><?php echo form_error('title')?></div>
          </div>
          <div class="col-lg-6">
            <textarea name="content" id="content" class="form-control mb-4" placeholder="Lời nhắn..."></textarea>
            <div class="error" id="content_error"><?php echo form_error('content')?></div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary">Gởi Liền </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
