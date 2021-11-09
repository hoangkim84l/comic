<meta charset="utf-8">
<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='dmca-site-verification' content='VkEwZHJoN2RTbmt2dXdmYlQ5NzdTT000SkFEWUpRUFlnZ1JtTzRKQnkvQT01' />

<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

<!-- Main Stylesheet -->
<link href="<?php echo public_url()?>site/css/style.css?ver=3" rel="stylesheet">
<link href="<?php echo public_url()?>site/css/style_v2.css?ver=6" rel="stylesheet">
<link href="<?php echo public_url()?>site/css/newSler.css?ver=2" rel="stylesheet">
<!-- Our Custom CSS -->
<link rel="stylesheet" href="<?php echo public_url()?>site/css/style5.css?ver=1">

<!--Favicon-->
<link rel="shortcut icon" href="<?php echo $support->favicon != '' ? base_url('upload/logo/'.$support->favicon) : base_url('upload/logo/default.jpg') ?>" type="image/x-icon">
<link rel="icon" href="<?php echo public_url()?>site/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Pacifico" />
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
<!-- jQuery -->
<script src="<?php echo public_url()?>site/plugins/jQuery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<!-- Autocomplete  Search -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<!-- raty -->
<script src="<?php echo public_url()?>site/raty/jquery.raty.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $.fn.raty.defaults.path = '<?php echo public_url()?>/site/raty/img';
    $('.raty').raty({
        score: function() {
        return $(this).attr('data-score');
        },
        readOnly  : true,
    });
});
</script>
<style>.raty img{width:16px !important;height:16px !important;}</style>
<!--End raty -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178674513-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-178674513-1');
</script>
<!--Google ads-->
<script data-ad-client="ca-pub-9387330072577151" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
jQuery(document).ready(function(){
  jQuery(function(){
    jQuery('#text-search').typeahead({
      source: function(request, response){
        jQuery.ajax({
          url: '/stories/fetch',
          type: 'POST',
          dataType: 'JSON',
          data: 'query='+request,
          success: function(data){
            response(jQuery.map(data, function(item){
              return{
                ids: item.id,
                url:item.slug,
                value: item.name
              }
            }))
          }
        })
      },
      displayText: function(item){
        return item.value
      },
      updater: function( item ) {
        console.log(item);
        window.location.href = "xem-truyen/"+item.url+"-"+item.ids;
      }
    });
  });
});
</script>
<!--pinterest-->
<meta name="p:domain_verify" content="81dc13c314d680b28e35d312ad22f50b"/>
<!--Infinite scroll-->
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
<!--Auto show popup-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
