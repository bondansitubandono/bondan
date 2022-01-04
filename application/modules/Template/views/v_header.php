<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="csp network">
  <meta name="author" content="Creative Tim">
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
  <script src="<?php echo site_url()?>assets/js/jquery-1.11.2.min.js"></script> 
  <script src="<?php echo site_url()?>assets/js/jquery-ui.js"></script>  
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
  </script>
</head>  