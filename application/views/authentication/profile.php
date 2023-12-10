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
<div class="profilbox row ">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="peringatan msg" style="display:none;">
			<?= @$this->session->flashdata('msg'); ?>
		</div>
		<div class="box box-primary rounded-4" style="background-color: #ABC1C9;">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive d-flex justify-content-center" src="<?= base_url('assets/uploads/images/foto_profil/'.$userdata->photo); ?>" style="object-fit: cover; width:125px; height:125px;">

				<h3 class="profile-username text-center"><?= $userdata->username; ?></h3>

				<p class="text-muted text-center">
					<?= $userdata->nama;?>
				</p>

				<ul class="list-group rounded-4" style="background-color: #BFE3DF;">
					<li class="list-group-item" style="text-align: center; background-color: #BFE3DF;">
						<b>Username</b><br><a><?= $userdata->username; ?></a>
					</li>
					<li class="list-group-item" style="text-align: center; background-color: #BFE3DF;">
						<b>Tanggal Daftar</b><br><a><?= tgl_lengkap($userdata->created_at);?></a>
					</li>
					<li class="list-group-item" style="text-align: center; background-color: #BFE3DF;">
						<b>Terakhir Login</b><br><a><?= tgl_lengkap($userdata->last_login);?></a>
					</li>
				</ul>
			</div>
			<div class="box-body">
				<div class="text-center">
                   	<a href="<?php echo base_url() ?>auth/passwordchange/<?php echo $this->session->userdata('id_user'); ?>" class="btn rounded-3" role="button" style="background-color: #BFE3DF;">Ubah Password</a>
                </div>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="card rounded-4" style="background-color: #ABC1C9;">
			<div class="card-body">
				<div class="row">
					<div class="col-13">
						<form class="form-horizontal" action="<?php echo base_url('auth/updateProfile') ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-5 control-label">Username</label>
								<div class="col-sm-13">
									<input type="text" class="form-control" placeholder="Username" name="username" value="<?= $userdata->username; ?>">
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="col-sm-5 control-label">Nama</label>
								<div class="col-sm-13">
									<input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $userdata->nama; ?>">
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="col-sm-5 control-label">Email</label>
								<div class="col-sm-13">
									<input type="email" class="form-control" placeholder="Email" name="email" value="<?= $userdata->email; ?>">
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="col-sm-5 control-label">Negara</label>
								<div class="col-sm-13">
									<input type="text" class="form-control" placeholder="Negara" name="negara" value="<?= $userdata->negara; ?>">
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="col-sm-5 control-label">Kota</label>
								<div class="col-sm-13">
									<input type="text" class="form-control" placeholder="Kota" name="kota" value="<?= $userdata->kota; ?>">
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="col-sm-5 control-label">Tanggal Lahir</label>
								<div class="col-sm-13">
									<input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= $userdata->tanggal_lahir; ?>">
								</div>
							</div>
							<div class="form-group mt-3">
								<label class="col-sm-5 control-label">Foto Profil</label>
								<div class="col-sm-13">
									<input class="form-control mb-3 col-12" type="file" onchange="loadFile(event)" name="photo" id="photo">
									<img id="output" class="img-fluid" style="box-sizing: border-box; background-color: rgba(255, 255, 255, 0.678); border-radius: 20px; object-fit: cover;"/>
								</div>
							</div>

							<div class="form-group mt-3">
								<div class="col-12">
									<button type="submit" class="btn" style="box-sizing: border-box; border: none; height: 90px; width: 100%; background-color: #BFE3DF;"><i class="fa fa-check-circle"></i> Simpan</button>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
