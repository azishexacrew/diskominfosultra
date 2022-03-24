<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Berita</a></li>
        </ol>
        <h2>Berita</h2>

    </div>
</section><!-- End Breadcrumbs -->


<style>
    span {
        font-size: 14px;

    }
</style>

<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="section-title text-left col-lg-12 py-0">
                            <h2>
                                <?php
                                if ($this->uri->segment(3) == 0 || $news == NULL)
                                    echo 'Semua Berita';
                                else echo $news[0]->news_category_name;
                                ?>
                            </h2>
                        </div>

                        <div class="search-form col-lg-12 mb-5">
                            <?php echo form_open("page/berita_search", "class='form-inline'") ?>
                            <input type="text" class="form-control" style="width:70%" placeholder="Cari Berita" name="key">
                            <button class="btn btn-danger" type="submit">Cari Berita <i class="icofont-search"></i></button>
                            <?php echo form_close(); ?>
                        </div><!-- End search formn-->

                        <div class="col-lg-8 entries">
                            <?php
                            if ($this->uri->segment(2) == "berita_search") {
                                echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>" . $search . "</span><hr style='border: 0.5px dashed #d2d6de'>";
                            }
                            if ($news == NULL) {
                                echo '<b class="px-3">Berita Tidak Ada!!!</b>';
                            } else { ?>
                                <div class="row">
                                    <?php foreach ($news as $n) { ?>
                                        <div class="col-lg-6">
                                            <article class="entry">

                                                <div class="entry-img">
                                                    <img src="<?php echo base_url(); ?>upload/news/<?php echo $n->news_cover; ?>" alt="" class="img-fluid">
                                                </div>

                                                <h2 class="entry-title">
                                                    <a class="link" href="<?php echo site_url('page/berita_detail/' . $n->news_id); ?>"><?php echo $n->news_title; ?></a>
                                                </h2>

                                                <div class="entry-meta" style="color:#777777;font-size:12px;">
                                                    <ul>
                                                        <li class="d-flex align-items-center"> <?php echo indonesiaDate($n->news_date) ?></li>
                                                    </ul>
                                                </div>

                                                <div class="entry-content">
                                                    <p>
                                                        <?php echo strip_tags(substr($n->news_text, 0, 150)) . "...."; ?>
                                                    </p>
                                                    <div class="read-more">
                                                        <a href="<?php echo site_url('page/berita_detail/' . $n->news_id); ?>">Baca Berita</a>
                                                    </div>
                                                </div>
                                            </article><!-- End blog entry -->
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>



                            <hr>
                            <div class="blog-pagination"><?php echo $links; ?></div>

                        </div><!-- End blog entries list -->

                        <div class="col-lg-4">

                            <div class="sidebar">
                                <h3 class="sidebar-title">Berita Populer</h3>
                                <div class="sidebar-item recent-posts">
                                    <?php foreach ($recent as $row) { ?>
                                        <div class="post-item clearfix">
                                            <h4 class="m-0"><a href="<?php echo site_url('page/berita_detail/' . $row->news_id); ?>"><?php echo $row->news_title ?></a></h4>
                                            <time class="m-0">
                                                <small>
                                                    published on <?php echo indonesiaDate($row->news_date); ?> |
                                                    <?php echo $row->news_count_view; ?>x views
                                                </small>
                                            </time>

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