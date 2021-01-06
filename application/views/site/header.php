<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
    <div class="row" style="width: 100%;">
        <div class="col-lg-2">
            <a class="navbar-brand" href="<?php echo base_url()?>"><img class="img-fluid" src="<?php echo $support->logo != '' ? base_url('upload/logo/'.$support->logo) : base_url('upload/logo/default.jpg') ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></a>
        </div>
        <div class="col-lg-10">
            <div class="row " style="width: 100%;">
                <div class="col-lg-12 search-form-normal">
                    <form id="frm-search" class="form-inline position-relative ml-lg-4" action="<?php echo site_url('truyen/tim-kiem-truyen')?>" method="get">
                        <input class="form-control px-0 w-100 typeahead " type="search" autocomplete="off" placeholder="Tìm kiếm truyện..." value="<?php echo isset($key) ? $key : ''?>" name="key-search" id="text-search">
                        <button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button>
                    </form>  
                </div>
                <div class="col-lg-12 text-center">
                    <button class="navbar-toggler border-0 custom-position" type="button" data-toggle="collapse" data-target="#navogation"
                    aria-controls="navogation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse text-center" id="navogation">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('truyen')?>">Truyện</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('truyen/tim-nang-cao')?>">Tìm truyện</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('lien-he')?>">Liên hệ</a>
                            </li>
                            <?php if(isset($user_info)):?>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('user')?>">Xin chào: <?php echo $user_info->name?></a></li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('user/logout')?>">Thoát</a></li>
                            <?php else:?>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('user/register')?>">Đăng ký</a></li>
                                <li class="nav-item">
                                    <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('user/login')?>">Đăng nhập</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>