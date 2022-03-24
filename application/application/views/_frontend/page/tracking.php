

     <!-- ======= Breadcrumbs ======= -->
     <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?php echo site_url('home')?>">Home</a></li>
                <li><a href="#">Tracking Berkas</a></li>
            </ol>
            <h2>Tracking Berkas</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <main id="main">
       
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <?php echo form_open("page/tracking_detail")?>
                    <input class="form-control" type="text" name="key" placeholder="Ketik nomor resi / nama pemohon"><hr>
                    <button type="submit" class="btn btn-sm btn-danger">Tracking Berkas</button>
                <?php echo form_close(); ?>

            </div>
        </section>
    </main><!-- End #main -->