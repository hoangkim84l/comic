<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('site/head'); ?>
  <style>
    #nprogress {
      pointer-events: none;
    }

    #nprogress .bar {
      background: #14b8a6;
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100%;
      height: 2px;
    }

    #nprogress .peg {
      display: block;
      position: absolute;
      right: 0px;
      width: 100px;
      height: 100%;
      box-shadow: 0 0 10px #14b8a6, 0 0 5px #14b8a6;
      opacity: 1;
      -webkit-transform: rotate(3deg) translate(0px, -4px);
      -ms-transform: rotate(3deg) translate(0px, -4px);
      transform: rotate(3deg) translate(0px, -4px);
    }

    #nprogress .spinner {
      display: block;
      position: fixed;
      z-index: 1031;
      top: 15px;
      right: 15px;
    }

    #nprogress .spinner-icon {
      width: 18px;
      height: 18px;
      box-sizing: border-box;
      border: solid 2px transparent;
      border-top-color: #14b8a6;
      border-left-color: #14b8a6;
      border-radius: 50%;
      -webkit-animation: nprogresss-spinner 400ms linear infinite;
      animation: nprogress-spinner 400ms linear infinite;
    }

    .nprogress-custom-parent {
      overflow: hidden;
      position: relative;
    }

    .nprogress-custom-parent #nprogress .spinner,
    .nprogress-custom-parent #nprogress .bar {
      position: absolute;
    }

    @-webkit-keyframes nprogress-spinner {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes nprogress-spinner {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Page Content Holder -->
    <div class="min-h-screen bg-gray-200 selection:bg-sky-400 selection:text-white">
      <div class="flex flex-row scroll-smooth">
        <?php $this->load->view('site/left'); ?>
        <?php $this->load->view($temp, $this->data); ?>
      </div>
    </div>
  </div>
  <button onclick="topFunction()" id="myBtn" title="Go to top">
    <img width="30px" src="<?php echo public_url() ?>site/images/ot.png" alt="đọc truyện cafe sữa, cafe sữa novel, Web comic truyện tranh, truyện nhân gian">
  </button>
  <a class="go-to-homepage" title="Go to home page" href="https://cafesuanovel.com">
    <img class="img-icon" src="<?php echo base_url('upload/banner/icon/icon_05.png'); ?>" alt="cafe sữa novel">
  </a>

  <script type="text/javascript">
    jQuery(document).ready(function() {
       	jQuery('*').bind('cut copy paste contextmenu', function (e) {
       		e.preventDefault();
       	})
      jQuery('#menu-mobile').click(function() {
        let element = document.getElementById("mobile");
        element.classList.toggle("hidden");
      });
    });

    //block f12 key
    //  $(document).keydown(function (event) {
    //  	if (event.keyCode == 123) { // Prevent F12
    //  		return false;
    //  	} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
    // 		return false;
    //  	}
    //  });
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");

    const swiperEl = document.querySelector("swiper-container");
    swiperEl.addEventListener("autoplaytimeleft", (e) => {
      const [swiper, time, progress] = e.detail;
      progressCircle.style.setProperty("--progress", 1 - progress);
      progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    });
  </script>

</body>

</html>