<div class="sidebar-header">
    <a class="navbar-brand" href="<?php echo base_url()?>"><img class="img-fluid" src="<?php echo $support->logo != '' ? base_url('upload/logo/'.$support->logo) : base_url('upload/logo/default.jpg') ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></a>
    <p>
        Lướt cà phê sữa<br/>
        Muốn đọc nữa hông muốn dừng!
    </p>
</div>
<ul class="list-unstyled components avatar-section">
<?php if(isset($user_info) || isset($user_data_google)):?>
    <a class="navbar-brand" href="<?php echo base_url()?>"><img class="img-avatar" src="<?php echo $user_info->image_link != '' ?  base_url('upload/user/'.$user_info->image_link) : base_url('upload/banner/avatar.jpg'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></a>
    <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo site_url('user')?>">Xin chào:
        <?php if(isset($user_info)){
            echo $user_info->name;
        } if(isset($user_data_google)){
            echo $user_data_google->first_name;
        }?></a></li>
        <a class="navbar-brand text-dark" href="<?php echo site_url('user/logout')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/logout.png'); ?>" alt="cafe sữa novel"> Đăng xuất</a>
    <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo site_url('user')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_02.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện yêu thích</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_03.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã bình luận</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_06.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã đánh giá</a>
    </li>
<?php else:?>
    <a class="navbar-brand" href="<?php echo base_url()?>"><img class="img-avatar" src="<?php echo base_url('upload/banner/avatar.jpg'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"></a>
    <a href="<?php echo site_url('user/login')?>" class="navbar-brand custom-text-underline">Người lạ</a>
    <li class="nav-item">
        <a class="nav-link text-dark" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_01.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Người lạ nơi cuối con đường</a></li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo site_url('user/register')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_10.png'); ?>" alt="cafe sữa novel"> Đăng ký</a></li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="<?php echo site_url('user/login')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_08.png'); ?>" alt="cafe sữa novel"> Đăng nhập</a></li>

    <li class="nav-item">
        <a class="nav-link text-dark text-diable" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_02.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện yêu thích</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark text-diable" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_03.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã bình luận</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark text-diable" href="javascript:void(0)"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_06.png'); ?>" alt="cafe sữa novel, Web comic truyện tranh, truyện nhân gian"> Truyện đã đánh giá</a>
    </li>

<?php endif;?>
</ul>
<ul class="list-unstyled components">
    <p>Menu</p>
    <li>
        <a class="nav-link text-dark" href="<?php echo base_url()?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_05.png'); ?>" alt="cafe sữa novel"> Trang chủ</a>
    </li>
    <li>
        <a class="nav-link text-dark" href="<?php echo site_url('truyen')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/truyen.png'); ?>" alt="cafe sữa novel"> Truyện</a>
    </li>
    <li>
        <a class="nav-link text-dark" href="<?php echo site_url('truyen/tim-nang-cao')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_07.png'); ?>" alt="cafe sữa novel"> Tìm truyện</a>
    </li>
    <li>
        <a class="nav-link text-dark" href="<?php echo site_url('lien-he')?>"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_08.png'); ?>" alt="cafe sữa novel"> Liên hệ</a>
    </li>
</ul>

<ul class="list-unstyled CTAs">
    <li>
        <p class=" text-dark">Copyright ©<script>var CurrentYear = new Date().getFullYear()
        document.write(CurrentYear)</script>   <?php echo $support->copyright?></p>
    </li>
    <li>
        <a href="//www.dmca.com/Protection/Status.aspx?ID=1801925b-c9d0-4154-9fcb-82e956b5bd00" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120ad.png?ID=1801925b-c9d0-4154-9fcb-82e956b5bd00"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
    </li>
    <li>
        <a href="<?php echo $support->fanpage_fb?>" class="text-dark icon-social"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/icone-face.png'); ?>" alt="cafe sữa novel"></a>
        <a href="<?php echo $support->fanpage_twitter?>" class="text-dark icon-social"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/twinter.png'); ?>" alt="cafe sữa novel"></a>
        <a href="https://www.pinterest.com/CafeSuaTeam/_saved/" class="text-dark icon-social"><img class="img-icon" src="<?php echo base_url('upload/banner/icon/priter.png'); ?>" alt="cafe sữa novel"></a>
    </li>
     <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcafesuateam&tabs=timeline&width=250&height=700&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=720902514969277" width="340" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</ul>