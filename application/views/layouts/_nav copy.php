<div class="container">
        <div class="row d-none d-md-block" >
          <nav class="navbar navbar-expand-sm navbar-light col-lg-13" style="padding: 0px 0px;">
            <a class="navbar-brand col-lg-2 col-md-4 offset-md-0 offset-lg-2 mt-3" href="#">Forum MediaShare</a>
            <form class="d-flex">
              <input class="form-control rounded-pill col-lg-4 mt-4 " type="search" placeholder="Cari" aria-label="Cari" style="width: 400px; height: 40px;">
              <button class="search btn col-lg-1 mt-3 offset-lg-1 offset-md-1" type="submit" style="background-color: rgba(255, 255, 255, 0); border: none; width: auto; height: auto;">
                <source srcset="<?php echo base_url();?>assets/ico/search.png" type="image/svg+xml">
                <img src="<?php echo base_url();?>assets/ico/search.png" alt="gambar" class="img-fluid" style="width: 50px; height: auto;">
              </button>
            </form>
          </nav>
        </div>
      </div>
      <div class="container">
        <div class="row d-sm-block d-none d-md-none">
          <nav class="navbar navbar-expand-sm navbar-light" style="padding: 0px 0px;">
            <a class="navbar-brand col-sm-4 mt-3" href="#">Forum MediaShare</a>
            <form class="d-flex">
              <input class="form-control rounded-pill col-sm-5 mt-4 " type="search" placeholder="Cari" aria-label="Cari" style="width: auto; height: 40px;">
              <button class="btn col-sm-1 offset-sm-1 mt-3" type="submit" style="background-color: rgba(255, 255, 255, 0); border: none; width: auto; height: auto;">
                <source srcset="<?php echo base_url();?>assets/ico/search.png" type="image/svg+xml">
                <img src="<?php echo base_url();?>assets/ico/search.png" alt="gambar" class="img-fluid" style="width: 50px; height: auto;">
              </button>
            </form>
          </nav>
        </div>
      </div>
      <div class="container">
        <div class="row d-sm-none">
          <nav class="navbar navbar-expand-sm navbar-light" style="padding: 0px 0px;">
            <a class="navbar-brand col-1 mt-3 fs-6 offset-0" href="#">Forum MediaShare</a>
            <form class="d-flex" method="get" action="<?php echo base_url('auth/metode_pencarian'); ?>">
              <input class="form-control col-1 offset-0 rounded-pill" type="text" placeholder="Cari" name="keyword" aria-label="Cari" style="margin-top: 30px; width: 100px; height: 30px;">
              <button class="btn col-1 mt-4" type="submit" style="background-color: rgba(255, 255, 255, 0); border: none; width: auto; height: auto;">
                <source srcset="<?php echo base_url();?>assets/ico/search.png" type="image/svg+xml">
                <img src="<?php echo base_url();?>assets/ico/search.png" alt="gambar" class="img-fluid" style="width: 40px; height: auto;">
              </button>
            </form>
          </nav>
        </div>
      </div>