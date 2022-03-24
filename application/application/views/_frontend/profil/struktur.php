<style>
    .img-link:hover {
        cursor: zoom-in;
    }
</style>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Struktur Organisasi</a></li>
        </ol>
        <h2>Struktur Organisasi</h2>

    </div>
</section>
<!-- End Breadcrumbs -->

<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <!-- blog section -->
                <section id="blog" class="blog col-12">
                    <div class="container" data-aos="fade-up">
                        <?php if ($this->uri->segment(3) == '') { ?>
                            <a class="img-link" target="_blank" href="<?php echo base_url() . 'upload/content/' . $content[0]->content_image; ?>">
                                <img src="<?php echo base_url() . 'upload/content/' . $content[0]->content_image; ?>" width="100%">
                            </a>
                            <p class="px-3">
                                <?php echo $content[0]->content_text; ?>
                            </p>
                        <?php } else { ?>
                            <div class="section-title text-left col-lg-12 p-0">
                                <h2>
                                    <?php echo $field[$this->uri->segment(3)]->field_name ?>
                                </h2>
                            </div>
                            <p class="px-3">
                                <?php echo $field[$this->uri->segment(3)]->field_description; ?>
                            </p>
                        <?php } ?>
                    </div>
                </section>

                <!-- blog section -->
                <!-- <section id="blog" class="blog col-4 pr-2">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Struktur Organisasi Diskominfo</h3>
                        <i class="icofont-clock-time"></i><small class="m-0"> <?php echo indonesiaDate($field_createtime[0]->createtime); ?></small>
                        <hr>
                        <div class="sidebar-item recent-posts">
                            <h4 class="mx-0"><b>Setiap Bidang</b></h4>
                            <div class="post-item clearfix">
                                <?php foreach ($field as $index => $row) { ?>
                                    <h4 class="ml-3"><a href="<?php echo site_url('profil/struktur_organisasi/' . $index); ?>">> <?php echo $row->field_name ?></a></h4>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section> -->

            </div>
        </div>
    </section>

</main>