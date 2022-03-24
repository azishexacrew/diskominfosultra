
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Sosial Media Diskominfo</h4>
                            <div class="social-links mt-3 pl-3">
                                <p><a href="https://facebook.com/<?php echo $setting[0]->setting_facebook; ?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>Facebook</p>
                                <p><a href="https://instagram.com/<?php echo $setting[0]->setting_instagram; ?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>Instagram</p>
                                <p><a href="https://twitter.com/<?php echo $setting[0]->setting_twitter; ?>" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>Twitter</p>
                                <p><a href="https://youtube.com/c/<?php echo $setting[0]->setting_youtube; ?>" target="_blank" class="youtube"><i class="bx bxl-youtube"></i></a>Youtube</p>
                                
                                <!-- <span><a href="https://twitter.com/<?php echo $setting[0]->setting_twitter; ?>" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>Facebook</span><br> -->

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-links">
                            <h4>Kontak</h4>
                            <p class="pl-3">
                                <strong>Telepon:</strong> <?php echo $setting[0]->setting_phone; ?><br><br>
                                <strong>Email:</strong> <?php echo $setting[0]->setting_email; ?><br><br>
                                <strong>Fax:</strong> <?php echo $setting[0]->setting_fax; ?><br><br>
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-contact">
                            <h4>Alamat</h4>
                            <p class="pl-3">
                                <strong>Alamat: </strong><?php echo $setting[0]->setting_address; ?> <br><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span><?php echo $setting[0]->setting_owner_name; ?></span></strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="<?php echo base_url() ?>assets/core-front/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/core-thirdparty/orgchart/orgchart.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/php-email-form/validate.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/venobox/venobox.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url() ?>assets/core-front/vendor/aos/aos.js"></script>
        <!-- Template Main JS File -->
        <script src="<?php echo base_url() ?>assets/core-front/js/main.js"></script>
        <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $('.carousel').carousel({
                    interval: 5000
                })
            });
        </script>
        </body>

        </html>