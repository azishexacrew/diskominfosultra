<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Maklumat & Pelayanan</a></li>
        </ol>
        <h2>Maklumat & Pelayanan</h2>
    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- blog section -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">
                    <?php echo $content[0]->content_text; ?>
                </div>
            </section>
        </div>
    </section>
</main><!-- End #main -->