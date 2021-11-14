
<!-- Amount -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img src="<?php echo public_url('admin'); ?>/images/icons/dark/money.png" class="titleIcon" />
			<!-- <h6><?php echo lang('notice_stats_amount'); ?></h6> -->
			<h6></h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
			<tbody>
				
				<tr>
					<td class="fontB blue f13">Tổng số truyện</td>
					<td class="textR webStatsLink red" style="width:120px;"><?php echo number_format($total_stories)?></td>
				</tr>
				
				<tr>
					<td class="fontB blue f13">Tổng số lược xem truyện</td>
					<td class="textR webStatsLink red" style="width:120px;"><?php echo number_format($count_view_stories)?></td>
				</tr>
				
				<tr>
					<td class="fontB blue f13">Tổng số chap</td>
					<td class="textR webStatsLink red" style="width:120px;"><?php echo number_format($chapter_comment)?></td>
				</tr>
				
				<tr>
					<td class="fontB blue f13">Tổng số lược xem chap</td>
					<td class="textR webStatsLink red" style="width:120px;"><?php echo number_format($count_view_chapters)?></td>
				</tr>

				<tr>
					<td class="fontB blue f13">Tổng số danh mục</td>
					<td class="textR webStatsLink red" style="width:120px;">
						<?php echo number_format($total_catalog)?>
					</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>


<!-- User -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img src="<?php echo public_url('admin'); ?>/images/icons/dark/users.png" class="titleIcon" />
			<h6>Thống kê dữ liệu</h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
			<tbody>
				
				<tr>
					<td>
						<div class="left">Tổng số thành viên</div>
						<div class="right f11"><a href="<?php echo admin_url('user')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_user)?>
					</td>
				</tr>
				<tr>
					<td>
						<div class="left">Tổng số liên hệ</div>
						<div class="right f11"><a href="<?php echo admin_url('contact')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_contact)?>
					</td>
				</tr>
				<tr>
					<td>
						<div class="left">Tổng số bình luận</div>
						<div class="right f11"><a href="<?php echo admin_url('contact')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_comment)?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

