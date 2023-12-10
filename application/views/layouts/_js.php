<!-- JavaScript -->
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-2.4.3/js/adminlte.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/aos/js/aos.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/wavesurfer/wavesurfer.min.js"></script>
<script>
	window.onload = function() {
		<?php if ($this->session->flashdata('msg') != '') {
    echo "effect_msg();";
	}?>
	}

	function effect_msg_form() {
		$('.form-msg').slideDown(1000),
			setTimeout(function() {
				$('.form-msg').slideUp(1000);
			}, 3000)
	}

	function effect_msg() {
		$('.msg').show(1000),
			setTimeout(function() {
				$('.msg').fadeOut(1000);
			}, 3000)
	}

	var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var modal = document.getElementById("myModal");
		var btn = document.getElementById("menu-kat");
		var span = document.getElementsByClassName("close")[0];
		var filterForm = document.getElementById("filterForm");


		btn.onclick = function() {
			modal.classList.add("show-dialog");
		}

		span.onclick = function() {
			modal.classList.remove("show-dialog");
			modal.classList.add("hide-dialog");
		}

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.classList.add("hide-dialog");
			}
		}

		function remhide(){
			modal.classList.remove("hide-dialog");
		}

		setInterval(remhide, 2000);
	});
</script>
<script>
    AOS.init();
</script>
<script>
    function addCount(l_id) {
        $.ajax({
            type: 'POST',
            url: '<?=  base_url('auth/tambahcount'); ?>',
            data: { idlagu: l_id },
            success: function(response) {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    console.log('View count incremented successfully.');
                } else {
                    console.error('Failed to increment view count.');
                }
            },
            error: function() {
                console.error('AJAX request failed.');
            }
        });
    }
</script>
</script>
