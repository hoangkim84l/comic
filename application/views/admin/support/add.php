
<?php $this->load->view('admin/support/_common'); ?>

<!-- Main content wrapper -->
<div class="wrapper">

	<!-- Form -->
	<form class="form" id="form" action="<?php echo $action; ?>" method="post">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin'); ?>/images/icons/dark/add.png" class="titleIcon" />
					<h6><?php echo lang('add'); ?> <?php echo lang('mod_support'); ?></h6>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_name"><?php echo lang('name'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name"  type="text" value="<?php echo set_value('name')?>"/></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error('name')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_phone"><?php echo lang('phone'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="phone" id="param_phone"  type="text" value="<?php echo set_value('phone')?>"/></span>
						<span name="phone_autocheck" class="autocheck"></span>
						<div name="phone_error" class="clear error"><?php echo form_error('phone')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_hotline">Hotline:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="hotline" id="param_hotline" value="" type="text" /></span>
						<span name="yahoo_autocheck" class="autocheck"></span>
						<div name="yahoo_error" class="clear error"><?php echo form_error('hotline')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_gmail"><?php echo lang('email'); ?>:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="gmail" id="param_gmail" value="" type="text" /></span>
						<span name="gmail_autocheck" class="autocheck"></span>
						<div name="gmail_error" class="clear error"><?php echo form_error('gmail')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_skype"><?php echo lang('skype'); ?>:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="skype" id="param_skype" value="" type="text"/></span>
						<span name="skype_autocheck" class="autocheck"></span>
						<div name="skype_error" class="clear error"><?php echo form_error('skype')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_site_title">Tiều đề trang web:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="site_title" id="param_site_title" value="" type="text"/></span>
						<span name="skype_autocheck" class="autocheck"></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_site_key">Từ khóa:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="site_key" id="param_site_key" value="" type="text"/></span>
						<span name="skype_autocheck" class="autocheck"></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_site_desc">Mô tả trang:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="site_desc" id="param_site_desc" value="" type="text"/></span>
						<span name="skype_autocheck" class="autocheck"></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft">Logo:</label>
					<div class="formRight">
						<div class="left">
							<input type="file" name="logo" id="logo" size="25">
							<img src="<?php echo base_url('upload/logo/'.$info->logo)?>" style="width:100px;height:70px">
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label for="param_site_title" class="formLeft">Chat zalo:</label>
					<div class="formRight">
						<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_zalo" name="zalo"><?php echo $info->zalo?></textarea></span>
						<span class="autocheck" name="site_title_autocheck"></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label for="param_site_title" class="formLeft">Chat facebook:</label>
					<div class="formRight">
						<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_facebook" name="facebook"><?php echo $info->facebook?></textarea></span>
						<span class="autocheck" name="site_title_autocheck"></span>
						<div class="clear error" name="site_title_error"></div>
					</div>
					<div class="clear"></div>
				</div>	
				
				<div class="formRow">
					<label class="formLeft" for="param_sort_order"><?php echo lang('sort_order'); ?>:</label>
					<div class="formRight">
						<input name="sort_order" id="param_sort_order"  class="left" style="width:100px;" type="text" />
						<span name="sort_order_autocheck" class="autocheck"></span>
						<div name="sort_order_error" class="clear error"><?php echo form_error('sort_order')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formSubmit">
					<input type="submit" value="<?php echo lang('button_add'); ?>" class="redB" />
					<input type="reset" value="<?php echo lang('button_reset'); ?>" class="basic" />
				</div>
				<div class="clear"></div>
				
			</div>
		</fieldset>
	</form>
	
</div>
