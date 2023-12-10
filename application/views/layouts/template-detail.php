<!DOCTYPE html>
<html>

<head>
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
	<style>
		.back{
			width: 100%;
			height: 100vh;
			background-image: linear-gradient(rgba(0, 0, 0, 0.355), rgba(0, 0, 0, 0.355));
			position: fixed;
			padding: 0 5%;
			display: flex;
			align-items: center;
			justify-content: center;
			z-index: -1;
			
		}

		.background-vid{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -3;
			margin: 0px 0px 0px 0px;
			object-fit: cover;
		}

		.backthumb{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -2;
			margin: 0px 0px 0px 0px;
			object-fit: cover;
			
			
		}
	</style>
</head>

<body class="col-13 badan" style="font-family: 'Times New Roman'; font-size: 20px;">
		<!-- header -->

		<video autoplay loop muted class="background-vid w-100" id="background-vid"> 
			<source src="<?= base_url('assets/uploads/audio/footage/' . $l_getlagu->footage); ?>"> 
		</video>

		<img src="<?= base_url('assets/uploads/images/thumbnail/'.$l_thumb); ?>" alt="" class="backthumb" id="backthumb"> 

		<div class="back"></div>
			<header class="fixed-top">
				<div class="container">
					<?php require_once('_header.php') ;?>
				</div>
			</header>
	
			<section class="content">
				<?php echo $contents ;?>
			</section>
				
	
			<footer class="footer fixed-bottom">
				<?php require_once('player-modal.php') ;?>
				<?php require_once('_footer.php') ;?>
			</footer>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

<script>
  var video = document.getElementById('background-vid');
  var image = document.getElementById('backthumb');

  video.addEventListener('canplay', function() {
    // Video dapat diputar, tampilkan video
    image.style.display = 'none';
    video.style.display = 'block';
  });

  video.addEventListener('error', function() {
    // Video tidak dapat diputar, gantikan dengan gambar
    video.style.display = 'none';
    image.style.display = 'block';
  });
</script>

</html>
