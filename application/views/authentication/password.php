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
			margin: 10px 0px 10px 0px;
		}
</style>
<div class="containter">
	<div class="profilbox row">
		<div class="col-md-3">
			<!-- Profile Image -->
		<div class="peringatan msg" style="display:none;">
			<?= @$this->session->flashdata('msg'); ?>
		</div>
		<div class="box box-primary rounded-4" style="background-color: #537188;">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive d-flex justify-content-center" src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" style="width:125px; height:125px; object-fit: cover;">

				<h3 class="profile-username text-center"><?= $userdata->username; ?></h3>

				<p class="text-muted text-center">
					<?= $userdata->nama;?>
				</p>

				<ul class="list-group rounded-4" style="background-color: #8294C4;">
					<li class="list-group-item" style="text-align:center; background-color: #8294C4;">
						<b>Username</b><br><a><?= $userdata->username; ?></a>
					</li>
					<li class="list-group-item" style="text-align:center; background-color: #8294C4;">
						<b>Tanggal Daftar</b><br><a><?= tgl_lengkap($userdata->created_at);?></a>
					</li>
					<li class="list-group-item" style="text-align:center; background-color: #8294C4;">
						<b>Terakhir Login</b><br><a><?= tgl_lengkap($userdata->last_login);?></a>
					</li>
				</ul>
			</div>
			<div class="box-body">
				<div class="text-center">
                   	<a href="<?php echo base_url() ?>auth/profile/<?php echo $this->session->userdata('id_user'); ?>" class="btn rounded-3" role="button" style="background-color: #BFE3DF;">Ubah Data Profil</a>
                </div>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="card rounded-4" style="background-color: #8294C4;">
			<div class="card-body">
                <form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
						<div class="form-group">
							<label for="passLama" class="col-sm-5 control-label">Password Lama</label>
							<div class="col-sm-13">
								<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
							</div>
						</div>
						<div class="form-group mt-4">
							<label for="passBaru" class="col-sm-5 control-label">Password Baru</label>
							<div class="col-sm-13">
								<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
							</div>
						</div>
						<div class="form-group mt-4">
							<label for="passKonf" class="col-sm-5 control-label">Konfirmasi Password</label>
							<div class="col-sm-13">
								<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
							</div>
						</div>

						<div class="form-group mt-4">
							<div class="col-sm-offset-2 col-sm-13">
								<button type="submit" class="btn btn-primary btn-flat" style="box-sizing: border-box; border: none; height: 90px; width: 100%; background-color: #BFE3DF;"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
