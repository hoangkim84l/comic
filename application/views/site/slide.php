<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo public_url()?>site/js/jquery.acarousel.min.js"></script>
<script>
$(function () {
	var len = $("#carousel").children().length;
	var acarousel = $("#carousel").acarousel({
		moveStep: function (elem, index, pos_index, t) {
			if (pos_index >= 3 && pos_index < len - 3 || pos_index == len - 3 && t == 0) {
				elem.hide();
			}
		}
	});

	changeActive();

	// $("#carousel li a").click(function() {
	// 	var move = acarousel.moveByElem($(this).parent());
	// 	changeActive(move);
	// 	return false;
	// });

	$("#move_back").click(function () {
		var move = acarousel.move(1);
		changeActive(move);
		return false;
	});

	$("#move_next").click(function () {
		var move = acarousel.move(-1);
		changeActive(move);
		return false;
	});

	$(".move").click(function () {

		var pos = acarousel.getPos();
		pos = pos.index % 5 + pos.point;
		pos = parseInt($(".move").index(this)) - pos;

		var diff1 = Math.abs(pos) % 5 * (pos < 0 ? 1 : -1);
		var diff2 = (10 - (Math.abs(pos) + 5)) % 5 * (pos < 0 ? -1 : 1);

		move = acarousel.move(Math.abs(diff1) < Math.abs(diff2) ? diff1 : diff2);
		changeActive(move);
		return false;
	});

	function changeActive(move) {
		var index = acarousel.getPos(move).index % 5;
		$(".move").removeClass("active").eq(index).addClass("active");
	}

	$(window).resize(function () {
		var parent = $("#carousel_container");
		var self = $("#carousel");
		self.css({
			left: parent.width() / 2 - self.width() / 2
			, top: parent.height() / 2 - self.height() / 2
		});
	}).trigger("resize");

});
</script>
<div id="content">
        <div id="carousel_container">
            <ul id="carousel">
            <?php 
              $count = 0;
              intval($count);
              foreach($data_slides as $data):
              if($data->status == 0){ }else{  
              $count++;
              if($count > 6 ) break;  
            ?>
                <li id="c<?php echo $count;?>">
                    <a href="<?php echo site_url('xem-truyen/'.$data->slug.'/'.$data->id)?>"><img class="img-fluid w-100" loading="lazy" src="<?php echo $data->image_link != '' ? base_url('upload/stories/'.$data->image_link) :  base_url('upload/stories/default.jpg')?>" title="<?php echo $data->site_title;?>" alt="<?php echo $data->meta_desc?>">
                    </a>
                </li>
                <?php } endforeach; ?>
            </ul>
        </div>
        <div id="move_mark">
            <div id="move_back"><a href="#">←</a></div>
            <div id="move_next"><a href="#">→</a></div>
        </div>
    </div>