
    <body>
        <header id="header" class="p-0 fixed-top">
            <div class="d-flex align-items-center container-header pl-0">

                <div id="container-bg" class="">
                    <img src="<?php echo base_url() ?>assets/core-images/logo-sultra.png">
                    <!-- <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>"> -->
                </div>

                <h5 class="mr-5 mt-2 nav-webname">
                    <a class="" href="<?php echo site_url('./') ?>">
                        <b>
                            <div style="line-height:1">
                                DINAS KOMUNIKASI DAN INFORMATIKA
                            </div>
                            <div><small>Provinsi Sulawesi Tenggara</small></div>
                        </b>
                    </a>
                </h5>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="ml-auto mr-5 nav-menu d-none d-lg-block">
                    <ul>
                        <li class="<?php if ($this->uri->segment(1) == 'home') echo 'active' ?>"><a href="<?php echo site_url('home') ?>">Beranda</a></li>
                        <li class="<?php if ($this->uri->segment(1) == 'profil') echo 'active' ?> drop-down"><a href="<?php echo site_url('profil/sambutan') ?>">Profil</a>
                            <ul>
                                <!-- <li><a href="<?php echo site_url('profil/sejarah') ?>">Sejarah</a></li> -->
                                <li><a href="<?php echo site_url('profil/sambutan') ?>">Kata Sambutan</a></li>
                                <li><a href="<?php echo site_url('profil/visi_misi') ?>">Visi Misi</a></li>
                                <!-- <li><a href="<?php echo site_url('profil/maklumat_pelayanan') ?>">Maklumat Pelayanan</a></li> -->
                                <li><a href="<?php echo site_url('profil/struktur_organisasi') ?>">Struktur Organisasi</a></li>
                                <li><a href="<?php echo site_url('profil/tugas_pokok_fungsi') ?>">Tugas Pokok & Fungsi</a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'berita') echo 'active' ?> drop-down"><a href="<?php echo site_url('page/berita/0') ?>">Berita</a>
                            <ul>
                                <?php foreach ($news_category as $r) { ?>
                                    <li><a href="<?php echo site_url('page/berita/') . $r->news_category_id ?>"> <?php echo $r->news_category_name ?> </a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(1) == 'ki') echo 'active' ?> drop-down"><a href="#">Komisi Informasi</a>
                            <ul>
                                <li><a href="<?php echo site_url('ki/pengumuman') ?>">Pengumuman</a></li>
                                <li><a href="<?php echo site_url('ki/unduh_berkas_pendaftaran') ?>">Unduh Berkas Pendaftaran</a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'produk_hukum') echo 'active' ?>"><a href="<?php echo site_url('page/produk_hukum/') ?>">Produk Hukum</a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'album') echo 'active' ?> drop-down"><a href="#">Gallery</a>
                            <ul>
                                <li><a href="<?php echo site_url('page/album/image/0') ?>">Foto</a></li>
                                <li><a href="<?php echo site_url('page/album/video/0') ?>">Video</a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == 'contact_us') echo 'active' ?>"><a href="<?php echo site_url('page/contact_us') ?>">Kontak</a></li>
                    </ul>
                </nav><!-- .nav-menu -->

            </div>
        </header><!-- End Header -->