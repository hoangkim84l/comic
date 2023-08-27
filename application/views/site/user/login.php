<div class="w-full p-6 md:p-10">
    <div class="flex-row items-center md:pr-6">
        <div class="z-50 space-y-8 rounded-3xl bg-white p-8">
            <section class="section">
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
                                    <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user/login') ?>">
                                        <span itemprop="title" property="name"> Đăng nhập</span>
                                    </a>
                                </li>
                            </ul>
                            <br />
                        </div>

                        <div class="col-lg-12 custom-register">
                            <div class="text-login">
                                Nếu huynh đài đã có tài khoản thì nhập thông tin đăng nhập<br />
                                bên trái, còn nếu chưa có tài khoản thì lượn sang bên phải để <br />
                                đăng ký nhanh một tài khoản cho bằng bạn bằng bè nào!
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" action="<?php echo site_url('user/login') ?>" enctype="multipart/form-data" class="w3-container">
                                        <h6 style="color:red" class="col-lg-12"><?php echo form_error('login') ?></h6>
                                        <div class="col-lg-10">
                                            <input type="email" class="w3-input w3-animate-input" id="email" name="email" autocomplete="off" value="<?php echo set_value('email') ?>" placeholder="Email" require>
                                            <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="password" class="w3-input w3-animate-input" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                                            <div class="clear"></div>
                                            <div class="error" id="password_error"><?php echo form_error('password') ?></div>
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="checkbox" id="autologin" name="autologin" value="1">
                                            <label for="autologin"> Ghi nhớ đăng nhập</label>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button class="w3-btn w3-blue">Đăng nhập</button>
                                        </div>
                                        <p>
                                            Nếu huynh đài đã đăng ký mà quên tài khoản thì cũng <br />
                                            không sao đâu hãy nhanh tay click vào đây để lấy lại <br />
                                            những gì đã mất. <a class="link-fogot" href="<?php echo site_url('user/forgotpassword') ?>">Quên mật khẩu?</a>
                                        </p>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form method="post" action="<?php echo site_url('user/register') ?>" enctype="multipart/form-data" class="w3-container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="email" class="w3-input w3-animate-input" id="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Email" require />
                                                        <div class="error" id="password_error"><?php echo form_error('email') ?></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="w3-input w3-animate-input" id="name" name="name" value="<?php echo set_value('name') ?>" placeholder="Xưng hô với huynh đài sao đây?" require />
                                                        <div class="error" id="password_error"><?php echo form_error('name') ?></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="password" class="w3-input w3-animate-input" id="password" name="password" placeholder="Mật khẩu là gì nào?" require />
                                                        <div class="clear"></div>
                                                        <div class="error" id="password_error"><?php echo form_error('password') ?></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="w3-input w3-animate-input" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu cái nào" require />
                                                        <div class="clear"></div>
                                                        <div class="error" id="re_password_error"><?php echo form_error('re_password') ?></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" class="w3-input w3-animate-input" id="phone" name="phone" value="<?php echo set_value('phone') ?>" placeholder="Số điện thoại" require />
                                                        <div class="error" id="password_error"><?php echo form_error('phone') ?></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <textarea name="address" id="address" class="w3-input w3-animate-input" placeholder="Huynh đài đến từ đâu?"><?php echo set_value('address') ?></textarea>
                                                        <div class="error" id="address_error"><?php echo form_error('address') ?></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mt-2">
                                                        <button class="w3-btn w3-blue">Đăng ký</button>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <?php if (!empty($authURL)) { ?>
                                                        <span>Hoặc huynh đài có thể đăng kí bằng những cách dưới đây.</span> <br />
                                                        <a href="<?php echo $authURL; ?>"><img src="<?php echo public_url() ?>site/images/facebook-sign-in-button.png" width="auto" height="auto" /></a>
                                                    <?php } ?>
                                                    <?php if (isset($button_login)) { ?>
                                                        <?php
                                                        echo $button_login;
                                                        ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>