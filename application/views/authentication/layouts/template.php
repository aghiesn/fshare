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
		.emo1, .emo2 {
            position: absolute;
            top: 0;
            left: 0;
            background-size: cover;
            z-index: -1;
            padding-top: 20%;
            padding-left: 2%;
        }

        .emo1 img {
            width: 300px;
            height: auto;
            transform: rotate(-25deg);
        }

		.emo2 img {
			width: 300px;
            height: auto;
            transform: rotate(50deg);
		}
	</style>
</head>

<body class="hold-transition register-page bg-image" style="background-image: url('<?php echo base_url();?>assets/back/1980x1080.png');">
	<div class="container" data-aos="fade-down" data-aos-once="true" data-aos-offset="0" >
		<?php echo $contents ;?>
	</div>
	<!-- js -->
	<?php require_once('_js.php') ;?>
	<div class="col-12">
		<div class="row">
			<div class="emo1 card-img offset-1" data-aos="zoom-in" data-aos-once="true" data-aos-offset="0"><img src="<?php echo base_url();?>assets/emoji/2.png"></div>
			<div class="emo2 card-img offset-8" data-aos="zoom-in" data-aos-once="true" data-aos-offset="0"><img src="<?php echo base_url();?>assets/emoji/2.png"></div>
		</div>
	</div>
</body>

</html>
