<!-- head -->
<?php $this->load->view('admin/chapter/head', $this->data)?>
<div class="line"></div>
<div class="wrapper">
   <!-- Form -->
   <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('chapter/add')?>" id="form" class="form">
      <fieldset>
         <div class="widget">
            <div class="title">
               <img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
               <h6>Thêm truyện mới</h6>
            </div>
            <ul class="tabs">
               <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
               <li class=""><a href="#tab2">SEO Onpage</a></li>
            </ul>
            <div class="tab_container">
               <div class="tab_content pd0" id="tab1" style="display: block;">
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Tên chương:<span class="req">*</span></label>
                     <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" name="name"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                        <div class="clear error" name="name_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                
                  <div class="formRow">
                     <label class="formLeft">Nội dung:</label>
                     <div class="formRight">
                        <div class="left">
                           <input type="file" name="image" id="image" size="25">
                        </div>
                        <div class="clear error" name="image_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Hiển nội dung bằng hình ảnh:</label>
                     <div class="formRight">
                        <span class="oneTwo">
                        <input type="radio" id="param_show_img" value="0" name="show_img" checked="true"> Ẩn <br/>
                        <input type="radio" id="param_show_img" value="1" name="show_img"> Hiện
                        </span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label class="formLeft">Nội dung chữ:</label>
                     <div class="formRight">
                        <div class="left">
                           <textarea class="editor" id="param_content" name="content"></textarea>   
                        </div>
                        <div class="clear error" name="image_error"></div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_cat" class="formLeft">Tên truyện:</label>
                     <div class="formRight">
                        <select name="category_id" class="left">
                           <?php foreach ($catalogs as $row):?>
                           <?php if(count($row->subs) > 1):?>
                           <option value="<?php echo $row->id?>">
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
                        <input type="radio" id="param_status" value="0" name="status" checked="true"> Ẩn <br/>
                        <input type="radio" id="param_status" value="1" name="status"> Hoạt động
                        </span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Vị trí:</label>
                     <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_ordering" name="ordering"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow">
                     <label for="param_name" class="formLeft">Tác giả:</label>
                     <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_ordering" name="author"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="formRow hide"></div>
               </div>
               <div class="tab_content pd0" id="tab2" style="display: none;">
               <div class="formRow">
                  <label for="param_site_title" class="formLeft">Title:</label>
                  <div class="formRight">
                        <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title"></textarea></span>
                        <span class="autocheck" name="site_title_autocheck"></span>
                        <div class="clear error" name="site_title_error"></div>
                  </div>
                  <div class="clear"></div>
               </div>

               <div class="formRow">
                  <label for="param_meta_desc" class="formLeft">Meta description:</label>
                  <div class="formRight">
                        <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"></textarea></span>
                        <span class="autocheck" name="meta_desc_autocheck"></span>
                        <div class="clear error" name="meta_desc_error"></div>
                  </div>
                  <div class="clear"></div>
               </div>

               <div class="formRow">
                  <label for="param_meta_key" class="formLeft">Meta keywords:</label>
                  <div class="formRight">
                        <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"></textarea></span>
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
               <input type="submit" class="redB" value="Thêm mới">
               <input type="reset" class="basic" value="Hủy bỏ">
            </div>
            <div class="clear"></div>
         </div>
      </fieldset>
   </form>
</div>
<div class="clear mt30"></div>