<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="<?php echo site_url('home') ?>">Home</a></li>
            <li><a href="#">Hubungi Kami</a></li>
        </ol>
        <h2>Hubungi Kami</h2>

    </div>
</section><!-- End Breadcrumbs -->
<main id="main">
    <div class="container pt-5">

        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
        } ?>

    </div>
    <section class="ftco-section px-5">
        <div class="section-title col-lg-12 pt-5">
            <h2>Hubungi Kami</h2>
        </div>
        <style>
            #map-canvas {
                width: 100%;
                height: 500px;
                border: solid;
            }
        </style>
        <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8aB4MpC1orBp300KQQAiVEnWdpry4OPg"></script>
        <script>
            var markers = [
                ['<?php echo "<b>Nama Instansi :</b> <br>" . $setting[0]->setting_owner_name . "<br> <br><b>Alamat :</b> <br>" . trim(preg_replace('/\s\s+/', ' ', $setting[0]->setting_address)) . "<br><br> <b>No. Telepon :</b> <br>" . $setting[0]->setting_phone . " <br><br> <b>Email :</b><br> " . $setting[0]->setting_email ?>', <?php echo $setting[0]->setting_coordinate; ?>],
            ];

            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)

                var infowindow = new google.maps.InfoWindow(),
                    marker, i;
                var bounds = new google.maps.LatLngBounds(); // diluar looping
                for (i = 0; i < markers.length; i++) {
                    pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(pos); // di dalam looping
                    marker = new google.maps.Marker({
                        position: pos,
                        map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(markers[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                    map.fitBounds(bounds); // setelah looping
                }

            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <div id="map-canvas"></div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">


                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">


                    <?php echo form_open_multipart("page/create_contact_us") ?>
                    <div class="form-group">
                        <?php echo csrf(); ?>
                        <input type="text" name="message_name" class="form-control" id="name" placeholder="Nama Anda*" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="required" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="message_phone" id="phone" placeholder="No. Telepon Anda" data-rule="minlen:8" data-msg="Please enter at least 8 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="message_email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="message_subject" id="subject" placeholder="Subjek Pesan*" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required="required" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message_text" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pesan Anda*" required="required"></textarea>
                        <div class="validate"></div>
                    </div>

                    <div class="text-center"><button class="btn btn-danger" type="submit">Kirim Pesan</button></div>
                    <?php echo form_close(); ?>

                </div>
                <div class="col-lg-5 pl-5">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Lokasi Kantor:</h4>
                            <p><?php echo $setting[0]->setting_address; ?></p>
                        </div>


                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p><?php echo $setting[0]->setting_email; ?></p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Telepon:</h4>
                            <p><?php echo $setting[0]->setting_phone; ?></p>
                        </div>

                        <div class="fax">
                            <i class="icofont-fax"></i>
                            <h4>Fax:</h4>
                            <p><?php echo $setting[0]->setting_phone; ?></p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->