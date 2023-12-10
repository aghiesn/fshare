<style>
  .insearch{
    text-align: left;
    box-sizing: border-box;
    background-color: rgba(255, 255, 255, 0.678);
    border-radius: 20px;
    margin: 1% 0% 0% 0%
    border: none;
    transition: width 0.3s; 
  }

  .submit{
    box-sizing: border-box;
    border: none; 
    border-radius: 10px;
    background-color: #BFE3DF;
  }
</style>
<!-- Pada header ini terdapat search bar, dengan tambahan JS oninput=expandSearchBar(), 
bila user mengetikan keyword akan otomatis diperluas, kemudian keywordnya akan diarahkan 
ke controller auth bagian hasil_pencarian -->
<div class="container">
  <nav class="navbar mt-3" style="padding: 0px 0px;" data-aos="fade-down" data-aos-offset="0">
      <a class="navbar-brand p-3 rounded-4" href="#" style="box-sizing: border-box; border: none; height: auto; width: auto; background-color: #BFE3DF;">F-Media Share</a>
      <div id="search-form expand">
        <form action="<?php echo site_url('auth/hasil_pencarianGuest'); ?>" method="post">
            <input type="text" id="keyword" class="keyword insearch" name="keyword" placeholder="Search for..." style="padding-left: 15px; width: 150px;" oninput="expandSearchBar()">
            <input type="submit" class="submit" value="S" style="padding: 10px; height: ; width: ;">
        </form>
      </div>
  </nav>
</div>

<script>
  function expandSearchBar() {
      var input = document.getElementById('keyword');
      var container = document.querySelector('.insearch');

    // Tentukan lebar awal
    var initialWidth = 150;

    // Tentukan nilai penambahan lebar untuk setiap 5 digit
    var incrementWidth = 5;

    // Hitung jumlah lebar berdasarkan panjang input
    var calculatedWidth = Math.max(initialWidth, Math.ceil(input.value.length / incrementWidth) * incrementWidth * 10);

    // Set lebar container
    container.style.width = calculatedWidth + 'px';
      }

</script>
