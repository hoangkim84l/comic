<meta charset="utf-8">
<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='dmca-site-verification' content='VkEwZHJoN2RTbmt2dXdmYlQ5NzdTT000SkFEWUpRUFlnZ1JtTzRKQnkvQT01' />

<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?php echo public_url()?>site/css/main.css">

<!--Favicon-->
<link rel="shortcut icon" href="<?php echo $support->favicon != '' ? base_url('upload/logo/'.$support->favicon) : base_url('upload/logo/default.jpg') ?>" type="image/x-icon">
<link rel="icon" href="<?php echo public_url()?>site/images/favicon.ico" type="image/x-icon">

<!--Meta seo meta-->
<meta name="robots" content="<?php echo $support->robots?>" />
<meta name="author" content="<?php echo $support->author?>" />
<meta name="copyright" content="<?php echo $support->copyright?>" />
<!--Meta seo web-->
<?php
 $url = $this->uri->rsegment('1');
 //contact //stories //user
if($url == "contact"){
  $seo_title_custom = "Liên hệ - Cafesuanovel";
  $seo_desc_custom = "Liên hệ - Lướt cà phê sữa, muốn đọc nữa, hông muốn dừng - Đọc truyện online tại cafesuanovel.";
}
elseif($url == "stories"){
  $seo_title_custom = "Truyện - Cafesuanovel";
  $seo_desc_custom = "Đọc truyện online tại cafesuanovel với nhiều thể loại Sports, Trinh thám, Psychological, School Life, Harem, Horror, Comedy, Chuyển Sinh, Anime, Ngôn tình, Đam mỹ, Fantasy, Oneshot, Magic, Action, Manga/Comic, Romance, Shoujo, Adventure, Ecchi cập nhật mỗi ngày.";
}
elseif($url == "user"){
  $subUrl = $this->uri->rsegment('2');
  if($subUrl == "register"){
    $seo_title_custom = "Đăng ký - Cafesuanovel";
    $seo_desc_custom = "Đăng ký thành viên - Lướt cà phê sữa, muốn đọc nữa, hông muốn dừng - Đọc truyện online tại cafesuanovel.";
  }elseif($subUrl == "login"){
    $seo_title_custom = "Đăng nhập - Cafesuanovel";
    $seo_desc_custom = "Đăng nhập - Lướt cà phê sữa, muốn đọc nữa, hông muốn dừng - Đọc truyện online tại cafesuanovel.";
  }else{
    $seo_title_custom = "Thành viên - Cafesuanovel";
    $seo_desc_custom = "Thành viên - Lướt cà phê sữa, muốn đọc nữa, hông muốn dừng - Đọc truyện online tại cafesuanovel.";
  }
}
else{
  $seo_title_custom = $support->site_title;
  $seo_desc_custom = $support->site_desc;
}

?>
<title><?php if(isset($stories) && ($stories->site_title != "")){ echo $stories->site_title;}elseif(isset($chapter) && ($chapter->site_title != "")){ echo $chapter->site_title;}else{echo $seo_title_custom;}?></title>
<link rel="canonical" href="<?php echo current_url();?>" />
<meta name="keywords" content="<?php if(isset($stories) && ($stories->meta_key != "")){ echo $stories->meta_key;}elseif(isset($chapter) && ($chapter->meta_key != "")){ echo $chapter->meta_key;}else{echo $support->site_key;}?>" />
<meta name="description" content="<?php if(isset($stories) && ($stories->meta_desc != "")){ echo $stories->meta_desc;}elseif(isset($chapter) && ($chapter->meta_desc != "")){ echo $chapter->meta_desc;}else{echo $seo_desc_custom;}?>" />
<!--Meta seo web-->

<!--Meta Geo-->
<meta name="DC.title" content="<?php if(isset($stories) && ($stories->site_title != "")){ echo $stories->site_title;}elseif(isset($chapter) && ($chapter->site_title != "")){ echo $chapter->site_title;}else{echo $seo_title_custom;}?>" />
<meta name="geo.region" content="<?php echo $support->geo_region?>" />
<meta name="geo.placename" content="<?php echo $support->geo_placename?>" />
<meta name="DC.identifier" content="<?php echo current_url();?>" />
<!--Meta Geo-->
<!--Meta facebook-->
<meta property="og:image" typeof="WebPage" content="<?php echo $support->og_image != '' ? base_url('upload/logo/'.$support->og_image) : base_url('upload/logo/default.jpg') ?>" />
<meta property="og:title" typeof="WebPage" content="<?php if(isset($stories) && ($stories->meta_key != "")){ echo $stories->meta_key;}elseif(isset($chapter) && ($chapter->meta_key != "")){ echo $chapter->meta_key;}else{echo $support->site_key;}?>" />
<meta property="og:url" typeof="WebPage" content="<?php echo current_url();?>" />
<meta property="og:site_name" typeof="WebPage" content="<?php echo current_url();?>" />
<meta property="og:description" typeof="WebPage" content="<?php if(isset($stories) && ($stories->meta_desc != "")){ echo $stories->meta_desc;}elseif(isset($chapter) && ($chapter->meta_desc != "")){ echo $chapter->meta_desc;}else{echo $seo_desc_custom;}?>" />
<meta property="og:type" typeof="WebPage" content="<?php echo $support->og_type?>" />
