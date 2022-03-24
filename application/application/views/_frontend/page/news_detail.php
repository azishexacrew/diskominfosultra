<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Berita</a></li>
            <li><a href="#">Detail</a></li>
        </ol>
        <h2><?php echo $news[0]->news_title; ?></h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row">

                        <div class="col-lg-8 entries">
                            <?php foreach ($news as $n) { ?>

                                <article class="entry">

                                    <div class="entry-img">
                                        <img src="<?php echo base_url(); ?>upload/news/<?php echo $n->news_cover; ?>" alt="" class="img-fluid">
                                    </div>

                                    <h2 class="entry-title">
                                        <a href=""><?php echo $n->news_title; ?></a>
                                    </h2>

                                    <div class="entry-meta" style="color:#777777;font-size:12px;">
                                        <ul>
                                            <li class="d-flex align-items-center"> <?php echo indonesiaDate($n->news_date) ?> </li>
                                            <li class="d-flex align-items-center"> <b><?php echo indonesiaDate($n->news_count_view) ?>x dilihat</b></li>
                                        </ul>
                                    </div>

                                    <div class="entry-content">
                                        <p>
                                            <?php echo $n->news_text; ?>
                                        </p>
                                    </div>

                                    <div class="entry-content">
                                        <b>Bagikan ke Sosial Media :</b>
                                        <!-- AddToAny BEGIN -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_twitter"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                            <a class="a2a_button_google_gmail"></a>
                                            <a class="a2a_button_copy_link"></a>
                                        </div>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>

                                </article><!-- End blog entry -->

                            <?php } ?>

                        </div><!-- End blog entries list -->

                        <div class="col-lg-4">

                            <div class="sidebar">

                                <h3 class="sidebar-title">Pencarian</h3>
                                <div class="sidebar-item search-form">
                                    <?php echo form_open("page/berita_search") ?>
                                    <input type="text" name="key">
                                    <button type="submit">Cari</button>
                                    <?php echo form_close(); ?>
                                </div><!-- End sidebar search formn-->

                                <hr>
                                <h3 class="sidebar-title">Kategori</h3>
                                <div class="sidebar-item categories">
                                    <ul>
                                        <?php foreach ($news_category as $f) { ?>
                                            <li><a href="<?php echo site_url('page/berita/' . $f->news_category_id); ?>"><?php echo $f->news_category_name; ?></a></li>
                                        <?php } ?>
                                        <!-- <li><a href="#" class="text-secondary">Lihat album lainnya . . .</a></li> -->
                                    </ul>
                                </div>

                                <hr>
                                <h3 class="sidebar-title">Berita Terbaru</h3>
                                <div class="sidebar-item recent-posts">
                                    <?php foreach ($recent as $r) { ?>
                                        <div class="post-item clearfix">
                                            <img class="pt-1" src="<?php echo base_url(); ?>upload/news/<?php echo $r->news_cover ?>" alt="">
                                            <h4><a href="<?php echo site_url('page/berita_detail/' . $r->news_id); ?>"><?php echo $r->news_title ?></a></h4>
                                            <time><?php echo indonesiaDate($r->news_date); ?></time>
                                        </div>
                                    <?php } ?>

                                </div><!-- End sidebar recent posts-->

                            </div><!-- End sidebar -->

                        </div><!-- End blog sidebar -->

                    </div>

                </div>
            </section><!-- End Blog Section -->

        </div>
    </section>
</main><!-- End #main -->