<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Kata Sambutan</a></li>
        </ol>
        <h2>Kata Sambutan</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- blog section -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-lg-4 pt-2">
                            <img src="<?php echo base_url(); ?>upload/content/<?php echo $content[0]->content_image; ?>" width="100%">
                        </div>
                        <div class="col-lg-8">
                            <?php echo $content[0]->content_text; ?>
                        </div>
                    </div>
            </section>
        </div>
    </section>
</main><!-- End #main -->