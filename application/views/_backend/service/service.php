            <div class="content-wrapper">
                <section class="content-header">
                    <h1 class="fontPoppins">
                        <?php echo strtoupper($title);?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                        <?php 
                            if($this->uri->segment(3)){
                                echo '<li class="active"><a href="'.site_url('admin/'.$this->uri->segment(2)).'">'.strtoupper($title).'</a></li>';
                                echo '<li class="active">'.strtoupper($this->uri->segment(3)).'</li>';
                            }else{
                                echo '<li class="active">'.strtoupper($title).'</li>';
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
                                            $rowpage = array(5,10,25,50,100);
                                            for($r=0; $r < count($rowpage); $r++){
                                                if($rowpage[$r] == $this->session->userdata('sess_rowpage')){
                                                    echo '<option value="'.$rowpage[$r].'" selected>'.$rowpage[$r].'</option>';
                                                }else{
                                                    echo '<option value="'.$rowpage[$r].'">'.$rowpage[$r].'</option>';
                                                }
                                            }
                                        ?>
                                        
                                    </select>
                                    <div class="input-group margin">
                                        <?php echo form_open("admin/service/search")?>
                                            <input type="text" class="form-control" name="key" placeholder="Masukkan kata kunci pencarian">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-danger btn-flat">cari</button>
                                            </span>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <div style="padding-top:10px">
                                    <a href="<?php echo site_url('admin/service')?>" class="btn btn-success btn-flat" title="Refresh halaman">refresh</a>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Tambah data" data-toggle="modal" data-target="#modalCreate"> tambah</button>
                                </div>

                                <!-- Modal-->
                                <div class="modal fade" id="modalCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <?php echo form_open_multipart("admin/service/create")?>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for=""><b style="color: black">Nama Layanan Izin <span style="color:red">*</span></b></label>
                                                    <?php echo csrf();?>
                                                    <input type="text" class="form-control" placeholder="Nama Layanan Izin" name="service_name" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <label for=""><b style="color: black">Kode Layanan Izin <span style="color:red">*</span></b></label>
                                                    <input type="text" class="form-control" placeholder="Kode Layanan Izin" name="service_code" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <label for=""><b style="color: black">Form Pendaftaran Izin <span style="color:red">*</span></b></label>
                                                    <input type="file" class="form-control" placeholder="Form Pendaftaran Izin" name="service_form_file" required="required" accept=".pdf, .xls, .xslx, .doc, .docx">
                                                </div>
                                                <div class="form-group">
                                                    <label for=""><b style="color: black">SOP Pendaftaran Izin </b></label>
                                                    <input type="file" class="form-control" placeholder="SOP Pendaftaran Izin" name="service_sop_file" accept=".pdf, .xls, .xslx, .doc, .docx, .jpg, .png">
                                                </div>
                                                <div class="form-group">
                                                    <label for=""><b style="color: black">Sektor Izin <span style="color:red">*</span></b></label>
                                                    <select class="form-control select2" name="sector_id" required style="width:100%">
                                                        <option value="">-Pilih Sektor-</option>
                                                        <?php
                                                            foreach($sector as $s){
                                                                echo '<option value="'.$s->sector_id.'">'.$s->sector_name.'</option>';
                                                            }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary font-weight-bold">Simpan</button>
                                                <?php echo form_close(); ?>
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php
                                if($this->session->flashdata('alert')){
                                    echo $this->session->flashdata('alert');
                                }

                                if($this->uri->segment(3)=="search"){
                                    echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>".$search."</span><hr style='border: 0.5px dashed #d2d6de'>";
                                }
                            ?>
                            <table class="table table-bordered">
                                <tr style="background-color: gray;color:white">
                                    <th style="width: 60px">No</th>
                                    <th style="width: 30%">#aksi</th>
                                    <th>Kode</th>
                                    <th>Nama Layanan Izin</th>
                                    <th>Sektor</th>
                                    <th>Form</th>
                                    <th>SOP</th>
                                </tr>
                                <?php 
                                    if($service){
                                        $nox = 1; $no=1; foreach($service as $key){
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $no+$numbers;?></td>
                                        <td>
                                            <button class="btn btn-xs btn-flat btn-info" data-toggle="modal" data-target="#modalDetail<?php echo $key->service_id;?>">detail</button>
                                            <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#modalUpdate<?php echo $key->service_id;?>">update</button>
                                            <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#modalDelete<?php echo $key->service_id?>">hapus</button> &nbsp; | &nbsp; 
                                            <a href="<?php echo site_url('admin/terms/index/'.$key->service_id);?>" class="btn btn-xs btn-flat btn-success" >syarat izin</a>
                                        </td>
                                        <td><?php echo $key->service_code;?></td>
                                        <td><?php echo $key->service_name;?></td>
                                        <td><?php echo $key->sector_name;?></td>
                                        <td><a href="<?php echo base_url()."upload/service/".$key->service_form_file;?>" target="_blank"><?php echo $key->service_form_file;?></a></td>
                                        <td><a href="<?php echo base_url()."upload/service/".$key->service_sop_file;?>" target="_blank"><?php echo $key->service_sop_file;?></a></td>
                                    </tr>

                                    <!-- Modal Update-->
                                    <div class="modal fade" id="modalUpdate<?php echo $key->service_id?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <?php echo form_open_multipart("admin/service/update")?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for=""><b style="color: black">Nama Layanan Izin <span style="color:red">*</span></b></label>
                                                        <?php echo csrf();?>
                                                        <input type="text" class="form-control" placeholder="Nama Layanan Izin" name="service_name" required="required" value="<?php echo $key->service_name;?>">
                                                        <input type="hidden" class="form-control" name="service_id" required="required" value="<?php echo $key->service_id;?>">
                                                        <input type="hidden" class="form-control" name="service_form_file_old" required="required" value="<?php echo $key->service_form_file;?>">
                                                        <input type="hidden" class="form-control" name="service_sop_file_old" required="required" value="<?php echo $key->service_sop_file;?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><b style="color: black">Kode Layanan Izin <span style="color:red">*</span></b></label>
                                                        <input type="text" class="form-control" placeholder="Kode Layanan Izin" name="service_code" required="required" value="<?php echo $key->service_code;?>">
                                                    </div>
                                                        <div class="form-group">
                                                        <label for=""><b style="color: black">Form Pendaftaran Izin </b></label>
                                                        <br><span style="color:red">file sebelumnya : </span> <?php echo $key->service_form_file;?>
                                                        <input type="file" class="form-control" placeholder="Form Pendaftaran Izin" name="service_form_file" accept=".pdf, .xls, .xslx, .doc, .docx">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><b style="color: black">SOP Pendaftaran Izin </b></label>
                                                        <br><span style="color:red">file sebelumnya : </span> <?php echo $key->service_sop_file;?>
                                                        <input type="file" class="form-control" placeholder="SOP Pendaftaran Izin" name="service_sop_file" accept=".pdf, .xls, .xslx, .doc, .docx, .jpg, .png">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><b style="color: black">Sektor Izin <span style="color:red">*</span></b></label>
                                                        <select class="form-control select2" name="sector_id" required style="width:100%">
                                                            <option value="">-Pilih Sektor-</option>
                                                            <?php
                                                                foreach($sector as $s){
                                                                    if($s->sector_id == $key->sector_id){
                                                                        echo '<option value="'.$s->sector_id.'" selected>'.$s->sector_name.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$s->sector_id.'">'.$s->sector_name.'</option>';
                                                                    }
                                                                }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning font-weight-bold">Update</button>
                                                    <?php echo form_close(); ?>
                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Delete-->
                                    <div class="modal fade" id="modalDelete<?php echo $key->service_id?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                <?php echo form_open("admin/service/delete")?>
                                                <div class="modal-body">
                                                    Apakah anda yakin akan menghapus data service : <?php echo $key->service_name;?> ?
                                                    <?php echo csrf();?>
                                                    <input type="hidden" class="form-control" placeholder="Nama Layanan Izin" name="service_name" required="required" value="<?php echo $key->service_name;?>">
                                                    <input type="hidden" class="form-control" name="service_id" required="required" value="<?php echo $key->service_id;?>">
                                                    <input type="hidden" class="form-control" name="service_form_file_old" required="required" value="<?php echo $key->service_form_file;?>">
                                                    <input type="hidden" class="form-control" name="service_sop_file_old" required="required" value="<?php echo $key->service_sop_file;?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>
                                                    <?php echo form_close(); ?>
                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Detail-->
                                    <div class="modal fade" id="modalDetail<?php echo $key->service_id?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <b>Nama Layanan Izin :</b><br><?php echo $key->service_name;?><hr>
                                                    <b>Kode Layanan Izin :</b><br><?php echo $key->service_code;?><hr>
                                                    <b>Sektor Izin :</b><br><?php echo $key->sector_name;?><hr>
                                                    <b>Form Pendaftaran Izin :</b><br><a href="<?php echo base_url()."upload/service/".$key->service_form_file;?>" target="_blank"><?php echo $key->service_form_file;?></a><hr>
                                                    <b>Form SOP Izin :</b><br><a href="<?php echo base_url()."upload/service/".$key->service_sop_file;?>" target="_blank"><?php echo $key->service_sop_file;?></a>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                       
                                <?php 
                                        $no++; }
                                    }else{
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
                            <div class="float-right"><?php echo $links;?></div>
                            
                            <!-- COUNT DATA -->
                            <?php if($service){?>
                            <div class="float-left">Tampil <?php echo ($nox+$numbers) ." - ". (count($service)+$numbers) ." dari ". $total_data;?> Data</div>
                            <?php }else{ ?>
                            <div class="float-left">Tampil 0 <?php echo " dari ". $total_data;?> Data</div>
                            <?php }?>
                            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                        </div>
                    </div>
                </section>
            </div>