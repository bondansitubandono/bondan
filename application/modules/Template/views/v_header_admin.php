<?php date_default_timezone_set("Asia/Jakarta"); ?> 
<!DOCTYPE html>
<html>
<head> 
  <title><?php echo SITE_TITLE.' - '.$subtitle; ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo site_url();?>/assets/img/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo site_url();?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo site_url();?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo site_url();?>/assets/css/argon.css?v=1.2.0" type="text/css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" type="text/css"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" type="text/css">
  <script src="<?php echo site_url()?>assets/js/jquery-1.11.2.min.js"></script> 
  <script src="<?php echo site_url()?>assets/js/jquery-ui.js"></script> 
  <style>
  #datatable_filter{
    float:right !important;
  }
  </style>
  <script>
    function rupiah(bilangan = "0"){
        var rupiah = ""; 
        if (bilangan == null) {
          rupiah = "0";
        }else{
          var number_string = bilangan.toString(),
          sisa  = number_string.length % 3,
          rupiah  = number_string.substr(0, sisa),
          ribuan  = number_string.substr(sisa).match(/\d{3}/g);
            
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }
        }
        return rupiah;
      }
      function decimal(angka){
        var hasil = (angka.split('.').join('')).split('Rp').join('');
        return hasil;
      }
      function formatDate(date) {
					var monthNames = [
						"Januari", "Februari", "Maret",
						"April", "Mei", "Juni", "Juli",
						"Agustus", "September", "Oktober",
						"November", "Desember"
					];

					var day = new Date(date).getDate();
					var monthIndex = new Date(date).getMonth();
          var year = new Date(date).getFullYear();
          var hour = new Date(date).getHours();
          var minute = new Date(date).getMinutes();
          var seconds = new Date(date).getSeconds();
          
					return day + '-' + monthNames[monthIndex] + '-' + year+' '+hour+':'+minute+':'+seconds;
				}
  </script>
</head>  