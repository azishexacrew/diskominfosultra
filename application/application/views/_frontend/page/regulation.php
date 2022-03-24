 	<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Produk Hukum</a></li>
        </ol>
        <h2>Produk Hukum</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- blog section -->
            <!-- <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">
                    <h3 class="mb-3">
                        <div class="section-title pb-1">
                            <h2>
                                Telusuri Tema
                            </h2>
                        </div>
                    </h3>
                    <br>

                    <?php
                    if ($regulation_category != NULL) { ?>
                        <div class="row">
                            <?php foreach ($regulation_category as $index => $row) { ?>
                                <div class="col text-center">
                                    <article class="entry">
                                        <div class="entry-img p-3">
                                            <img src="<?php echo base_url(); ?>upload/regulation_category/icon/<?php echo $row->regulation_category_icon; ?>" alt="" width="100px">
                                        </div>
                                        <a class="link" href="<?php echo base_url() . 'page/produk_hukum/' . $row->regulation_category_id ?>"><?php echo $row->regulation_category_name; ?></a>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else echo "<h3 class='text-danger'>Pencarian Tidak Ditemukan !!! </h3>" ?>
                    <div class="blog-pagination"><?php echo $links; ?></div>
                </div>
            </section> -->


            <!-- blog section -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">
                    <h3 class="mb-3">
                        <div class="section-title text-left pb-1">
                            <h2>
                                <?php
                                if ($this->uri->segment(2) == "produk_hukum_search" || $regulation == NULL || $this->uri->segment(3) == '')
                                    echo 'Produk Hukum';
                                elseif ($this->uri->segment(3) != '')
                                    echo $regulation[0]->regulation_category_name;
                                ?>
                            </h2>
                        </div>
                    </h3>
                    <!-- <div class="search-form">
                        <?php //echo form_open_multipart("page/produk_hukum_search", "class='form-inline'") 
                        ?>
                        <?php //echo csrf(); 
                        ?>
                        <input type="text" class="form-control" style="width:50%" placeholder="Cari Nama Produk Hukum" name="key">
                        <button class="btn  btn-danger" type="submit">Cari Produk Hukum</button>
                        <?php //echo form_close(); 
                        ?>
                    </div> -->
                    <!-- End sidebar search formn-->
                    <?php
                    if ($this->uri->segment(2) == "produk_hukum_search") {
                        // echo 'Jenis: <span class="label label-danger label-inline font-weight-lighter mr-2">' . $search_category[0]->regulation_category_name . '</span>';
                        echo 'Nomor: <span class="label label-danger label-inline font-weight-lighter mr-2">' . $search . '</span>';
                        // echo 'Tahun: <span class="label label-danger label-inline font-weight-lighter mr-2">' . $search_year . '</span>';
                        echo '<hr style="border: 0.5px dashed #d2d6de">';
                    }
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-lg-8">
                            <?php
                            if ($regulation != NULL) { ?>
                                <table class="table teble-responsive">
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php foreach ($regulation as $index => $r) { ?>
                                        <tr>
                                            <td><?php echo $index + 1 . '.'; ?></td>
                                            <td><?php echo $r->regulation_name; ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="<?php echo base_url() ?>upload/regulation/<?php echo $r->regulation_file; ?>" target="_blank">Download</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } else echo "<h3 class='text-danger'>Pencarian Tidak Ditemukan !!! </h3>" ?>
                            <div class="blog-pagination"><?php echo $links; ?></div>
                        </div>


                        <div class="col-lg-4">
                            <?php echo form_open_multipart("page/produk_hukum_search") ?>
                            <?php echo csrf(); ?>
                            <div class="form-group">
                                <label class="px-1" for="key_category_id"><small><b>Jenis:</b></small></label>
                                <select class="form-control" name="key_category_id" id="key_category_id">
                                    <option value="" selected disabled>-- Pilih Jenis --</option>
                                    <?php foreach ($regulation_category as $r) { ?>
                                        <option value="<?php echo $r->regulation_category_id ?>"><?php echo $r->regulation_category_name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label class="px-1" for="key_category_id"><small><b>Nomor: </b></small></label>
                                <input type="text" class="form-control" placeholder="Nomor" name="key">
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label class="px-1" for="key_category_id"><small><b>Tahun: </b></small></label>
                                <input type="text" class="form-control" placeholder="Tahun" name="key_year">
                                <div class="validate"></div>
                            </div>

                            <div class="text-right">
                                <button class="btn btn-danger" type="submit">Cari Produk Hukum</button>
                            </div>

                            <?php echo form_close(); ?>
                            <!-- End formn-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main><!-- End #main -->