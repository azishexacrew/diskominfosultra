

     <!-- ======= Breadcrumbs ======= -->
     <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?php echo site_url('home')?>">Home</a></li>
                <li><a href="#">Layanan Izin</a></li>
                <li><a href="#">Syarat</a></li>
                <li><a href="#"><?php echo $service[0]->service_name;?></a></li>
            </ol>
            <h2><?php echo $service[0]->service_name;?></h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <main id="main">
       
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:5%">No</th>
                            <th>Syarat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($terms as $t){ ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $t->terms_text;?></td>
                        </tr>
                        <?php $no++;} ?>
                    </tbody>
                </table>

            </div>
        </section>
    </main><!-- End #main -->