<div id="leftSide" style="padding-top:30px;">

    <!-- Account panel -->

    <div class="sideProfile">
        <a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin')?>/images/user.png" width="40"></a>
        <span>B Project</span>
        <span>Xin chào: <strong>admin!</strong></span>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->

    <ul id="menu" class="nav">
        <li class="home">
            <a href="<?php echo admin_url()?>" class="active" id="current">
                <span>Bảng điều khiển</span>
                <strong></strong>
            </a>

        </li>
        <li class="product">

            <a href="" class="exp inactive">
                <span>Truyện</span>
                <strong>3</strong>
            </a>
            <ul style="display: none;" class="sub">
                <li>
                    <a href="<?php echo admin_url('story')?>">
                        Truyện						
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('chapter')?>">
                        Chương						
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('catalog')?>">
                        Danh mục							
                    </a>
                </li>
            </ul>
        </li>
        <li class="account">

            <a href="" class="exp inactive">
                <span>Tài khoản</span>
                <strong>2</strong>
            </a>

            <ul style="display: none;" class="sub">
                <li>
                    <a href="<?php echo admin_url('admin')?>">
                        Ban quản trị							
                    </a>
                </li>

                <li>
                    <a href="<?php echo admin_url('user')?>">
                    Thành viên</a>
                </li>
            </ul>

        </li>
        <li class="support">

            <a href="" class="exp inactive">
                <span>Hỗ trợ và liên hệ</span>
                <strong>1</strong>
            </a>

            <ul style="display: none;" class="sub">
                <li>
                    <a href="<?php echo admin_url('support')?>">
                    Hỗ trợ</a>
                </li>
            </ul>

        </li>
        <li class="content">

            <a href="" class="exp inactive">
                <span>Nội dung</span>
                <strong>3</strong>
            </a>

            <ul style="display: none;" class="sub">
                <li>
                    <a href="<?php echo admin_url('slide')?>">
                        Slide
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('contact')?>">
                        Liên hệ
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('comment')?>">
                        Bình luận
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="clear"></div>