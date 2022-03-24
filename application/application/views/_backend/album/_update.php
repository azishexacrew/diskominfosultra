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
                        <?php echo form_open_multipart("admin/album/update") ?>
                        <div class="box-header with-border">
                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/album') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                                    <button type="submit" class="btn btn-warning btn-flat" title="Update data"> update</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php echo csrf(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b style="color: black">Judul Album <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Judul Album" name="album_name" required="required" value="<?php echo $album[0]->album_name; ?>">
                                        <input type="hidden" class="form-control" name="album_id" required="required" value="<?php echo $album[0]->album_id; ?>">
                                        <input type="hidden" class="form-control" name="album_cover_old" required="required" value="<?php echo $album[0]->album_cover; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Isi Album <span style="color:red">*</span></b></label>
                                        <textarea cols="80" id="editor" name="album_description" rows="10" style="resize:none;max-width:700px;"><?php echo $album[0]->album_description; ?></textarea>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </section>
            </div>