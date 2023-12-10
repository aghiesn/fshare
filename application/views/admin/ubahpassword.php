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
		.navigasi {
			margin-top: -25px;
		}
		.kaki {
			margin-bottom: -40px;
		}
		.profilbox{
			margin: 50px 0px 120px 0px;
		}
		.peringatan {
			margin: 100px 0px 0px 0px;
		}
</style>
<div class="peringatan msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="profilbox container">
	<div class="row">

		<div class="col-md-3">
			<div class="box box-primary rounded-4" style="background-color: #ABC1C9;">
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive d-flex justify-content-center" src="<?= base_url('assets/uploads/images/foto_profil/'.$personal->photo); ?>" style="object-fit: cover; width:125px; height:125px;">
	
					<h3 class="profile-username text-center"><?= $personal->username; ?></h3>
	
					<p class="text-muted text-center">
						<?= $personal->nama;?>
					</p>
	
					<ul class="list-group rounded-4" style="background-color: #BFE3DF;">
						<li class="list-group-item" style="text-align: center; background-color: #BFE3DF;">
							<b>Username</b><br><a><?= $personal->username; ?></a>
						</li>
						<li class="list-group-item" style="text-align: center; background-color: #BFE3DF;">
							<b>Tanggal Daftar</b><br><a><?= tgl_lengkap($personal->created_at);?></a>
						</li>
						<li class="list-group-item" style="text-align: center; background-color: #BFE3DF;">
							<b>Terakhir Login</b><br><a><?= tgl_lengkap($personal->last_login);?></a>
						</li>
					</ul>
				</div>
				<div class="box-body">
					<form class="form-horizontal text-center" action="<?php echo base_url('admin/home/editprofile') ?>" method="POST" enctype="multipart/form-data">
						<button type="submit" name="iduser" id="iduser" value="<?= $personal->id; ?>" class="btn rounded-3" style="background-color: #BFE3DF;">Kembali Ke Ubah Profil Ini</button>
					</form>
				</div>
			</div>
		</div>
	
	
	
		<div class="col-md-9">
			<div class="card rounded-4" style="background-color: #8294C4;">
				<div class="card-body">
					<form class="form-horizontal" action="<?php echo base_url('admin/home/updatepassworduser') ?>" method="POST">
							<div class="form-group">
								<label for="current_password" class="col-sm-5 control-label">Password Lama</label>
								<div class="col-sm-13">
									<input type="password" class="form-control" placeholder="Password Lama" name="current_password">
								</div>
							</div>
							<div class="form-group mt-4">
								<label for="new_password" class="col-sm-5 control-label">Password Baru</label>
								<div class="col-sm-13">
									<input type="password" class="form-control" placeholder="Password Baru" name="new_password">
								</div>
							</div>
							<div class="form-group mt-4">
								<label for="confirm_password" class="col-sm-5 control-label">Konfirmasi Password</label>
								<div class="col-sm-13">
									<input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirm_password">
								</div>
							</div>
	
							<div class="form-group mt-4">
								<div class="col-sm-offset-2 col-sm-13">
									<input type="text" class="d-none" name="iduser" id="iduser" value='<?= $u_get; ?>'>
									<button type="submit" class="btn btn-primary btn-flat" style="box-sizing: border-box; border: none; height: 90px; width: 100%; background-color: #BFE3DF;"><i class="fa fa-check-circle"></i> Simpan</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>