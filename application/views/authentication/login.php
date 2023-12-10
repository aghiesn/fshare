<style>
        .row{
            padding: 2%;
            row-gap: 0;
            --bs-gap: 0rem 1rem;
        }
        .form-group [type="text"], .form-group [type="date"], .form-group [type="password"], .form-group [type="file"], .form-group [type="email"] {
            text-align: left;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.678);
            border-radius: 20px;
            margin: 1% 0% 0% 0%
			
        }
		.btn {
			box-sizing: border-box; border: none; height: 40px; width: 100%; background-color: #BFE3DF;
		}
		.login-box-body{
			background-color: #ABC1C9;
		}
</style>
<!-- bagian ini digunakan untuk menu login, yang berisikan form untuk memasukkan email, password, tombol login, dan tombol registrasi -->

<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website']?></b></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body rounded-5">
		<p class="login-box-msg text-bold"> Masuk Dengan Email & Password Anda</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" required minlength="5" placeholder="Email" />
				<span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback mt-2">
				<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="checkbox icheck col-xs-12 col-sm-6 col-md-6">
					<label>
                        <?php echo form_checkbox('remember_code', '1', false, 'id="remember_code"');?>
                        Ingat Saya
                    </label>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" name="submit" value="login" class="btn rounded-4"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<a href="<?php echo base_url('auth/register');?>" class="btn rounded-4"> Daftar Akun</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<a href="<?php echo base_url();?>" class="btn rounded-4">Kembali</a>
				</div>
			</div>
		</form>
	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true)?>
	</div>
	
</div>

<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>
