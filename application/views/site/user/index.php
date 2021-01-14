<style>
    table td{
        padding:10px;
        /* border:1px solid #f0f0f0; */
    }

    .nav-tabs > li > a {margin: 0;padding: 8px 16px;}
    .breadcrumb input[type="radio"] {
        display: none;
    }

    .breadcrumb input[type="checkbox"] {
        display: none;
    }

    .breadcrumb {
        background: #ddd;
        display: inline-block;
        padding: 1px;
        width: 100%;
    }

    .tab-content {
        padding: 15px;
        background-color: #fff;
    }

    .breadcrumb li {
        display: inline-block;
        background: white;
        padding: 0;
        position: relative;
        min-width:30%;
        text-decoration: none;
        -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%, 15px 50%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%, 15px 50%);
        margin-right: -13px;
    }

    .breadcrumb li#last {
        -webkit-clip-path: polygon(0 0, calc(100% - 0px) 0, 100% 50%, calc(100% - 0px) 100%, 0 100%, 15px 50%);
        clip-path: polygon(0 0, calc(100% - 0px) 0, 100% 50%, calc(100% - 0px) 100%, 0 100%, 15px 50%);
    }

    .nav-tabs>li>a.active.show,
    .nav-tabs>li.active>a, 
    .nav-tabs>li.active>a:focus, 
    .nav-tabs>li.active>a:hover { 
        border-bottom: 2px solid #FF8C33;
        }

    .breadcrumb li:first-child {
    -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);   
    clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
    }
    
    @media (max-width: 408px) {
    .breadcrumb li {
        display: inline-block;
        background: white;
        padding: 5px 30px 5px 30px;
        position: relative;
        min-width:40%;
        border:1px solid black;
        text-decoration: none;
        -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        padding-left: 20px;
        margin-right: -13px;
    }
    .breadcrumb li#last {
        -webkit-clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
        padding-left: 20px;
    }
        .breadcrumb {
            background: none;
            -webkit-filter: drop-shadow(1px 1px 0px black)
        drop-shadow(1px -1px 0px black)
        drop-shadow(-1px 1px 0px black)
        drop-shadow(-1px -1px 0px black);
    filter: drop-shadow(1px 1px 0px black)
        drop-shadow(1px -1px 0px black)
        drop-shadow(-1px 1px 0px black)
        drop-shadow(-1px -1px 0px black);
            }
    }
</style>
<div class="container"><!-- The box-center product-->
     <div><br/><br/>
          <h2>Thành viên</h2>
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
                <a property="item" itemprop="url" typeof="WebPage" href="<?php echo site_url('user')?>">
                    <span itemprop="title" property="name"> Thông tin thành viên</span>
                </a>
            </li>
        </ul>
          </div>
     </div>
</div>
<div class="container">
    <div class="breadcrumb">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin thành viên</a></li>
        <li role="presentation">
            <a href="#office" aria-controls="profile" role="tab" data-toggle="tab">Truyện yêu thích</a>
        </li>
        <li></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="product">
                <table>
                    <tr>
                        <td><?php $message = $this->session->flashdata('message'); if(isset($message)):?>
                        <label for="" style="color: #FF8C33;"><?php echo $message;?></label>
                    <?php endif;?></td>
                    </tr>
                    <tr>
                        <td>Họ tên</td>
                        <td><?php echo $user->name?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $user->email?></td>
                    </tr>
                        <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo $user->phone?></td>
                    </tr>
                        <tr>
                        <td>Địa chỉ</td>
                        <td><?php echo $user->address?></td>
                    </tr>
                    <tr>
                        <td>Avatar</td>
                        <td><img src="<?php echo $user->image_link != '' ? base_url('upload/user/'.$user->image_link) : base_url('upload/stories/default.jpg')?>" style="height:150px">
                        </td>
                    </tr>
                </table>
            </div>
            <a href="<?php echo site_url('user/edit')?>" class="button">Sửa thông tin</a>
            <a href="<?php echo site_url('user/changepassword')?>" class="button">Đổi mật khẩu</a>
            <hr>
            <!-- Display login button / Facebook profile information -->
            <?php if(!empty($authURL)){ ?>
            <?php }else{ ?>
                <h2>Thông tin từ Facebook</h2>
                <?php echo $authURL; ?>
                <div class="ac-data">
                    <img src="<?php echo $userData['picture']; ?>"/>
                    <p><b>Facebook ID:</b> <?php echo $userData['oauth_uid']; ?></p>
                    <p><b>Name:</b> <?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
                    <p><b>Email:</b> <?php echo $userData['email']; ?></p>
                    <p><b>Gender:</b> <?php echo $userData['gender']; ?></p>
                    <p><b>Logged in with:</b> Facebook</p>
                    <p><b>Profile Link:</b> <a href="<?php echo $userData['link']; ?>" target="_blank">Click to visit Facebook page</a></p>
                    <p><b>Logout from <a href="<?php echo $logoutURL; ?>">Facebook</a></p>
                </div>
            <?php } ?>
            <!-- Display Google profile information -->
            <?php
                $user_data = $this->session->userdata('user_data_google');
                if( $user_data != null){
                echo '<div class="panel-heading">Thông tin từ Google</div><div class="panel-body">';
                echo '<img src="'.$user_data['picture'].'" class="img-responsive img-circle img-thumbnail" />';
                echo '<h3><b>Name : </b>'.$user_data["first_name"].' '.$user_data['last_name']. '</h3>';
                echo '<h3><b>Email :</b> '.$user_data['email_address'].'</h3>';
                echo '<h3><a href="'.base_url().'google_login/logout">Logout</h3></div>';                
            }
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="office">
        <?php $message = $this->session->flashdata('message'); if(isset($message)):?>
                        <label for="" style="color: #FF8C33;"><?php echo $message;?></label>
                    <?php endif;?>
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
                    <?php foreach($lovelists as $row): if(($row->user_id !=  $user->id) ){ echo "";}else{?>
                    <tr>
                        <td><?php echo $row->id?></td>
                        <td><?php $nameStory = $this->story_model->get_info($row->story_id); echo $nameStory->name?></td>
                        <td><?php echo $row->status == 1 ? "Yêu thích ": "Ẩn"?></td>
                        <td><a class="btn btn-primary btn-login-page" href="<?php echo site_url('user/remove_lovelists/'.$row->id)?>">Xóa</a></td>
                    </tr>
                    <?php } endforeach;?>
                </tbody>
            </table>
        </div>
        </div>

    </div>
</div>     