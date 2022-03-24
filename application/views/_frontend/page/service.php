

     <!-- ======= Breadcrumbs ======= -->
     <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?php echo site_url('home')?>">Home</a></li>
                <li><a href="#">Layanan Izin</a></li>
            </ol>
            <h2>Layanan Izin</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <main id="main">
       
        <section id="services" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="sidebar-item search-form">
                    <?php echo form_open("page/layanan_search", "class='form-inline'")?>
                        <input type="text" class="form-control" style="width:50%" placeholder="Cari Jenis Izin" name="key">
                        <button class ="btn  btn-danger" type="submit">Cari Jenis Izin</button>
                    <?php echo form_close();?>
                </div><!-- End sidebar search formn-->
                <br>
                <?php 
                    if($this->uri->segment(2)=="layanan_search"){
                        echo "Kata Kunci Pencarian : <span class='label label-danger label-inline font-weight-lighter mr-2'>".$search."</span><hr style='border: 0.5px dashed #d2d6de'>";
                    }
                ?> 
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Izin</th>
                            <th>Sektor</th>
                            <th>Formulir</th>
                            <th>Syarat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; 
                            if($service){
                            foreach($service as $s){ ?>
                        <tr>
                            <td><?php echo $no+$numbers;?></td>
                            <td><?php echo $s->service_name;?></td>
                            <td><?php echo $s->sector_name;?></td>
                            <td><a class="btn btn-sm btn-success" href="<?php echo base_url()?>upload/service/<?php echo $s->service_form_file;?>" target="_blank">Download</a></td>
                            <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('page/layanan_detail/'.$s->service_id)?>" target="_blank">Cek Syarat Izin</a></td>
                        </tr>
                        <?php $no++;}} ?>
                    </tbody>
                </table>
                
                <hr>
                <div class="blog-pagination"><?php echo $links;?></div>
            </div>
        </section>
    </main><!-- End #main -->