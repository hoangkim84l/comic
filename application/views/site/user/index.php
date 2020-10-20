<style>
table td{
	padding:10px;
	border:1px solid #f0f0f0;
}
</style>
<div class="box-center container"><!-- The box-center product-->
     <div><br/><br/>
          <h2>Thông tin thành viên</h2>
     </div>
      <div class="box-content-centers product"><!-- The box-content-center -->
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
<div class="box-center container"><!-- The box-center product-->
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