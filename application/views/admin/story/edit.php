<!-- head -->
<?php $this->load->view('admin/story/head', $this->data)?>
<div class="line"></div>
<div class="wrapper">
   <!-- Form -->
   <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
      <fieldset>
         <div class="widget">
            <div class="title">
               <img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
               <h6>Cập nhật story</h6>
            </div>
            <ul class="tabs">
               <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
            </ul>
            <div class="tab_container">
               <div class="tab_content pd0" id="tab1" style="display: block;">
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Tên truyện<span class="req">*</span></label>
                     <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $story->name?>" name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Mô tả:</label>
                     <div class="formRight">
                        <span class="">
                        <textarea class="editor" id="param_content" name="description">
                                <?php echo $story->description?>
                            </textarea><span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Tác giả:</label>
                     <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_author" value="<?php echo $story->author?>" name="author"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Trạng thái:</label>
                     <div class="formRight">
                        <span class="oneTwo">
                           <select name="continues" class="left">
                              <option value="0" <?php if($story->continues == 0) echo 'selected';?>>Còn Tiếp</option>   
                              <option value="1" <?php if($story->continues == 1) echo 'selected';?>>Hoàng Thành</option>
                           </select>
                        </span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label class="formLeft">Ảnh bìa:</label>
                     <div class="formRight">
                        <div class="left">
                           <input type="file" name="image" id="image" size="25"><br/> <br/>
                           <img src="<?php echo $story->image_link != '' ? base_url('upload/stories/'.$story->image_link) : base_url('upload/stories/default.jpg')?>" style="height:150px">
                        </div>
                        <div class="clear error" name="image_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                     <div class="formRight">
                        <select name="category_id" class="left">
                           <option value=""></option>
                           <!-- kiem tra danh muc co danh muc con hay khong -->
                           <?php foreach ($catalogs as $row):?>
                           <?php if(count($row->subs) > 1):?>
                           <optgroup label="<?php echo $row->name?>">
                              <?php foreach ($row->subs as $sub):?>
                              <option value="<?php echo $sub->id?>" <?php if($sub->id == $story->category_id) echo 'selected';?>>
                                 <?php echo $sub->name?>
                              </option>
                              <?php endforeach;?>
                           </optgroup>
                           <?php else:?>
                           <option value="<?php echo $row->id?>" <?php if($row->id == $story->category_id) echo 'selected';?>>
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
                        <input type="radio" id="param_status" value="0" <?php if($story->status==0){echo "checked";}?> name="status"> Ẩn <br/> 
                        <input type="radio" id="param_status" value="1" <?php if($story->status==1){echo "checked";}?> name="status"> Hoạt động
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