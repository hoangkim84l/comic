<div class="flex min-h-screen flex-col py-6 md:pl-6">
    <div class="hidden flex-1 md:inline-flex md:w-48 lg:w-64"></div>
    <div class="fixed h-full pb-16">
        <div class="hidden h-full flex-1 flex-col space-y-12 overflow-y-scroll rounded-3xl bg-white p-8 scrollbar-hide md:inline-flex md:w-48 lg:w-64">
            <img alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian" src="<?php echo $support->logo != '' ? base_url('upload/logo/' . $support->logo) : base_url('upload/logo/default.jpg') ?>" decoding="async" data-nimg="responsive" style="margin: 0 auto; width: 100%, display:'flex'" />
            </span>
            <div class="flex h-full flex-1 flex-col space-y-12">
                <ul class="space-y-1">
                    <?php if (isset($user_info) || isset($user_data_google)) : ?>
                        <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-avatar" src="<?php echo $user_info->image_link != '' ?  base_url('upload/user/' . $user_info->image_link) : base_url('upload/banner/avatar.jpg'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></a>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link" href="<?php echo site_url('user') ?>">Xin chào:
                                <?php if (isset($user_info)) {
                                    echo $user_info->name;
                                }
                                if (isset($user_data_google)) {
                                    echo $user_data_google->first_name;
                                } ?></a>
                        </li>
                        <a class="navbar-brand" href="<?php echo site_url('user/logout') ?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/logout.png'); ?>" alt="cafe sữa novel"> Đăng xuất</a>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link" href="<?php echo site_url('user') ?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_02.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện yêu thích</a>
                        </li>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100"">
                            <a class=" nav-link" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_03.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã bình luận</a>
                        </li>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_06.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã đánh giá</a>
                        </li>
                    <?php else : ?>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link" href="<?php echo site_url('user/register') ?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_10.png'); ?>" alt="cafe sữa novel"> Đăng ký</a>
                        </li>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link" href="<?php echo site_url('user/login') ?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_08.png'); ?>" alt="cafe sữa novel"> Đăng nhập</a>
                        </li>

                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link text-diable" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_02.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện yêu thích</a>
                        </li>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link text-diable" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_03.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã bình luận</a>
                        </li>
                        <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                            <a class="nav-link text-diable" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_06.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã đánh giá</a>
                        </li>

                    <?php endif; ?>
                    <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                        <a class="nav-link" href="<?php echo base_url() ?>">
                            <img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_05.png'); ?>" alt="cafe sữa novel"> Trang chủ</a>
                    </li>
                    <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                        <a class="nav-link" href="<?php echo site_url('truyen') ?>">
                            <img class="img-icon" src="<?php echo base_url('upload/banner/icon/truyen.png'); ?>" alt="cafe sữa novel">

                            <span>Truyện</span>
                            <span class="h-3 w-3 self-start">
                                <span class="inline-flex h-3 w-3 animate-ping rounded-full bg-teal-400 opacity-75">
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                        <a class="nav-link" href="<?php echo site_url('truyen/tim-nang-cao') ?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_07.png'); ?>" alt="cafe sữa novel"> Tìm truyện</a>
                    </li>
                    <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                        <a class="nav-link" href="<?php echo site_url('lien-he') ?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_08.png'); ?>" alt="cafe sữa novel"> Liên hệ</a>
                    </li>
                    <li class="flex cursor-pointer flex-row items-center space-x-3 rounded-lg p-2 text-lg font-medium text-gray-600 transition ease-in-out hover:-translate-y-1 hover:bg-indigo-100">
                        Donate cho nhóm. Momo 0916535419 (PhươngThảo)
                    </li>
                </ul>
                <div class="flex flex-col space-y-5">
                    <span class="text-sm font-medium uppercase tracking-widest text-gray-400">Theo chúng mình</span>
                    <span class="duration-400 flex cursor-pointer flex-row items-center space-x-4 rounded-lg bg-gradient-to-r from-teal-500 to-indigo-400 text-white shadow-lg shadow-teal-100 transition ease-in-out hover:-translate-y-1 hover:shadow-teal-200">
                        <a href="<?php echo $support->fanpage_fb ?>" class="text-dark icon-social"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icone-face.png'); ?>" alt="cafe sữa novel"></a>
                        <a href="<?php echo $support->fanpage_twitter ?>" class="text-dark icon-social"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/twinter.png'); ?>" alt="cafe sữa novel"></a>
                        <a href="https://www.pinterest.com/CafeSuaTeam/_saved/" class="text-dark icon-social"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/priter.png'); ?>" alt="cafe sữa novel"></a>
                    </span>
                    <span class="flex cursor-pointer flex-row items-center space-x-4 rounded-lg bg-teal-500 text-white shadow-lg shadow-teal-100 transition ease-in-out hover:-translate-y-1 hover:shadow-teal-200">
                        <a href="//www.dmca.com/Protection/Status.aspx?ID=1801925b-c9d0-4154-9fcb-82e956b5bd00" title="DMCA.com Protection Status" class="dmca-badge"> <img src="https://images.dmca.com/Badges/dmca_protected_sml_120ad.png?ID=1801925b-c9d0-4154-9fcb-82e956b5bd00" alt="DMCA.com Protection Status" /></a>
                        <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                    </span>
                </div>

                <p>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcafesuateam&tabs=timeline&width=250&height=700&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=720902514969277" width="200" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </p>

                <div class="flex h-full items-end">
                    <p class="text-sm font-medium text-gray-500">
                        ©<script>
                            var CurrentYear = new Date().getFullYear()
                            document.write(CurrentYear)
                        </script>
                        <?php echo $support->copyright ?>
                    </p>
                </div>
                <br />
            </div>
        </div>
    </div>
</div>