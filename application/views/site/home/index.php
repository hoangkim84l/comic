<?php

$this->load->model('chapter_model');
$this->load->view('site/slide', $this->data);

?>
<ul class="list-inline" vocab="http://schema.org/" typeof="BreadcrumbList" style="display: none;">
  <li property="itemListElement" typeof="ListItem">
    <meta property="position" content="1" />
    <a property="item" itemprop="url" typeof="WebPage" href="<?php echo base_url() ?>">
      <span itemprop="title" property="name">Trang chủ</span>
    </a>
  </li>
</ul>
<!-- blog post Latest Releases -->
<section class="card-list container-fluid">
  <h3>Latest Releases</h3>
  <div class="row" style="align-items: flex-end;">
    <?php foreach ($top1 as $top1) { ?>
      <div class="col-lg">
        <div class="card card-left">
          <div class="card-img-container">
            <img src="<?php echo $top1->image_link != '' ? base_url('upload/stories/' . $top1->image_link) :  base_url('upload/stories/default.jpg') ?>" title="<?php echo $top1->site_title; ?>" alt="<?php echo $top1->meta_desc ?>" height="600" width="100%">
            <div class="card-img-gradient-overlay">
              <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-first">
              <h5 class="card-title"><?php echo $top1->name; ?> | Chap 35</h5><a href="pages/watch%26read.html" class="btn btn-secondary btn-sm">Read Avaliable</a>
            </div>
            <div class="card-second">
              <p><?php echo number_format($top1->view); ?> lượt xem | <?php echo time_elapsed_string($top1->created); ?></p>
              <div class="dot-group"><svg height="20" width="40">
                  <circle cx="6" cy="10" r="5" class="dot-primary" />
                  <circle cx="20" cy="10" r="5" class="dot-secondary" />
                  <circle cx="35" cy="10" r="5" class="dot-success" />
                </svg></div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="col-lg">
      <?php foreach ($top2 as $top2) { ?>
        <div class="card card-middle">
          <div class="card-img-container">
            <img src="<?php echo $top2->image_link != '' ? base_url('upload/stories/' . $top2->image_link) :  base_url('upload/stories/default.jpg') ?>" title="<?php echo $top2->site_title; ?>" alt="<?php echo $top2->meta_desc ?>" height="250" width="100%">
            <div class="card-img-gradient-overlay">
              <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-first">
              <h5 class="card-title"><?php echo $top2->name; ?> | Chap 35</h5>
            </div>
            <div class="card-second">
              <p><?php echo number_format($top2->view); ?> lượt xem | <?php echo time_elapsed_string($top2->created); ?></p>
              <div class="dot-group"><svg height="20" width="40">
                  <circle cx="6" cy="10" r="5" class="dot-primary" />
                  <circle cx="20" cy="10" r="5" class="dot-secondary" />
                  <circle cx="35" cy="10" r="5" class="dot-success" />
                </svg></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php foreach ($top4 as $top4) { ?>
      <div class="col-lg">
        <div class="card card-right">
          <div class="card-img-container">
            <img src="<?php echo $top4->image_link != '' ? base_url('upload/stories/' . $top4->image_link) :  base_url('upload/stories/default.jpg') ?>" title="<?php echo $top4->site_title; ?>" alt="<?php echo $top4->meta_desc ?>" height="600" width="100%">
            <div class="card-img-gradient-overlay">
              <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-first">
              <h5 class="card-title"><?php echo $top4->name; ?> | Chap 35</h5><a href="pages/watch%26read.html" class="btn btn-secondary btn-sm">Read Avaliable</a>
            </div>
            <div class="card-second">
              <p><?php echo number_format($top4->view); ?> lượt xem | <?php echo time_elapsed_string($top4->created); ?></p>
              <div class="dot-group"><svg height="20" width="40">
                  <circle cx="6" cy="10" r="5" class="dot-primary" />
                  <circle cx="20" cy="10" r="5" class="dot-secondary" />
                  <circle cx="35" cy="10" r="5" class="dot-success" />
                </svg></div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
<div class="btn-centered"><button type="button" class="btn btn-primary btn-lg">Xem thêm</button></div><br>
<!-- blog post Latest Chapter -->
<section class="card-list container-fluid">
  <h3>Latest Chapter</h3>
  <div class="row">
    <div class="col-lg-8">
      <div class="card card-small">
        <div class="card-img-container"><img class="card-img" src="assets/images/phuong-nghich-thien-ha.png" alt="Card image cap">
          <div class="card-img-gradient-overlay">
            <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-first">
            <h5 class="card-title">Thánh Võ Tinh Thần | Chap 35</h5><a href="pages/watch%26read.html" class="btn btn-secondary btn-sm">Read Avaliable</a>
          </div>
          <div class="card-second">
            <p>12.374 views | 2 tháng trước</p>
            <div class="dot-group"><svg height="20" width="40">
                <circle cx="6" cy="10" r="5" class="dot-primary" />
                <circle cx="20" cy="10" r="5" class="dot-secondary" />
                <circle cx="35" cy="10" r="5" class="dot-success" />
              </svg></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-small">
            <div class="card-img-container"><img class="card-img" src="assets/images/truyen-manhua-8.png" alt="Card image cap">
              <div class="card-img-gradient-overlay"><span class="card-dot-success"></span>
                <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
              </div>
            </div>
            <div class="card-body">
              <div class="card-first">
                <h5 class="card-title">Thánh Võ Tinh Thần | Chap 35</h5><a href="pages/watch%26read.html" class="btn btn-secondary btn-sm">Read
                  Avaliable</a>
              </div>
              <div class="card-second">
                <p>12.374 views | 2 tháng trước</p>
                <div class="dot-group"><svg height="20" width="40">
                    <circle cx="6" cy="10" r="5" class="dot-primary" />
                    <circle cx="20" cy="10" r="5" class="dot-secondary" />
                    <circle cx="35" cy="10" r="5" class="dot-success" />
                  </svg></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card card-small">
            <div class="card-img-container"><img class="card-img" src="assets/images/1.png" alt="Card image cap">
              <div class="card-img-gradient-overlay"><span class="card-dot-success"></span>
                <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
              </div>
            </div>
            <div class="card-body">
              <div class="card-first">
                <h5 class="card-title">Thánh Võ Tinh Thần | Chap 35</h5><a href="pages/watch%26read.html" class="btn btn-secondary btn-sm">Read
                  Avaliable</a>
              </div>
              <div class="card-second">
                <p>12.374 views | 2 tháng trước</p>
                <div class="dot-group"><svg height="20" width="40">
                    <circle cx="6" cy="10" r="5" class="dot-primary" />
                    <circle cx="20" cy="10" r="5" class="dot-secondary" />
                    <circle cx="35" cy="10" r="5" class="dot-success" />
                  </svg></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-large">
        <div class="card-img-container"><img class="card-img" src="assets/images/12.png" alt="Card image cap">
          <div class="card-img-gradient-overlay">
            <div class="card-tag"><span class="badge badge-pill badge-primary">English</span> <span class="badge badge-pill badge-warning">Korean</span> <span class="badge badge-pill badge-success">Vietnamese</span> <span class="badge badge-pill badge-secondary">Japanese</span></div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-first">
            <h5 class="card-title">Thánh Võ Tinh Thần | Chap 35</h5><a href="pages/watch%26read.html" class="btn btn-secondary btn-sm">Read Avaliable</a>
          </div>
          <div class="card-second">
            <p>12.374 views | 2 tháng trước</p>
            <div class="dot-group"><svg height="20" width="40">
                <circle cx="6" cy="10" r="5" class="dot-primary" />
                <circle cx="20" cy="10" r="5" class="dot-secondary" />
                <circle cx="35" cy="10" r="5" class="dot-success" />
              </svg></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="information">
  <div class="row">
    <div class="information__container col-lg-6 offset-lg-3">
      <h3><b>Why</b><span>MOTION. STATION?</span></h3>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
        ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
        sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
        invidunt ut labore</p>
    </div>
  </div>
</section>
<section class="contact"><img class="contact-img" src="assets/Mask%20Group%205.svg" alt="contact-image">
  <div class="contact__container">
    <h3>Connect with us</h3>
    <div class="contact__social-network"><a href="#" class="icon"><img class="facebook" src="assets/facebook.svg" alt="Facebook"> </a><a href="#" class="icon"><img class="instagram" src="assets/instagram.svg" alt="Instagram"></a></div>
  </div>
</section>