<body class="bg-default"> 
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-5 py-lg-5 pt-lg-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Selamat datang di Platform CSP NETWORK!</h1>
              <p class="text-lead text-white">Salam profit bersama <br/>CSP "Charity Share Program"</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10">
          <div class="card bg-secondary border-0 mb-0"> 
            <div class="card-body px-lg-5 py-lg-5">  
              <div class="col-xl-12 order-xl-1">
                <div class="card"> 
                  <div class="card-body">
                    <form action="<?php echo  site_url().'Repassword/Simpan'; ?>" method="post" id="formAksi">
                    <input type="hidden" name="status" value="member">
                      <h6 class="heading-small text-muted mb-4">Member Information</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_username">Username</label>
                              <input type="text" id="mem_username" name ="mem_username" class="form-control" placeholder="Username" required>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_password">Password Baru</label>
                              <input type="text" id="mem_password" name ="mem_password" class="form-control" placeholder="Password" required>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="kode_captcha"> <?=$cap_img;?> </label>
                              <input class="form-control" name="kode_captcha" placeholder="Isikan Kode Captcha" type="text">
                            </div>
                          </div>
                          <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox" onclick="getActive()">
                            <label class="custom-control-label" for=" customCheckLogin">
                              <span class="text-muted" style="color:green; font-size:10px;">Saya setuju dengan Syarat dan Ketentuan yang Berlaku</span>
                            </label>
                          </div>
                          <div class="text-center">
                            <a href="<?php echo (!empty($this->uri->segment(2))) ? "../login" : site_url().'Login'; ?>">
                            <button type="button" class="btn btn-danger my-4">Batal</button>
                            </a>
                            <button type="submit" id="myBtn" class="btn btn-primary my-4">Daftar</button>
                          </div>
  
                  </div>
                </div>
              </div>
                </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div> 
      <!-- <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">Notification</button> -->
      <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog <?php echo ($this->session->flashdata('status') == "Pendaftaran berhasil") ? "modal-primary" : 'modal-danger'; ?> modal-dialog-centered modal-" role="document">
            <div class="modal-content <?php echo ($this->session->flashdata('status') == "Pendaftaran berhasil") ? "bg-gradient-primary" : 'bg-gradient-danger'; ?> ">
              
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Informasi</h6> 
                </div>
                
                <div class="modal-body">
                  
                    <div class="py-3 text-center">
                      <input type="hidden" id="status_input" value="<?php echo (!empty($this->session->flashdata('status'))) ? $this->session->flashdata('status') : 'kosong'; ?>">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4"><?php echo $this->session->flashdata('status'); ?></h4>
                        <p><?php echo $this->session->flashdata('msg'); ?></p>
                    </div>
                    
                </div>
                
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tutup</button>
                </div>
                
            </div>
        </div>
      </div>
  <script type="text/javascript">
    var link = "<?php echo site_url().$this->uri->segment(1);?>"; 
    $(document).ready(function(){
      cekKode();
      document.getElementById("myBtn").disabled = true;
       if($("#status_input").val() !== "kosong"){
          $("#modal-notification").modal();
       }
    });    	 
    function getCity(){ 
        $("input[name='label_provinsi']").val($("#mem_provinsi option:selected").text());
          $.get( link+"/getCity/"+$("#mem_provinsi").val(), $(this).serialize())
          .done(function(data) {
              document.getElementById("mem_kab").innerHTML = data;
          }); 
        } 
    function getActive(){
      document.getElementById("myBtn").disabled = false;
      
    } 
    function labelData(options,elem) {
      $("input[name='"+elem+"']").val(options.options[options.selectedIndex].text);
    }
    function cekKode(){ 
	       $.ajax({
            type: 'POST',
            dataType:'JSON',
            url: link+"/cekKode",
            success:function(responseText){   			
		     $('input[name="ref_code"]').val(responseText.no);   
		    	
            }
        });
    }
    function NameMember()
    {
      document.getElementById('mem_nama_rekening').value = document.getElementById('mem_name').value;
    }
  </script>