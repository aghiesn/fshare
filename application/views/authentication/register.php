<!-- File ini digunakan untuk tampilan bagian registrasi, dimana isinya terdapat form untuk pengisian username, email, dan password -->
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
		.register-box-body {
			background-color: #ABC1C9;
		}
</style>
<div class="register-box">
	<div class="register-logo">
		<a href="<?php echo base_url() ;?>"><b><?php echo $site['nama_website']; ?></b></a>
	</div>

	<div class="register-box-body rounded-5" >
		<p class="login-box-msg">Register a new membership</p>
		<?php echo form_open('auth/check_register','') ;?>
		<div class="form-group has-feedback">
			<input type="text" name="username" class="form-control" required placeholder="Username">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?php echo form_error('username','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback mt-2">
			<input type="email" name="email" class="form-control" required placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<?php echo form_error('email','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="form-group has-feedback mt-2">
			<input type="password" name="password" class="form-control" required placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?php echo form_error('password','<div class="text-danger"><small>','</small></div>') ;?>
		</div>
		<div class="row mt-2">
			<div class="col-12">
		      <button type="submit" class="btn rounded-4">Register</button>
		      <?php echo form_close() ;?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<a href="<?php echo base_url('auth/login') ;?>" class="btn rounded-4 text-center" >Kembali Ke Menu Login</a>
			</div>
		</div>
	</div>
</div>
