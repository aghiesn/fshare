<!DOCTYPE html>
<html>

<head>
	<!-- Pada bagian title akan langsung diisi sesuai dengan $data=konfigurasi(‘title’), 
	kemudian akan memanggil file-file yang diperlukan dengan menambahkan < ?php 
	require_once(‘nama file’); ?>, atau menambahkan css dan js tambahan -->
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/uploads/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('_meta.php') ;?>
	<!-- css -->
	<?php require_once('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->

	<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
	<sytle>
		
	</style>
</head>

<body class="bg-image col-13" style="background-image: url('<?php echo base_url();?>assets/back/1980x1080.png'); height: 100vh; font-family: 'Times New Roman'; font-size: 20px;">
		<!-- header -->
		<header class="fixed-top">
			<div class="container">
				<?php require_once('_header.php') ;?>
			</div>
		</header>
		<div class="container">

			
			<section class="content mt-4 mt-lg-0">
				<?php echo $contents ;?>
			</section>
			
			<!-- footer -->
		</div>
		<footer class="footer fixed-bottom">
			<?php require_once('player-modal.php') ;?>
			<?php require_once('_footer.php') ;?>
		</footer>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

</html>
