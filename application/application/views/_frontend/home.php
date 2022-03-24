<style>
    .news-text p {
        font-size: 14px;
    }

    .news-text span {
        font-size: 14px;
    }

    .owl-carousel-image .animated {
        animation-duration: 3500ms;
    }

    #hero .carousel-item::before {
        content: '';
        background-color: rgba(0, 0, 0, 0);
    }

    .carousel-item {

        background-position: center center;
    }
</style>

<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">

            <?php $i = 1;
            foreach ($slider as $s) { ?>
                <div class="carousel-item <?php if ($i == 1) echo "active"; ?>" style="background-image: url(<?php echo base_url() . 'upload/slider/' . $s->slider_image; ?>); ">
                </div>
            <?php $i++;
            } ?>
        </div>
    </div>
</section><!-- End Hero -->

<main id="main" class="pt-5">
    <!-- ======= Beranda ======= -->
    <section id="blog" class="blog home-sticky">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="section-title text-left col-lg-12 p-0">
                    <h2>Berita Terkini Mengenai Diskominfo</h2>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        <div class="row">
                            <?php foreach ($news as $n) { ?>
                                <div class="col-lg-4 news-text mb-5">
                                    <div class="col-lg-12 p-0" style="height: 150px; overflow-y: hidden;">
                                        <img src="<?php echo base_url(); ?>upload/news/<?php echo $n->news_cover; ?>" style="width: 100%;">
                                    </div>
                                    <div>
                                        <div class="section-title text-left pb-1 pt-2">
                                            <b><a class="link" href="<?php echo site_url('page/berita_detail/') . $n->news_id; ?>"><?php echo $n->news_title ?></b></a>
                                        </div>
                                        <div class="content-justify">
                                            <small class="text-primary"><i>Posted by <?php echo $n->user_fullname; ?></i></small>
                                        </div>
                                        <div class="content-justify">
                                            <?php echo substr($n->news_text, 0, 150); ?><br>
                                            <a class="link_hover" href="<?php echo site_url('page/berita_detail/') . $n->news_id; ?>">View More . . .</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-left pl-3 pr-0 text-primary" style="line-height: 10px;">
                                                <a class="link_hover" href="<?php echo site_url('page/berita/') . $n->news_category_id; ?>">
                                                    <i class="icofont-tags float-left mr-1"></i>
                                                    <small><?php echo $n->news_category_name; ?></small>
                                                </a>
                                            </div>
                                            <div class="col-5 text-right pl-0 pr-3 text-primary">
                                                <i class="icofont-eye"></i><small><?php echo $n->news_count_view; ?>x views</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="p-4 text-right">
                        <!-- <a class="btn btn-danger btn-sm" href="<?php echo site_url('page/berita/1'); ?>">Berita Lain . . .</a> -->
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Berita Lainnya</h3>
                        <hr>
                        <div class="sidebar-item recent-posts">
                            <?php foreach ($news_sidebar as $r) { ?>
                                <div class="post-item clearfix">
                                    <h4 class="m-0"><a href="<?php echo site_url('page/berita_detail/' . $n->news_id); ?>"><?php echo $r->news_title ?></a></h4>
                                    <small class="m-0">posted on <?php echo indonesiaDate($r->news_date); ?></small>
                                </div>
                            <?php } ?>

                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->
                </div>
                <!-- <a href="<?php echo site_url('page/berita') ?>" class="btn btn-sm btn-success">Lihat Berita Lainnya </a> -->
            </div>
        </div>
    </section>

    <section id="cta" class="cta py-5 text-white">
        <marquee behavior="" direction=""><?php echo $setting[0]->setting_runing_text ?></marquee>
    </section>

    <!-- ======= Photos Section ======= -->
    <section id="blog" class="blog" style="background-color: #f1f8ff; padding: 150px 0;">
        <div class="section-title text-center col-lg-12">
            <h2>Foto Terbaru</h2>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($gallery_image as $g) { ?>
                    <div class="col text-center mb-5">
                        <img src="<?php echo base_url() . 'upload/album/' . $g->gallery_dir ?>" alt="" style="opacity: 1; width: 100%; min-width:175px; transition: 0.5s; border-radius:5px;">
                        <b><?php echo $g->gallery_name ?></b><br>
                        <small><?php echo indonesiaDate($g->album_date); ?></small>
                    </div>
                <?php } ?>
            </div>
            <div class="p-4 text-right">
                <a class="btn btn-danger btn-sm" href="<?php echo site_url('page/album/image') ?>">Lihat Foto Lainnya . . .</a>
            </div>
        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Photos Section ======= -->
    <section id="blog" class="blog" style="padding: 150px 0">
        <div class="section-title text-center col-lg-12">
            <h2>Video Terbaru</h2>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($gallery_video as $gv) { ?>
                    <div class="col-lg-4 text-center mb-5">
                        <video width="100%" controls>
                            <source src="<?php echo base_url(); ?>upload/album/video/<?php echo $gv->gallery_dir; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <b><?php echo $gv->gallery_name ?></b><br>
                        <small><?php echo indonesiaDate($gv->album_date); ?></small>
                    </div>
                <?php } ?>
            </div>
            <div class="p-4 text-right">
                <a class="btn btn-danger btn-sm" href="<?php echo site_url('page/album/video') ?>">Lihat Video Lainnya . . .</a>
            </div>
        </div>
    </section><!-- End Clients Section -->

    <section id="cta" class="cta">
        <div class="container">
            <div class="row" data-aos="zoom-in">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3>Tracking Pesan/Aduan/Kritik Anda</h3>
                    <p> Ingin mengetahui progress dari pesan/aduan/kritik yang telah anda sampaikan pada kami? Silahkan klik tombol Tracking untuk mengetahui detailnya.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="<?php echo site_url('page/tracking'); ?>">Tracking Pesan</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg pb-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>F.A.Q</h2>
            </div>

            <div class="faq-list">
                <ul>
                    <?php foreach ($faq as $index => $row) { ?>
                        <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="<?php echo $index; ?>00">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-<?php echo $index; ?>"><?php echo $row->faq_question; ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-<?php echo $index; ?>" class="collapse" data-parent=".faq-list">
                                <p>
                                    <?php echo $row->faq_answer; ?>
                                </p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->



    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients" style="background-color: #1474ae;">
        <div class="section-title text-center col-lg-12">
            <h2 class="text-white">Link Terkait</h2>
        </div>
        <div class="container" data-aos="zoom-in">
            <div class="owl-carousel clients-carousel">
                <?php foreach ($link_terkait as $link) { ?>
                    <a href="<?php echo $link->link_terkait_url ?>" target="_blank"><img src="<?php echo base_url() . 'upload/link_terkait/' . $link->link_terkait_logo ?>" alt=""></a>
                <?php } ?>
            </div>
        </div>
    </section><!-- End Clients Section -->

</main>
<!-- End #main -->