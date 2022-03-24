<style>
    .img-hapus {
        width: 150px;
        height: 150px;
        background-size: cover;
        float: left;
        margin: 10px;
    }

    .img-tp:hover {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 00, 0, 0.5);
        transition: 0.2s;
    }

    .small-box {
        color: #000;
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.1);
    }

    .small-box:hover {
        color: #000;
    }

    .inner p {
        font-size: 12px !important;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            <?php echo strtoupper($title); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
            <?php
            if ($this->uri->segment(3)) {
                echo '<li class="active"><a href="' . site_url('admin/' . $this->uri->segment(2)) . '">' . strtoupper($title) . '</a></li>';
                echo '<li class="active">' . strtoupper($this->uri->segment(3)) . '</li>';
            } else {
                echo '<li class="active">' . strtoupper($title) . '</li>';
            }
            ?>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <div style="padding-top:10px">
                        <a href="<?php echo site_url('admin/album') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <?php
                if ($this->session->flashdata('alert')) {
                    echo $this->session->flashdata('alert');
                }
                ?>
                <?php echo csrf(); ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for=""><b style="color: black; font-size: 16px;">Judul Album <span style="color:red">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Judul album" name="album_name" required="required" value="<?php echo $album[0]->album_name; ?>" disabled>
                            <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $album[0]->album_id; ?>">
                            <input type="hidden" class="form-control" name="album_cover_old" required="required" value="<?php echo $album[0]->album_cover; ?>">
                        </div>


                        <hr style="border-top: 1px solid #e0e0e0">
                        <!-- Gallery Gambar -->
                        <?php echo form_open_multipart("admin/album/add_image") ?>
                        <div class="form-group form-inline">
                            <label for=""><b style="color: black; font-size: 16px;">
                                    Gallery Gambar (.jpg, .jpeg, .png)<span style="color:red">*</span>
                                </b></label><br>
                            <?php echo csrf(); ?>
                            <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $album[0]->album_id; ?>">
                            <input type="file" class="form-control" placeholder="Judul album" name="gallery_dir" accept=".png, .jpeg, .jpg" required="required" style="width:500px;">
                            <button type="submit" class="btn btn-warning font-weight-bold">+ Tambah</button>
                        </div>
                        <?php echo form_close(); ?>

                        <!-- list foto -->
                        <div class="form-group">
                            <?php if ($gallery != NULL) {
                                foreach ($gallery as $e) {
                                    if ($e->gallery_type == 'image') { ?>
                                        <div class="text-center img-hapus" style="background-image: url(<?php echo base_url(); ?>upload/album/<?php echo $e->gallery_dir; ?>);">
                                            <div class="img-tp">
                                                <a href="<?php echo site_url('admin/album/delete_image/') . $e->album_id . '/' . $e->gallery_id . '/' . $e->gallery_dir; ?>" type="submit" class="btn btn-xs btn-flat btn-danger" style="margin-top: 120px;">hapus</a>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                            <div class="row"></div>
                        </div>


                        <hr style="border-top: 1px solid #e0e0e0">
                        <!-- Gallery Video -->
                        <?php echo form_open_multipart("admin/album/add_video") ?>
                        <div class="form-group form-inline">
                            <label for=""><b style="color: black; font-size: 16px;">
                                    Gallery Video (.mp4) <span style="color:red">*</span>
                                </b></label><br>
                            <?php echo csrf(); ?>
                            <!-- <label for=""><b style="color: black">Judul Video <span style="color:red">*</span></b></label><br> -->
                            <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $album[0]->album_id; ?>">
                            <input type="text" class="form-control" placeholder="Judul Video" name="gallery_name" required="required" style="width:500px;"><br><br>
                            <input type="file" class="form-control" placeholder="Pilih Video" name="gallery_dir" accept=".mkv, .mp4" required="required" style="width:500px;">
                            <button type="submit" class="btn btn-warning font-weight-bold">+ Tambah</button>
                        </div>
                        <?php echo form_close(); ?>

                        <!-- list video -->
                        <div class="row" style="margin-left: 0px;">
                            <?php if ($gallery != NULL) {
                                foreach ($gallery as $e) {
                                    if ($e->gallery_type == 'video') {
                            ?>
                                        <div class="col-lg col-xs-6 px-3" style="width:360px;">
                                            <div class="small-box">
                                                <video width="100%" controls>
                                                    <source src="<?php echo base_url(); ?>upload/album/video/<?php echo $e->gallery_dir; ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="inner text-center">
                                                    <p class="text-left"><?php echo $e->gallery_name; ?></p>
                                                    <a href="<?php echo site_url('admin/album/delete_video/') . $e->album_id . '/' . $e->gallery_id . '/' . $e->gallery_dir; ?>" type="submit" class="btn btn-xs btn-flat bg-red">hapus</a>
                                                </div>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                            <div class="row"></div>
                        </div>


                        <hr style="border-top: 1px solid #e0e0e0">
                        <!-- Gallery Video -->
                        <?php echo form_open_multipart("admin/album/add_link") ?>
                        <div class="form-group form-inline">
                            <label for=""><b style="color: black; font-size: 16px;">
                                    Link Youtube <span style="color:red">*</span> <sup class="btn btn-default btn-info btn-xs p-0 mb-1" style="color:white" data-toggle="modal" data-target="#modalTutorial"><b>tutorial</b></sup>
                                </b></label><br>
                            <?php echo csrf(); ?>
                            <!-- <label for=""><b style="color: black">Judul Video <span style="color:red">*</span></b></label><br> -->
                            <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $album[0]->album_id; ?>">
                            <input type="text" class="form-control" placeholder="Judul Video" name="gallery_name" required="required" style="width:500px;"><br><br>
                            <textarea type="text" class="form-control" placeholder="Embed youtube link" name="gallery_dir" required="required" row="2" style="width:500px;"></textarea>
                            <button type="submit" class="btn btn-warning font-weight-bold">+ Tambah</button>
                        </div>
                        <?php echo form_close(); ?>
                        <!-- list video yutub -->
                        <div class="row" style="margin-left: 0px;">
                            <?php if ($gallery != NULL) {
                                foreach ($gallery as $e) {
                                    if ($e->gallery_type == 'link') {
                            ?>
                            
                                        <div class="col-lg col-xs-6 px-3" style="width:360px;">
                                            <div class="small-box">
                                                <iframe width="100%" height="200" src="<?php echo $e->gallery_dir; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <div class="inner text-center">
                                                    <p class="text-left"><?php echo $e->gallery_name; ?></p>
                                                    <a href="<?php echo site_url('admin/album/delete_link/') . $e->album_id . '/' . $e->gallery_id; ?>" type="submit" class="btn btn-xs btn-flat bg-red">hapus</a>
                                                </div>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                            <div class="row"></div>
                        </div>
                        <!-- Modal-->
                        <div class="modal fade" id="modalTutorial" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cara Tambah Link YouTube</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>1. Buka video <a href="https://www.youtube.com/" class="text-dark"><b>YouTube</b></a> yang ingin disematkan</div>
                                        <div>2. dibawah video klik bagikan</div>
                                        <a href="<?php echo base_url() . 'assets/core-images/tutor/bagikan.png' ?>" target="_blank" style="cursor: zoom-in; margin-left: 20%;"><img src="<?php echo base_url() . 'assets/core-images/tutor/bagikan.png' ?>" alt="" width="60%" style="border: 1px solid black;"></a><br><br>
                                        <div>3. Klik sematkan</div>
                                        <a href="<?php echo base_url() . 'assets/core-images/tutor/sematkan.png' ?>" target="_blank" style="cursor: zoom-in; margin-left: 20%;"><img src="<?php echo base_url() . 'assets/core-images/tutor/sematkan.png' ?>" alt="" width="60%" style="border: 1px solid black;"></a><br><br>
                                        <div>4. Dari kotak yang muncul, salin link pada "src"</div>
                                        <a href="<?php echo base_url() . 'assets/core-images/tutor/link.png' ?>" target="_blank" style="cursor: zoom-in; margin-left: 20%;"><img src="<?php echo base_url() . 'assets/core-images/tutor/link.png' ?>" alt="" width="60%" style="border: 1px solid black;"></a><br><br>
                                        <div>5. Masukkan kode tersebut pada halaman input link youtube di website ini kemudian klik tombol "Tambah"</div>
                                        <a href="<?php echo base_url() . 'assets/core-images/tutor/masukkan.png' ?>" target="_blank" style="cursor: zoom-in; margin-left: 20%;"><img src="<?php echo base_url() . 'assets/core-images/tutor/masukkan.png' ?>" alt="" width="60%" style="border: 1px solid black;"></a><br><br>
                                        <div>6. Selesai.</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Keluar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="box-footer">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </section>
</div>