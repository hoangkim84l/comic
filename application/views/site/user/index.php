<div class="w-full p-2 md:p-10">
    <div class="py-6 md:px-6">
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
                            <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user') ?>">
                                <span itemprop="title" property="name"> Thông tin thành viên</span>
                            </a>
                        </li>
                    </ul>
                    <br />
                </div>

                <div class="col-lg-12">
                    <div align="center" class="custom-register">
                        <h2>PROFILE CÁ NHÂN</h2>
                    </div>
                </div>

                <form class="t-form form_action" method="post" action="<?php echo site_url('user/edit') ?>" enctype="multipart/form-data">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="Avatar">Thay quả ảnh mới nào!</label><br />
                                <img src="<?php echo $user->image_link != '' ? base_url('upload/user/' . $user->image_link) : base_url('upload/stories/default.jpg') ?>" style="height:200px; margin-bottom: 15px;">
                                <input type="file" name="image" id="image" size="25">
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <input type="email" class="form-control mb-4" id="email" name="email" value="<?php echo $user->email ?>" placeholder="Email" require disabled>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control mb-4" id="name" name="name" value="<?php echo $user->name ?>" placeholder="Họ và tên" require>
                                </div>
                                <div class="col-lg-12">
                                    <input type="number" class="form-control mb-4" id="phone" name="phone" value="<?php echo $user->phone ?>" placeholder="Số điện thoại" require>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="address" id="address" class="form-control mb-4" placeholder="Địa chỉ..."><?php echo $user->address ?></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="form-control mb-4" id="passwords" name="passwords" placeholder="Nhập mật khẩu xác nhận nào" require>
                                    <input type="hidden" class="form-control mb-4" id="password" name="password" value="<?php echo $user->password ?>">
                                    <div class="clear"></div>
                                    <div class="error" id="passwords_error"><?php echo form_error('passwords') ?></div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary btn-full-width">Lưu lại nào!</button>
                                    <a href="<?php echo site_url('user/changepassword') ?>" class="button">Đổi mật khẩu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- truyen yeu thich -->
                <div class="col-lg-12">
                    <h5>Truyện yêu thích</h5>
                    <?php $message = $this->session->flashdata('message');
                    if (isset($message)) : ?>
                        <label for="" style="color: #FF8C33;"><?php echo $message; ?></label>
                    <?php endif; ?>
                    <div class="box-content-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Tên truyện</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lovelists as $row) : if (($row->user_id !=  $user->id)) {
                                        echo "";
                                    } else { ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php $nameStory = $this->story_model->get_info($row->story_id);
                                                echo $nameStory->name ?></td>
                                            <td><?php echo $row->status == 1 ? "Yêu thích " : "Ẩn" ?></td>
                                            <td><a class="btn btn-primary btn-login-page" href="<?php echo site_url('user/remove_lovelists/' . $row->id) ?>">Xóa</a></td>
                                        </tr>
                                <?php }
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>