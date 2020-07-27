    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo base_url()?>"><img class="img-fluid" src="<?php echo public_url()?>site/images/logo.png" alt="Web comic truyện tranh, truyện nhân gian"></a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navogation"
        aria-controls="navogation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navogation">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link text-uppercase text-dark " href="<?php echo site_url('trang-chu.html')?>">
                    Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('ve-chung-toi.html')?>">về chúng tôi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('truyen.html')?>">Truyện</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-dark" href="<?php echo site_url('lien-he.html')?>">Liên hệ</a>
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
        <form class="form-inline position-relative ml-lg-4" action="<?php echo site_url('story/search')?>" method="get">
            <input class="form-control px-0 w-100" type="search" placeholder="Tìm kiếm truyện..." value="<?php echo isset($key) ? $key : ''?>" name="key-search" id="text-search">
            <!-- <button class="search-icon" type="submit"><i class="ti-search text-dark"></i></button> -->
            <a href="javascript:void(0)" class="search-icon"><i class="ti-search text-dark"></i></a>
        </form>
        </div>
    </nav>
