<!-- head -->
<?php $this->load->view('admin/story/head', $this->data)?>

<div class="line"></div>

<div id="main_story" class="wrapper">
<?php $this->load->view('admin/message', $this->data);?>
	<div class="widget">
		
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>
				Danh sách truyện
			</h6>
			<div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
		<thead class="filter"><tr><td colspan="11">
				<form method="get" action="<?php echo admin_url('story')?>" class="list_filter form">
					<table width="80%" cellspacing="0" cellpadding="0"><tbody>

						<tr>
							<td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
							<td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id')?>" name="id"></td>
							
							<td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
							<td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name')?>" name="name"></td>
							
							<td style="width:60px;" class="label"><label for="filter_status">Thể loại</label></td>
							<td class="item">
								<select name="category_id">
									<option value=""></option>
									<!-- kiem tra danh muc co danh muc con hay khong -->
									<?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) > 1):?>
											<optgroup label="<?php echo $row->name?>">
												<?php foreach ($row->subs as $sub):?>
													<option value="<?php echo $sub->id?>" <?php echo ($this->input->get('category_id') == $sub->id) ? 'selected' : ''?>> <?php echo $sub->name?> </option>
												<?php endforeach;?>
											</optgroup>
											<?php else:?>
												<option value="<?php echo $row->id?>" <?php echo ($this->input->get('category_id') == $row->id) ? 'selected' : ''?>><?php echo $row->name?></option>
											<?php endif;?>
										<?php endforeach;?>
									</select>
								</td>

								<td style="width:150px">
									<input type="submit" value="Lọc" class="button blueB">
									<input type="reset" onclick="window.location.href = '<?php echo admin_url('story')?>'; " value="Reset" class="basic">
								</td>

							</tr>
						</tbody>
					</table>
					</form>
				</td>
			</tr>	
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Tiêu đề</td>
					<td style="width:75px;">Mô tả</td>
					<td style="width:75px;">Ảnh bìa</td>
					<td style="width:75px;">Danh mục</td>
					<td style="width:75px;">ngày Tạo</td>
					<td style="width:75px;">Cập nhật lần cuối</td>
					<td style="width:75px;">Trạng thái</td>
					<td style="width:75px;">lược xem</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="11">
						<div class="list_action itemActions">
							<a url="<?php echo admin_url('story/delete_all')?>" class="button blueB" id="submit" href="#submit">
								<span style="color:white;">Xóa hết</span>
							</a>
						</div>
						<div class="pagination">
							<?php echo $this->pagination->create_links()?>
						</div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach ($list as $row):?>
					<tr class="row_<?php echo $row->id?>">
						<td><input type="checkbox" value="<?php echo $row->id?>" name="id[]"></td>
						
						<td class="textC"><?php echo $row->id?></td>
						<td>
							<b><?php echo $row->name?></b>
						</td>
						<td><?php echo $row->description?></td>
						<td align="center"><img height="150" src="<?php echo $row->image_link != '' ? base_url('upload/stories/'.$row->image_link) : base_url('upload/stories/default.jpg')?>"></td>
						<td>
							<?php
								$this->load->model('catalog_model');
								$catalog = $this->catalog_model->get_info($row->category_id);	
								echo $catalog->name;
							?>
						</td>
						<td><?php echo $row->created ?></td>
						<td><?php echo $row->updated ?></td>
						<td><?php echo $row->status == 1 ? "Hoạt động" :  "Tạm dừng";?></td>
						<td><?php echo $row->view?></td>
						
						<td class="option textC">
							
							<a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('story/edit/'.$row->id)?>">
								<img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
							</a>
							
							<a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('story/del/'.$row->id)?>">
								<img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
							</a>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
			
		</table>
	</div>
	
</div>


