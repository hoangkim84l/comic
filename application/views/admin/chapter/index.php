<!-- head -->
<?php $this->load->view('admin/chapter/head', $this->data)?>
<style>
    .numericButton {
        background-color: #FFFFFF;
        color: #666666;
        border: 1px solid #C9C9C9;
        display: inline-block;
        height: 15px;
        line-height: 14px;
        min-width: 14px !important;
        padding: 4px;
        text-align: center;
        text-decoration: none;
    }
    
    .currentPageButton {
        background-color: #686868;
        color: red !important;
        border: 1px solid #C9C9C9;
        display: inline-block;
        height: 15px;
        line-height: 14px;
        min-width: 14px !important;
        padding: 4px;
        text-align: center;
        text-decoration: none;
    }
    
    .nextbutton {
        background-color: #FFFFFF;
        border: 1px solid #C9C9C9;
        color: #666666 !important;
        display: inline-block;
        height: 15px;
        line-height: 14px;
        padding: 4px;
        text-align: center;
        text-decoration: none;
        width: 100px;
    }
    
    #page_navigation {
		padding-top: 0px;
		display: block !important;
    }
</style>
<div class="line"></div>

<div id="main_chapter" class="wrapper">
<?php $this->load->view('admin/message', $this->data);?>
	<div class="widget">
		
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>
				Danh sách chương
			</h6>
			<div class="num f12">Số lượng: <b><?php echo (isset($totalrow) && count($totalrow) > 0) ? count($totalrow) : $total_rows?></b></div>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
		<thead class="filter"><tr><td colspan="8">
				<form method="get" action="<?php echo admin_url('chapter')?>" class="list_filter form">
					<table width="80%" cellspacing="0" cellpadding="0"><tbody>

						<tr>
							<td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
							<td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id')?>" name="id"></td>
							
							<td style="width:40px;" class="label"><label for="filter_id">Tên chương</label></td>
							<td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name')?>" name="name"></td>
							
							<td style="width:60px;" class="label"><label for="filter_status">Tên truyện</label></td>
							<td class="item">
								<select name="story_id">
									<option value=""></option>
									<!-- kiem tra danh muc co danh muc con hay khong -->
									<?php foreach ($catalogs as $row):?>
										<?php if(count($row->subs) > 1):?>
												<option value="<?php echo $row->id?>" <?php echo ($this->input->get('story_id') == $row->id) ? 'selected' : ''?>><?php echo $row->name?></option>
											<?php endif;?>
										<?php endforeach;?>
									</select>
								</td>

								<td style="width:150px">
									<input type="submit" value="Lọc" class="button blueB">
									<input type="reset" onclick="window.location.href = '<?php echo admin_url('chapter')?>'; " value="Reset" class="basic">
								</td>

							</tr>
						</tbody></table>
					</form>
				</td>
			</tr>
			</thead>
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Tên chương</td>
					<td style="width:75px;">Tên truyện</td>
					<td style="width:75px;">ngày Tạo</td>
					<td style="width:75px;">Trạng thái</td>
					<td style="width:75px;">Sắp xếp</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="11">
						<div class="list_action itemActions">
							<a url="<?php echo admin_url('chapter/delete_all')?>" class="button blueB" id="submit" href="#submit">
								<span style="color:white;">Xóa hết</span>
							</a>
						</div>
						<div class="pagination">
							<!-- <?php echo $this->pagination->create_links()?> -->
							<input type="hidden" id="current_page">
							<input type="hidden" id="show_per_page">

							<div id="page_navigation">
							</div>
						</div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach ($list as $row):?>
					<tr class="row_<?php echo $row->id?> paginations">
						<td><input type="checkbox" value="<?php echo $row->id?>" name="id[]"></td>
						
						<td class="textC"><?php echo $row->id?></td>
						<td>
							<b><?php echo $row->name?></b>
						</td>
						<td>
							<?php
								$this->load->model('story_model');
								$story = $this->story_model->get_info($row->story_id);	
								echo $story->name;
							?>
						</td>
						<td><?php echo $row->created ?></td>
						<td><?php echo $row->status == 1 ? "Hoạt động" :  "Ẩn";?></td>
						<td><?php echo $row->ordering?></td>
						
						<td class="option textC">
							<a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('chapter/edit/'.$row->id)?>">
								<img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
							</a>
							
							<a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('chapter/del/'.$row->id)?>">
								<img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
							</a>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
			
		</table>
	</div>
	
</div>


<script>
    makePager = function(page) {
        var show_per_page = 25; // khởi tạo số recored trên trang
        var number_of_items = jQuery('.paginations').length;
        //lấy tổng số element
        var number_of_pages = Math.ceil(number_of_items / show_per_page);
        // chia xem có bao nhiêu trang
        var number_of_pages_to_display = 5; // sô link hiển thị
        var navigation_html = '';
        var current_page = page; //lấy link page hiện tại
        var current_link = (number_of_pages_to_display >= current_page ? 1 :
            number_of_pages_to_display + 1);
        if (current_page > 1)
            current_link = current_page;
        if (current_link != 1) navigation_html += "<a class='nextbutton' href = \"javascript:first();\">« Trang đầu&nbsp;</a>&nbsp;<a class='nextbutton' href = \"javascript:previous();\">« Trang trước&nbsp;</a>&nbsp;";
        if (current_link == number_of_pages - 1) current_link = current_link - 3;

        else if (current_link == number_of_pages) current_link = current_link - 4;
        else if (current_link > 2) current_link = current_link - 2;
        else current_link = 1;

        var pages = number_of_pages_to_display;

        while (pages != 0) {
            if (number_of_pages < current_link) {
                break;
            }
            if (current_link >= 1)
                navigation_html += "<a class='" + ((current_link == current_page) ?
                    "currentPageButton" : "numericButton") + "' href=\"javascript:showPage(" + current_link + ")\" longdesc='" + current_link + "'>" + (current_link) + "</a>&nbsp;";
            current_link++;
            pages--;
        }
        jQuery('#page_navigation').html(navigation_html);
    }
    var pageSize = 25; //hiển thị bao nhiêu record 1 trang
    showPage = function(page) {
        $(".paginations").hide();
        $('#current_page').val(page);
        $(".paginations").each(function(n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                $(this).show();
        });
        makePager(page);
    }
    showPage(1);
    next = function() {
        new_page = parseInt($('#current_page').val()) + 1;
        showPage(new_page);
    }
    last = function(number_of_pages) {
        new_page = number_of_pages;
        $('#current_page').val(new_page);
        showPage(new_page);
    }
    first = function() {
        var new_page = "1";
        $('#current_page').val(new_page);
        showPage(new_page);
    }
    previous = function() {
        new_page = parseInt($('#current_page').val()) - 1;
        $('#current_page').val(new_page);
        showPage(new_page);
    }
</script>