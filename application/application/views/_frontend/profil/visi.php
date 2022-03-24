<!-- ======= Breadcrumbs ======= --> 
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Visi Misi</a></li>
        </ol>
        <h2>Visi Misi</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="row">
                
                <!-- blog section -->
                <!-- <section id="blog" class="blog col-6">
                    <div class="section-title text-left col-lg-12">
                        <h2>Sejarah</h2>
                    </div>
                    <div class="container" data-aos="fade-up">
                        <?php echo $content_2[0]->content_text; ?>
                    </div>
                </section> -->


                <!-- blog section -->
                <section id="blog" class="blog col-12 p-0">
                    <!-- <div class="section-title text-left col-lg-12">
                        <h2>Visi Misi</h2>
                    </div> -->
                    <div class="container" data-aos="fade-up">
                        <?php echo $content[0]->content_text; ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>