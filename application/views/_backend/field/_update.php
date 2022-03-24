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
                        <?php echo form_open_multipart("admin/field/update") ?>
                        <div class="box-header with-border">

                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/field') ?>" class="btn btn-warning btn-flat" title="kembali ke halaman sebelumnya">kembali</a>
                                    <button type="submit" class="btn btn-warning btn-flat" title="Update data"> update</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php echo csrf(); ?>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Nama Bidang <span style="color:red">*</span></b></label>
                                        <input type="text" class="form-control" placeholder="Nama Bidang" name="field_name" required="required" value="<?php echo $field[0]->field_name; ?>">
                                        <input type="hidden" class="form-control" name="field_id" required="required" value="<?php echo $field[0]->field_id; ?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Keterangan Bidang <span style="color:red">*</span></b></label>
                                        <textarea cols="80" id="editor" name="field_description" rows="10" style="resize:none;max-width:700px;" required="required"><?php echo $field[0]->field_description; ?></textarea>
                                    </div><br>

                                    <div class="form-group">
                                        <label for=""><b style="color: black">Tugas & Fungsi Pokok Bidang <span style="color:red">*</span></b></label>
                                        <textarea cols="80" id="editor__2" name="field_tupoksi" rows="10" style="resize:none;max-width:700px;" required="required"><?php echo $field[0]->field_tupoksi; ?></textarea>
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