<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Berita Publikasi</a></li>
        </ol>
        <h2>Berita Publikasi</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <!-- blog section -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">
                    <h3 class="mb-3">
                        <div class="section-title text-left pb-1">
                            <h2>
                                <?php
                                if ($this->uri->segment(2) == "publication_search" || $publication == NULL || $this->uri->segment(3) == 0)
                                    echo 'Berita Publikasi';
                                else
                                    echo $publication[0]->publication_category_name;
                                ?>
                            </h2>
                        </div>
                    </h3>
                    <div class="sidebar-item search-form">
                        <?php echo form_open_multipart("page/publication_search", "class='form-inline'") ?>
                        <?php echo csrf(); ?>
                        <input type="text" class="form-control" style="width:50%" placeholder="Cari Nama Berita Publikasi" name="key">
                        <button class="btn  btn-danger" type="submit">Cari Berita Publikasi</button>
                        <?php echo form_close(); ?>
                    </div><!-- End sidebar search formn-->
                    <br>
                    <?php
                    if ($this->uri->segment(2) == "publication_search") {
                        echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>" . $search . "</span><hr style='border: 0.5px dashed #d2d6de'>";
                    }
                    ?>
                    <br>

                    <?php
                    if ($publication != NULL) { ?>
                        <table class="table teble-responsive">
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                            <?php foreach ($publication as $index => $r) { ?>
                                <tr>
                                    <td><?php echo $index + 1 . '.'; ?></td>
                                    <td><?php echo $r->publication_name; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="<?php echo base_url() ?>upload/publication/<?php echo $r->publication_file; ?>" target="_blank">Download</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } else echo "<h3 class='text-danger'>Pencarian Tidak Ditemukan !!! </h3>" ?>
                    <div class="blog-pagination"><?php echo $links; ?></div>
                </div>
            </section>
        </div>
    </section>
</main><!-- End #main -->