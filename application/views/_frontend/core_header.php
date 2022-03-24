<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?php echo $setting[0]->setting_appname; ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" rel="icon">
	<link href="<?php echo base_url(); ?>assets/core-images/<?php echo $setting[0]->setting_logo; ?>" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url() ?>assets/core-front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/core-front/vendor/aos/aos.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="<?php echo base_url() ?>assets/core-front/css/style.css" rel="stylesheet">

	<!-- <link href="<?php echo base_url() ?>assets/core-thirdparty/orgchart/orgchart.css" rel="stylesheet" type="text/css"/>
    	<script type="text/javascript" src="<?php echo base_url() ?>assets/core-thirdparty/orgchart/orgchart.js"></script> -->

	<style type="text/css">
		/*Now the CSS*/
		.tree ul {
			padding-top: 20px;
			position: relative;

			transition: all 0.5s;
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
		}

		.tree li {
			float: left;
			text-align: center;
			list-style-type: none;
			position: relative;
			padding: 20px 5px 0 5px;

			transition: all 0.5s;
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
		}

		/*We will use ::before and ::after to draw the connectors*/
		.tree li::before,
		.tree li::after {
			content: '';
			position: absolute;
			top: 0;
			right: 50%;
			border-top: 1px solid #ccc;
			width: 50%;
			height: 20px;
		}

		.tree li::after {
			right: auto;
			left: 50%;
			border-left: 1px solid #ccc;
		}

		/*We need to remove left-right connectors from elements without 
			any siblings*/
		.tree li:only-child::after,
		.tree li:only-child::before {
			display: none;
		}

		/*Remove space from the top of single children*/
		.tree li:only-child {
			padding-top: 0;
		}

		/*Remove left connector from first child and 
			right connector from last child*/
		.tree li:first-child::before,
		.tree li:last-child::after {
			border: 0 none;
		}

		/*Adding back the vertical connector to the last nodes*/
		.tree li:last-child::before {
			border-right: 1px solid #ccc;
			border-radius: 0 5px 0 0;
			-webkit-border-radius: 0 5px 0 0;
			-moz-border-radius: 0 5px 0 0;
		}

		.tree li:first-child::after {
			border-radius: 5px 0 0 0;
			-webkit-border-radius: 5px 0 0 0;
			-moz-border-radius: 5px 0 0 0;
		}

		/*Time to add downward connectors from parents*/
		.tree ul ul::before {
			content: '';
			position: absolute;
			top: 0;
			left: 50%;
			border-left: 1px solid #ccc;
			width: 0;
			height: 20px;
		}

		.tree li a {
			border: 1px solid #ccc;
			padding: 5px 10px;
			text-decoration: none;
			color: #666;
			font-family: arial, verdana, tahoma;
			font-size: 11px;
			display: inline-block;

			border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;

			transition: all 0.5s;
			-webkit-transition: all 0.5s;
			-moz-transition: all 0.5s;
		}

		/*Time for some hover effects*/
		/*We will apply the hover effect the the lineage of the element also*/
		.tree li a:hover,
		.tree li a:hover+ul li a {
			background: #c8e4f8;
			color: #000;
			border: 1px solid #94a0b4;
		}

		/*Connector styles on hover*/
		.tree li a:hover+ul li::after,
		.tree li a:hover+ul li::before,
		.tree li a:hover+ul::before,
		.tree li a:hover+ul ul::before {
			border-color: #94a0b4;
		}


		/* for kominfo */
		#hero {
			/* border: 5px solid black; */
			height: 85vh;
			margin-top: 100px;
			overflow: hidden;
			background-color: #fff;
		}

		#hero .carousel-item {
			background-size: 100%;
		}

		.img-link:hover {
			cursor: zoom-in;
		}

		.link {
			text-decoration: none !important;
			color: #054a85 !important;
			transition: 0.2s !important;
		}

		.link:hover {
			color: #f1a23a !important;
		}

		.link_hover {
			transition: 0.2s !important;
		}

		.link_hover:hover {
			color: #f1a23a !important;
		}

		.nav-webname a {
			color: white;
			text-decoration: none !important;
		}

		.breadcrumbs {
			margin-top: 90px;
		}

		#header {
			padding: 20px 0;
		}

        .container-header {
            margin-left: 0;
            margin-right: 0;
        }

        #container-bg {
            /* width: 25%; */
            padding: 1rem 3rem 0 1rem;
            height: 100px;
            background-color: rgba(255, 255, 255, 0.5);
            clip-path: polygon(0 0%, 100% 0, 80% 100%, 0% 100%);
        }

        #container-bg img {
            width: 60px;
            transition: 0.2s;
        }

		@media (max-width: 992px) {
			#hero {
				height: 60vh;
				margin-top: 70px;
			}

			#header {
				top: 0;
				padding: 10px 0;
				background: transparent;
			}

			#header .logo {
				font-size: 28px;
			}

			.nav-webname a {
				margin: 5px 0;
				color: #054a85;
				font-size: 0.8rem;
				line-height: 1;
			}

			.nav-webname {
				margin: 5px 0;
			}

			.mobile-nav-toggle i {
				color: #054a85;
			}

			.breadcrumbs {
				display: none;
				margin-top: 50px;
			}

			#header.header-scrolled {
				color: white;
			}

			#header.header-scrolled .nav-webname a {
				color: white;
			}

			.mobile-nav-toggle-scrolled i {
				padding: 10px 0;
				color: white;
			}
            #container-bg img {
                width: 40px;
            }

            #container-bg {
                padding: 1rem 1.5rem 0 0.5rem;
                height: 70px;
            }
		}

		@media (max-width: 720px) {
			#hero {
				height: 50vh;
				margin-top: 70px;
			}
		}

		@media (max-width: 600px) {
			#hero {
				height: 35vh;
				margin-top: 70px;
			}
			.blog{
				padding: 40px;
			}
		}

		@media (max-width: 450px) {
			#hero {
				height: 20vh;
			}

			#header {
				top: 0;
				padding: 10px 0;
				background: transparent;
			}

	        #container-bg img {
	            width: 30px;
	        }

			.nav-webname a {
				margin: 5px 0;
				color: #054a85;
				font-size: 0.8rem;
				line-height: 1;
			}

			.nav-webname {
				margin: 5px 0;
			}
		}
	</style>
</head>