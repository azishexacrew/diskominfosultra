<div>
    <h3 class="sidebar-title">Cari Produk Hukum</h3>
    <div class="sidebar-item search-form">
        <?php echo form_open("page/produk_hukum_search", "class='form-inline'") ?>
        <input type="text" class="form-control" style="width:75%; height: 30px;" placeholder="Nama Produk Hukum" name="key">
        <button class="btn  btn-danger" type="submit"><i class="icofont-search"></i></button>
        <?php echo form_close(); ?>
    </div>
    <hr>
</div>

<!-- -------sidebar profil------ -->
<div style="display: <?php if ($this->uri->segment(1) == 'profil') echo 'block';
                        else echo 'none' ?>;">
    <h3 class="sidebar-title">Profil</h3>
    <div class="sidebar-item categories">
        <ul>
            <li><a href="<?php echo site_url('profil/sejarah') ?>">Sejarah</a></li>
            <li><a href="<?php echo site_url('profil/visi_misi') ?>">Visi Misi</a></li>
            <li><a href="<?php echo site_url('profil/sambutan') ?>">Kata Sambutan</a></li>
            <li><a href="<?php echo site_url('profil/tugas_pokok_fungsi') ?>">Tugas Pokok & Fungsi</a></li>
            <li><a href="<?php echo site_url('profil/maklumat_pelayanan') ?>">Maklumat Pelayanan</a></li>
            <li><a href="<?php echo site_url('profil/struktur_organisasi') ?>">Struktur Organisasi</a></li>
            <!-- <?php foreach ($content_sidebar as $f) { ?>
            <li><a href="#"><?php echo $f->content_title; ?></a></li>
            <?php } ?> -->
        </ul>
    </div>
    <hr>
</div>
<!-- End sidebar profile -->

<!-- -------sidebar Berita------ -->
<div style="display: <?php if ($this->uri->segment(2) == 'berita') echo 'block';
                        else echo 'none' ?>;">
    <h3 class="sidebar-title">Berita</h3>
    <div class="sidebar-item categories">
        <ul>
            <?php foreach ($news_category as $f) { ?>
                <li><a href="<?php echo site_url('page/berita/' . $f->news_category_id); ?>"><?php echo $f->news_category_name; ?></a></li>
            <?php } ?>
            <!-- <li><a href="#" class="text-secondary">Lihat album lainnya . . .</a></li> -->
        </ul>
    </div>
    <hr>
</div>


<!-- -------sidebar album------ -->
<div>
    <h3 class="sidebar-title">Album</h3>
</div>

<!-- -------sidebar Produk Hukum------ -->
<div>
    <h3 class="sidebar-title">Produk Hukum</h3>
    <div class="sidebar-item categories">
        <ul>
            <?php foreach ($regulation_category as $f) { ?>
                <li><a href="<?php echo site_url('page/produk_hukum/' . $f->regulation_category_id); ?>"> <?php echo $f->regulation_category_name; ?> </a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- End sidebar produk hukum -->