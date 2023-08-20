<div class="w-full p-2 md:p-10">
    <div class="py-6 md:px-6">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="<?php echo site_url('user/login') ?>" enctype="multipart/form-data" class="form-inline custom-fontend">
                            <div class="form-group">
                                <input type="email" class="mb-4" id="email" name="email" autocomplete="off" value="<?php echo set_value('email') ?>" placeholder="Email" require />
                                <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="mb-4" id="password" name="password" placeholder="Nhập mật khẩu của bạn" />
                                <div class="clear"></div>
                                <div class="error" id="password_error"><?php echo form_error('password') ?></div>
                            </div>
                            <div class="form-group">
                                <button class="custom-button">Đăng nhập</button>
                                <a class="custom-button" href="<?php echo site_url('user/register') ?>">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12 text-right">
                        <a href="<?php echo site_url('user/forgotpassword') ?>">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList">
                            <li property="itemListElement" typeof="ListItem">
                                <meta property="position" content="1" />
                                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url() ?>">
                                    <span itemprop="title" property="name">Trang chủ / </span>
                                </a>
                            </li>
                            <li property="itemListElement" typeof="ListItem">
                                <meta property="position" content="2" />
                                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/forgotpassword') ?>">
                                    <span itemprop="title" property="name"> Lấy lại mật khẩu</span>
                                </a>
                            </li>
                        </ul>
                        <br />
                    </div>

                    <div class="col-lg-12 custom-register">
                        <div class="text-fogot">Thu đi để lại lá vàng <br />
                            Cớ sao người lại vội vàng quên em <br />
                            Người quên thì cũng không sao <br />
                            Nhập vào đầy đủ thông tin dưới này <br />
                            Admin làm việc nhanh tay <br />
                            Sẽ gửi ngay lại thông tin cho người.</div>

                        <form class="t-form form_action" method="post" action="<?php echo site_url('user/forgotpassword') ?>" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <?php $message = $this->session->flashdata('message');
                                if (isset($message)) : ?>
                                    <label for="" style="color: #FF8C33;"><?php echo $message; ?></label>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="email" class="form-control mb-4" id="email" name="email" autocomplete="off" placeholder="Nhập email vào đây sẽ nhanh chóng lấy lại những gì đã mất" require>
                                        <div class="clear"></div>
                                        <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary btn-full-width">Lấy lại mật khẩu</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>