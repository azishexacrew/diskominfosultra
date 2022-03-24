<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Tugas Pokok & Fungsi</a></li>
        </ol>
        <h2>Tugas Pokok & Fungsi</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- blog section -->
            <section id="blog" class="blog p-0">
                <div class="container" data-aos="fade-up">
                    <?php
                    if ($this->uri->segment(3) == '') {
                        echo $content[0]->content_text;
                    } else { ?>
                        <div class="section-title text-left col-lg-12 p-0">
                            <h2>
                                Tupoksi <?php echo $field[$this->uri->segment(3)]->field_name; ?>
                            </h2>
                        </div>
                        <?php echo $field[$this->uri->segment(3)]->field_tupoksi; ?>
                    <?php } ?>
                </div>
            </section>

            <!-- blog section -->
            <!-- <section id="blog" class="blog">
                <div class="section-title text-left col-lg-12">
                    <h2>Tugas & Fungsi Pokok Bidang</h2>
                </div>
                <div class="container" data-aos="fade-up">
                    <?php foreach ($field as $index => $row) { ?>
                        <h5 class="ml-3">
                            <a class="link" href="<?php echo site_url('profil/tugas_pokok_fungsi/' . $index); ?>">
                                <b><?php echo $row->field_name ?></b>
                            </a>
                        </h5>
                        <hr>
                    <?php } ?>
                </div>
            </section> -->


        </div>
    </section>
</main>