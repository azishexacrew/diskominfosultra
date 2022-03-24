<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Gallery</a></li>
        </ol>
        <h2>Gallery</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row">

                        <div class="section-title text-left col-lg-12 mb-5 mb-0" style="margin-bottom: 0 !important;">
                            <?php
                            if ($this->uri->segment(3) == 'image')
                                echo '<h2>Gallery Foto</h2>';
                            elseif ($this->uri->segment(3) == 'video')
                                echo '<h2>Gallery Video</h2>';
                            if ($this->uri->segment(4) == 0) {
                                '<p>Kategori: <b>Foto Terbaru</b></p>';
                            }
                            ?>
                        </div>

                        <div class="entries col-lg-12 px-0">
                            <div class="row justify-content-lg-center px-3">
                                <div class="col-lg-4">
                                    <?php
                                    if ($album == NULL) {
                                        echo '<b> --- Kategori Kosong ---</b>';
                                    } else { ?>
                                        <div class="sidebar m-0">
                                            <div class="sidebar-title">
                                                Kategori
                                            </div>
                                            <hr>
                                            <?php foreach ($album as $row) { ?>
                                                <?php if ($this->uri->segment(3) == 'image') { ?>
                                                    <h5 class="text-left section-title pb-0">
                                                        <a class=" link" href="<?php echo site_url('page/album/image/' . $row->album_id); ?>"><?php echo $row->album_name; ?></a>
                                                    </h5>
                                                <?php } ?>

                                                <?php if ($this->uri->segment(3) == 'video') { ?>
                                                    <h5 class="text-left section-title pb-0">
                                                        <a class=" link" href="<?php echo site_url('page/album/video/' . $row->album_id); ?>"><?php echo $row->album_name; ?></a>
                                                    </h5>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="col-lg-8">
                                    <div class="row">
                                        <?php
                                        if ($gallery == NULL) {
                                            echo '<div class="entry col-lg-12 text-center">--- Gallery Kosong ---</div>';
                                        } else {
                                            foreach ($gallery as $row) { ?>
                                                <div class="col-lg-6">
                                                    <article class="entry">

                                                        <?php if ($this->uri->segment(3) == 'image') { ?>
                                                            <div class="entry-img" style="height: 200px; overflow-y: hidden;">
                                                            	<a class="img-link" target="_blank" href="<?php echo base_url() . 'upload/album/' . $row->gallery_dir; ?>">
                                                                	<img src="<?php echo base_url() . 'upload/album/' . $row->gallery_dir; ?>" alt="" class="img-fluid">
                                                            	</a>
                                                            </div>
                                                        <?php } ?>

                                                        <?php if ($this->uri->segment(3) == 'video') { ?>
                                                            <div class="entry-content" style="margin: -20px -20px 20px -20px;">
                                                                <?php if ($row->gallery_type == 'video'){ ?>
                                                                    <video width="100%" controls>
                                                                        <source src="<?php echo base_url(); ?>upload/album/video/<?php echo $row->gallery_dir; ?>" type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                <?php } elseif($row->gallery_type == 'link'){ ?>
                                                                    <iframe width="100%" src="<?php echo $row->gallery_dir; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                <?php }?>
                                                            </div>
                                                        <?php } ?>
                                                        <span class="text-center">
                                                            <?php echo $row->gallery_name; ?>
                                                        </span><br>
                                                        <div class="text-left text-primary pt-3" style="line-height: 15px;">
                                                            <a class="link_hover" href="<?php echo site_url('page/berita/') . $row->album_id; ?>">
                                                                <i class="icofont-tags float-left"></i>
                                                                <small> <?php echo $row->album_name; ?></small>
                                                            </a>
                                                        </div>

                                                    </article><!-- End blog entry -->
                                                </div>
                                        <?php }
                                        } ?>
                                        <div class="blog-pagination col-lg-12">
                                            <hr>
                                            <?php echo $links; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End blog entries list -->

                    </div>
                </div>
            </section><!-- End Blog Section -->

        </div>
    </section>
</main><!-- End #main -->