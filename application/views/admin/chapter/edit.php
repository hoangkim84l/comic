<!-- head -->
<?php $this->load->view('admin/chapter/head', $this->data)?>
<div class="line"></div>
<div class="wrapper">
   <!-- Form -->
   <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
      <fieldset>
         <div class="widget">
            <div class="title">
               <img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
               <h6>Cập nhật chapter</h6>
            </div>
            <ul class="tabs">
               <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
            </ul>
            <div class="tab_container">
               <div class="tab_content pd0" id="tab1" style="display: block;">
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Tên chương<span class="req">*</span></label>
                     <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $chapter->name?>" name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label class="formLeft">Nội dung:</label>
                     <div class="formRight">
                        <div class="left">
                           <input type="file" name="image" id="image" size="25"><br/> <br/>
                           <img src="<?php echo $chapter->image_link != '' ? base_url('upload/chapter/'.$chapter->image_link) : base_url('upload/stories/default.jpg')?>" style="height:150px">
                        </div>
                        <div class="clear error" name="image_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Hiển thị nội dung bằng hình ảnh:</label>
                     <div class="formRight">
                        <span class="oneTwo">
                        <input type="radio" id="param_show_img" value="0" <?php if($chapter->status==0){echo "checked";}?> name="show_img"> Ẩn <br/> 
                        <input type="radio" id="param_show_img" value="1" <?php if($chapter->status==1){echo "checked";}?> name="show_img"> Hiện
                        </span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label class="formLeft">Nội dung chữ:</label>
                     <div class="formRight">
                        <div class="left">
                        <textarea class="editor" id="param_content" name="content">
                                <?php echo $chapter->content?>
                            </textarea></div>
                        <div class="clear error" name="image_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_cat" class="formLeft">Tên truyện:</label>
                     <div class="formRight">
                        <select name="category_id" class="left">
                           <option value=""></option>
                           <!-- kiem tra danh muc co danh muc con hay khong -->
                           <?php foreach ($catalogs as $row):?>
                           <?php if(count($row->subs) > 1):?>
                           
                           <option value="<?php echo $row->id?>" <?php if($row->id == $chapter->story_id) echo 'selected';?>>
                              <?php echo $row->name?>
                           </option>
                           <?php endif;?>
                           <?php endforeach;?>
                        </select>
                        <span class="autocheck" name="cat_autocheck"></span>
                        <div class="clear error" name="cat_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Hiển thị:</label>
                     <div class="formRight">
                        <span class="oneTwo">
                        <input type="radio" id="param_status" value="0" <?php if($chapter->status==0){echo "checked";}?> name="status"> Ẩn <br/> 
                        <input type="radio" id="param_status" value="1" <?php if($chapter->status==1){echo "checked";}?> name="status"> Hoạt động
                        </span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Vị trí:</label>
                     <div class="formRight">
                        <span class="oneTwo">
                        <input type="text" _autocheck="true" id="param_ordering" value="<?php echo $chapter->ordering?>" name="ordering">
                     </span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Tác giả:</label>
                     <div class="formRight">
                        <span class="oneTwo">
                        <input type="text" _autocheck="true" id="param_ordering" value="<?php echo $chapter->author?>" name="author">
                     </span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow hide"></div>
               </div>
               <div class="formRow hide"></div>
            </div>
         </div>
         <!-- End tab_container-->
         <div class="formSubmit">
            <input type="submit" class="redB" value="Cập nhật">
            <input type="reset" class="basic" value="Hủy bỏ">
         </div>
         <div class="clear"></div>
</div>
</fieldset>
</form>
</div>
<div class="clear mt30"></div>