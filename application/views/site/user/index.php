<style>
table td{
	padding:10px;
	border:1px solid #f0f0f0;
}
</style>
<div class="container"><!-- The box-center product-->
     <div><br/><br/>
          <h2>Thông tin thành viên</h2>
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
      <div class="product"><!-- The box-content-center -->
          <table>
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
          </table>
          
      </div><a href="<?php echo site_url('user/edit')?>" class="button">Sửa thông tin</a>
</div>
<div class="container"><!-- The box-center product-->
     <div><br/>
          <h4>Danh sách truyện yêu thích</h4><br/>
     </div>
     <?php $message = $this->session->flashdata('message'); if(isset($message)):?>
                    <label for="" style="color: #FF8C33;"><?php echo $message;?></label>
                  <?php endif;?>
      <div class="box-content-center"><!-- The box-content-center -->
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