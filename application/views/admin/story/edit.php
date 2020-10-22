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
               <li class=""><a href="#tab2">SEO Onpage</a></li>
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
                              <option value="1" <?php if($story->continues == 1) echo 'selected';?>>Hoàn Thành</option>
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
                        <!-- <select name="category_id" class="left"> -->
                           <!-- <option value=""></option> -->
                           <!-- kiem tra danh muc co danh muc con hay khong -->
                           <?php $cata = json_decode($story->category_id);?>
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
                           <!-- <option value="<?php echo $row->id?>" <?php if($row->id == $story->category_id) echo 'selected';?>>
                              <?php echo $row->name?>
                           </option> -->
                              <input <?php if(in_array($row->id,$cata)) echo 'checked'; ?> type="checkbox" class="form-check-input" name="category_id[]" id="category_id" value="<?php echo $row->id?>">
                              <label class="form-check-label" for="exampleCheck1"><?php echo $row->name?></label>
                           <?php endif;?>
                           <?php endforeach;?>
                        <!-- </select> -->
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
               <div class="tab_content pd0" id="tab2" style="display: none;">
                  <div class="formRow">
                     <label for="param_site_title" class="formLeft">Title:</label>
                     <div class="formRight">
                           <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title"><?php echo $story->site_title?></textarea></span>
                           <span class="autocheck" name="site_title_autocheck"></span>
                           <div class="clear error" name="site_title_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>

                  <div class="formRow">
                     <label for="param_meta_desc" class="formLeft">Meta description:</label>
                     <div class="formRight">
                           <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"><?php echo $story->meta_desc?></textarea></span>
                           <span class="autocheck" name="meta_desc_autocheck"></span>
                           <div class="clear error" name="meta_desc_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>

                  <div class="formRow">
                     <label for="param_meta_key" class="formLeft">Meta keywords:</label>
                     <div class="formRight">
                           <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"><?php echo $story->meta_key?></textarea></span>
                           <span class="autocheck" name="meta_key_autocheck"></span>
                           <div class="clear error" name="meta_key_error"></div>
                     </div>
                     <div class="clear"></div>
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