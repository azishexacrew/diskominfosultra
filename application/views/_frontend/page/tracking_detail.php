<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Tracking Berkas</a></li>
            <li><a href="#"><?php echo $search; ?></a></li>
        </ol>
        <h2>Key Tracking: <?php echo $search; ?> </h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <a href="<?php echo site_url('page/tracking') ?>" class="btn btn-sm btn-warning">Kembali</a>
            <hr>
            <?php
            if ($tracking) {
                $no = 1;
                foreach ($tracking as $t) { ?>
                    <b style="color:red;">Data #<?php echo $no ?></b>
                    <table class="table">
                        <tr>
                            <td style="width: 30%"><b>NUP/Resi Permohonan</b></td>
                            <td><?php echo $t->tracking_nup; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%"><b>Pemohon</b></td>
                            <td><?php echo $t->tracking_name; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%"><b>Jenis Izin</b></td>
                            <td><?php echo $t->service_name; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%"><b>Status</b></td>
                            <td>
                                <?php
                                if ($t->tracking_status == 0) {
                                    echo '<button class="btn btn-sm btn-warning">Sedang Proses</button>';
                                } else {
                                    echo '<button class="btn btn-sm btn-success">Izin Selesai</button>';
                                }

                                ?>
                            </td>
                        </tr>
                    </table>

                    <hr><br><br>
            <?php $no++;
                }
            } ?>


        </div>
    </section>
</main><!-- End #main -->