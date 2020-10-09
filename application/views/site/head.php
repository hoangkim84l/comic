<meta charset="utf-8">
<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- ** Plugins Needed for the Project ** -->
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo public_url()?>site/plugins/bootstrap/bootstrap.min.css">
<!-- slick slider -->
<link rel="stylesheet" href="<?php echo public_url()?>site/plugins/slick/slick.css">
<!-- themefy-icon -->
<link rel="stylesheet" href="<?php echo public_url()?>site/plugins/themify-icons/themify-icons.css">

<!-- Main Stylesheet -->
<link href="<?php echo public_url()?>site/css/style.css" rel="stylesheet">

<!--Favicon-->
<link rel="shortcut icon" href="<?php echo $support->favicon != '' ? base_url('upload/logo/'.$support->favicon) : base_url('upload/logo/default.jpg') ?>" type="image/x-icon">
<link rel="icon" href="<?php echo public_url()?>site/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
<!--Meta seo meta-->
<meta name="robots" content="<?php echo $support->robots?>" />
<meta name="author" content="<?php echo $support->author?>" />
<meta name="copyright" content="<?php echo $support->copyright?>" />
<!--Meta seo web-->
<title><?php echo $support->site_title?></title>
<link rel="canonical" href="<?php echo current_url();?>" />
<meta name="keywords" content="<?php echo $support->site_key?>" />
<meta name="description" content="<?php echo $support->site_desc?>" />
<!--Meta seo web-->

<!--Meta Geo-->
<meta name="DC.title" content="<?php echo $support->site_title?>" />
<meta name="geo.region" content="<?php echo $support->geo_region?>" />
<meta name="geo.placename" content="<?php echo $support->geo_placename?>" />
<meta name="DC.identifier" content="<?php echo current_url();?>" />
<!--Meta Geo-->
<!--Meta facebook-->
<meta property="og:image" content="<?php echo $support->og_image != '' ? base_url('upload/logo/'.$support->og_image) : base_url('upload/logo/default.jpg') ?>" />
<meta property="og:title" content="<?php echo $support->site_key?>" />
<meta property="og:url" content="<?php echo current_url();?>" />
<meta property="og:site_name" content="<?php echo current_url();?>" />
<meta property="og:description" content="<?php echo $support->site_desc?>" />
<meta property="og:type" content="<?php echo $support->og_type?>" />
<!-- jQuery -->
<script src="<?php echo public_url()?>site/plugins/jQuery/jquery.min.js"></script>
<!-- raty -->
<script src="<?php echo public_url()?>/site/raty/jquery.raty.min.js" type="text/javascript"></script>
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
<script data-ad-client="ca-pub-9323279727270807" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>