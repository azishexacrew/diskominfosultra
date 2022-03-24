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
                <div class="box-tools pull-left">
                    <div class="form-inline">
                        <select class="form-control" id="rowpage">
                            <?php
                            $rowpage = array(5, 10, 25, 50, 100);
                            for ($r = 0; $r < count($rowpage); $r++) {
                                if ($rowpage[$r] == $this->session->userdata('sess_rowpage')) {
                                    echo '<option value="' . $rowpage[$r] . '" selected>' . $rowpage[$r] . '</option>';
                                } else {
                                    echo '<option value="' . $rowpage[$r] . '">' . $rowpage[$r] . '</option>';
                                }
                            }
                            ?>

                        </select>
                        <div class="input-group margin">
                            <?php echo form_open("admin/album/search") ?>
                            <input type="text" class="form-control" name="key" placeholder="Masukkan kata kunci pencarian">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-danger btn-flat">cari</button>
                            </span>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="box-tools pull-right">
                    <div style="padding-top:10px">

                        <a href="<?php echo site_url('admin/album') ?>" class="btn btn-success btn-flat" title="Refresh halaman">refresh</a>
                        <a href="<?php echo site_url('admin/album/create_page') ?>" class="btn btn-primary btn-flat" title="Tambah data"> tambah</a>
                    </div>

                </div>
            </div>
            <div class="box-body">
                <?php
                if ($this->session->flashdata('alert')) {
                    echo $this->session->flashdata('alert');
                }

                if ($this->uri->segment(3) == "search") {
                    echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>" . $search . "</span><hr style='border: 0.5px dashed #d2d6de'>";
                }
                ?>
                <table class="table table-bordered">
                    <tr style="background-color: gray;color:white">
                        <th style="width: 60px">No</th>
                        <th style="width: 20%">#aksi</th>
                        <th>Tanggal</th>
                        <th>Title</th>
                        <th>Penulis</th>
                    </tr>
                    <?php
                    if ($album) {
                        $nox = 1;
                        $no = 1;
                        foreach ($album as $key) {

                    ?>
                            <tr>
                                <td><?php echo $no + $numbers; ?></td>
                                <td class="row">
                                    <a href="<?php echo site_url('admin/album/detail_page/' . $key->album_id); ?>" class="btn btn-xs btn-flat btn-info">detail</a>
                                    <a href="<?php echo site_url('admin/album/update_page/' . $key->album_id) ?>" class="btn btn-xs btn-flat btn-warning">update</a>
                                    <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#modalDelete<?php echo $key->album_id; ?>">hapus</button>
                                    <a href="<?php echo site_url('admin/album/add_image_page/' . $key->album_id) ?>" class="btn btn-xs btn-flat btn-success" style="margin-top: 4px;">Kelola Album</a>
                                </td>
                                <td><?php echo indonesiaDate($key->album_date); ?></td>
                                <td><?php echo $key->album_name; ?></td>
                                <td><?php echo $key->user_fullname; ?></td>
                            </tr>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="modalDelete<?php echo $key->album_id; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open("admin/album/delete") ?>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menghapus data album ini ?
                                            <?php echo csrf(); ?>
                                            <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $key->album_id; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>
                                            <?php echo form_close(); ?>
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Modal Delete-->

                            <!-- modal add image -->
                            <div class="modal fade" id="modalAddImage<?php echo $key->album_id; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Gambar <?php echo $key->album_name; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open_multipart("admin/album/add_image") ?>
                                        <div class="modal-body">
                                            Tambah Gambar album ini ?
                                            <?php echo csrf(); ?>
                                            <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $key->album_id; ?>">
                                            <div class="form-group">
                                                <label for=""><b style="color: black">Gambar album<span style="color:red">*</span></b></label>
                                                <input type="file" class="form-control" placeholder="Gambar album" name="gallery" required="required" accept=".png, .jpeg, .jpg">
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-warning font-weight-bold ml-5">Tambah</button>
                                                <?php echo form_close(); ?>
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <?php if ($gallery != NULL) {
                                                foreach ($gallery as $e) {
                                                    if ($e->album_id == $key->album_id) { ?>
                                                        <div class="text-center img-hapus" style="background-image: url(<?php echo base_url(); ?>upload/album/<?php echo $e->gallery; ?>);">
                                                            <div class="img-tp">
                                                                <a href="<?php echo site_url('admin/album/delete_image/') . $e->gallery_id; ?>" type="submit" class="btn btn-xs btn-flat btn-danger" style="margin-top: 120px;">hapus</a>
                                                            </div>
                                                        </div>
                                            <?php }
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    <?php
                            $no++;
                        }
                    } else {
                        echo '
                                        <tr>
                                            <td colspan="3">Tidak ada ditemukan</td>
                                        </tr>
                                        ';
                    }
                    ?>


                </table>
            </div>
            <div class="box-footer">

                <!-- PAGINATION -->
                <div class="float-right"><?php echo $links; ?></div>

                <!-- COUNT DATA -->
                <?php if ($album) { ?>
                    <div class="float-left">Tampil <?php echo ($nox + $numbers) . " - " . (count($album) + $numbers) . " dari " . $total_data; ?> Data</div>
                <?php } else { ?>
                    <div class="float-left">Tampil 0 <?php echo " dari " . $total_data; ?> Data</div>
                <?php } ?>
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </section>
</div>