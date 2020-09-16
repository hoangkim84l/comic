<div class="topNav">
	<div class="wrapper">
		<div class="welcome">
		<span>Xin chào: <?php if(isset($user_info)): ?><strong><?php echo $user_info->name;?></strong> <?php else:?> <strong>admin!</strong> <?php endif;?></span>
		</div>
		
		<div class="userNav">
			<ul>
				<li><a target="_blank" href="<?php echo base_url()?>">
					<img src="<?php echo public_url('admin')?>/images/icons/light/home.png" style="margin-top:7px;">
					<span>Trang chủ</span>
				</a></li>
				
				<!-- Logout -->
				<li><a href="<?php echo admin_url('admin/logout')?>">
					<img alt="" src="<?php echo public_url('admin')?>/images/icons/topnav/logout.png">
					<span>Đăng xuất</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>