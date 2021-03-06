            <div class="content-wrapper">
                <section class="content-header">
                    <h1 class="fontPoppins">
                        <?php echo strtoupper($title); ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                        <li class="active"><?php echo strtoupper($title); ?></li>
                    </ol>
                </section>

                <section class="content">
                    <div class="box">
                        <?php echo form_open_multipart("admin/setting/update") ?>
                        <?php echo csrf(); ?>
                        <div class="box-header with-border">

                            <div class="box-tools pull-right">
                                <a href="<?php echo site_url('admin/setting') ?>" class="btn btn-success btn-flat" title="Refresh halaman">Refresh</a>
                                <button type="submit" class="btn btn-warning btn-flat" title="Update data setting">Update Data Setting</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php
                            if ($this->session->flashdata('alert')) {
                                echo $this->session->flashdata('alert') . "<br>";
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-7">
                                    <!-- Pengaturan Aplikasi -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-red fontPoppins">#Nama Aplikasi</h2>
                                            <hr style="border: 0.5px dashed #d2d6de">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nama Aplikasi <small class="text-red">*</small></label>
                                                <input type="hidden" class="form-control" name="setting_id" value="<?php echo $setting[0]->setting_id; ?>" required>
                                                <input type="hidden" class="form-control" name="setting_logo" value="<?php echo $setting[0]->setting_logo; ?>" required>
                                                <input type="text" class="form-control" placeholder="Nama Aplikasi" name="setting_appname" value="<?php echo $setting[0]->setting_appname; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Singkatan Aplikasi (Max 4 Huruf) <small class="text-red">*</small></label>
                                                <input type="text" class="form-control" maxlength="4" placeholder="Singkatan Aplikasi" name="setting_short_appname" value="<?php echo $setting[0]->setting_short_appname; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input type="file" class="form-control" name="userfile">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Preview Logo</label><br>
                                                <img src="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" height="57">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-red fontPoppins">#Pemiliki Aplikasi</h2>
                                            <hr style="border: 0.5px dashed #d2d6de">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Pemilik/Kantor/Instansi <small class="text-red">*</small></label>
                                                <input type="text" class="form-control" placeholder="Pemiliki/Kantor/Instansi" name="setting_owner_name" value="<?php echo $setting[0]->setting_owner_name; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Tentang Kami</label>
                                                <textarea class="form-control" name="setting_about" placeholder="Tentang Kami" rows="5"><?php echo $setting[0]->setting_about; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Telepon </label>
                                                <input type="text" class="form-control" placeholder="Telepon" name="setting_phone" value="<?php echo $setting[0]->setting_phone; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Email </label>
                                                <input type="text" class="form-control" placeholder="Email" name="setting_email" value="<?php echo $setting[0]->setting_email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Fax </label>
                                                <input type="text" class="form-control" placeholder="Fax" name="setting_fax" value="<?php echo $setting[0]->setting_fax; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Instagram</label>
                                                <input type="text" class="form-control" placeholder="Instagram" name="setting_instagram" value="<?php echo $setting[0]->setting_instagram; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Facebook</label>
                                                <input type="text" class="form-control" placeholder="Facebook" name="setting_facebook" value="<?php echo $setting[0]->setting_facebook; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Twitter</label>
                                                <input type="text" class="form-control" placeholder="Twitter" name="setting_twitter" value="<?php echo $setting[0]->setting_twitter; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label> Youtube</label>
                                                <input type="text" class="form-control" placeholder="Youtube" name="setting_youtube" value="<?php echo $setting[0]->setting_youtube; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Kota/Kabupaten <small class="text-red">*</small></label>
                                                <input type="text" class="form-control" placeholder="Asal/Kota/kabupaten" name="setting_origin_app" value="<?php echo $setting[0]->setting_origin_app; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Alamat <small class="text-red">*</small></label>
                                                <textarea class="form-control" name="setting_address" placeholder="Alamat" rows="5"><?php echo $setting[0]->setting_address; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Koordinat Kantor</label>
                                                <input type="text" class="form-control" placeholder="Koordinat Kantor" name="setting_coordinate" value="<?php echo $setting[0]->setting_coordinate; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-red fontPoppins">#Api Key</h2>
                                            <hr style="border: 0.5px dashed #d2d6de">
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Google Maps</label>
                                                <textarea class="form-control" name="setting_apikey_map" placeholder="Api Key Google Maps" rows="5"><?php echo $setting[0]->setting_apikey_map; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Firebase</label>
                                                <textarea class="form-control" name="setting_apikey_firebase" placeholder="Api Key Firebase" rows="5"><?php echo $setting[0]->setting_apikey_firebase; ?></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-red fontPoppins">#Preference</h2>
                                            <hr style="border: 0.5px dashed #d2d6de">
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Layout</label>
                                                <select class="form-control" name="setting_layout">
                                                    <?php
                                                    $layout = array('default', 'sidebar-collapse', 'layout-boxed');
                                                    for ($l = 0; $l < count($layout); $l++) {
                                                        if ($layout[$l] == $setting[0]->setting_layout) {
                                                            echo '<option value="' . $layout[$l] . '" selected>' . $layout[$l] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $layout[$l] . '">' . $layout[$l] . '</option>';
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Warna</label>
                                                <select class="form-control" name="setting_color">
                                                    <?php
                                                    $color = array('skin-black', 'skin-black-light', 'skin-red', 'skin-red-light', 'skin-green', 'skin-green-light', 'skin-blue', 'skin-blue-light', 'skin-yellow', 'skin-yellow-light', 'skin-purple', 'skin-purple-light');
                                                    for ($c = 0; $c < count($color); $c++) {
                                                        if ($color[$c] == $setting[0]->setting_color) {
                                                            echo '<option value="' . $color[$c] . '" selected>' . $color[$c] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $color[$c] . '">' . $color[$c] . '</option>';
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Runing Text</label>
                                                <textarea class="form-control" name="setting_runing_text" placeholder="Runing Text" rows="5"><?php echo $setting[0]->setting_runing_text; ?></textarea>
                                            </div>
                                        </div>


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