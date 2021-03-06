<div class="content-wrapper">
    <section class="content-header">
        <h1 class="fontPoppins">
            <?php echo strtoupper($this->uri->segment(2)); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
        </ol>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <?php
                if ($this->session->flashdata('alert')) {
                    echo $this->session->flashdata('alert');
                }
                ?>

                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $widget[0]->total_Berita; ?></h3>
                                <p>Total Berita</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-rss-square"></i>
                            </div>
                            <a href="<?php echo site_url('admin/news'); ?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $widget[0]->total_album; ?></h3>
                                <p>Total Album</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-rss-square"></i>
                            </div>
                            <a href="<?php echo site_url('admin/event'); ?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $widget[0]->total_produk_hukum; ?></h3>
                                <p>Total Produk Hukum Dinas</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-rss-square"></i>
                            </div>
                            <a href="<?php echo site_url('admin/regulation'); ?>" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-12 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>Pengunjung</h3>
                                <center>
                                    <!-- Histats.com  (div with counter) -->
                                    <div id="histats_counter"></div>
                                    <!-- Histats.com  START  (aync)-->
                                    <script type="text/javascript">
                                        var _Hasync = _Hasync || [];
                                        _Hasync.push(['Histats.start', '1,4550151,4,408,270,55,00011111']);
                                        _Hasync.push(['Histats.fasi', '1']);
                                        _Hasync.push(['Histats.track_hits', '']);
                                        (function() {
                                            var hs = document.createElement('script');
                                            hs.type = 'text/javascript';
                                            hs.async = true;
                                            hs.src = ('//s10.histats.com/js15_as.js');
                                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                                        })();
                                    </script>
                                    <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4550151&101" alt="" border="0"></a></noscript>
                                    <!-- Histats.com  END  -->
                                </center>
                            </div>
                            <div class="icon">
                                <i class="fa fa-qr-code"></i>
                            </div>
                            <a href="https://www.histats.com/viewstats/?sid=4550151&ccid=408" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <hr>
                <b>Data Aduan Terbaru</b>
                <table class="table table-bordered">
                    <tr style="background-color: gray;color:white">
                        <th style="width: 60px">No</th>
                        <th style="width: 20%">#aksi</th>
                        <th>Nama Pengirim</th>
                        <th>Isi Pesan</th>
                        <th>Tanggal Pesan</th>
                    </tr>
                    <?php
                    if ($message) {
                        $nox = 1;
                        $no = 1;
                        foreach ($message as $key) {
                    ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#modalDetail<?php echo $key->message_id; ?>">detail</button>
                                    <button class="btn btn-xs btn-flat btn-success" data-toggle="modal" data-target="#modalRespon<?php echo $key->message_id; ?>">respon pesan</button>
                                </td>
                                <td>
                                    <?php
                                    echo $key->message_name . "<br>" . $key->message_email . "<br>" . $key->message_phone;
                                    if ($key->message_status == 0) {
                                        echo "<br><span class='label label-danger'>Belum Di Proses</span><br>";
                                    } else {
                                        echo "<br><span class='label label-success'>Sudah Di Proses</span><br>";
                                    }
                                    ?>

                                </td>
                                <td><?php echo $key->message_text; ?></td>
                                <td><?php echo indonesiaDate($key->message_date); ?></td>
                            </tr>



                            <!-- Modal Detail-->
                            <div class="modal fade" id="modalDetail<?php echo $key->message_id ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <b>Nama Pengirim :</b><br><?php echo $key->message_name; ?><br><br>
                                            <b>Email Pengirim :</b><br><?php echo $key->message_email; ?><br><br>
                                            <b>Subjek Pesan :</b><br><?php echo $key->message_subject; ?><br><br>
                                            <b>Isi Pesan :</b><br><?php echo $key->message_text; ?><br><br>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modalRespon<?php echo $key->message_id ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Respon Pesan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open("admin/message/update") ?>
                                        <div class="modal-body">
                                            <?php echo csrf(); ?>
                                            <?php echo $key->message_text; ?>
                                            <hr>


                                            <div class="form-group">
                                                <label for=""><b style="color: black">Respon <span style="color:red">*</span></b></label>
                                                <textarea class="form-control" name="message_reply" placeholder="Respon" rows="3" required></textarea>
                                                <input type="hidden" class="form-control" name="message_id" required="required" value="<?php echo $key->message_id; ?>">
                                                <input type="hidden" class="form-control" name="message_code" required="required" value="<?php echo $key->message_code; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning font-weight-bold">Respon</button>
                                            <?php echo form_close(); ?>
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
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


                </table><br>
                <a href="<?php echo site_url('admin/message') ?>" class="btn btn-success">Cek Aduan Lainnya</a>
            </div>
            <div class="box-footer">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </section>
</div>