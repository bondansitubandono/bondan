<body class="bg-default"> 
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-5 py-lg-5 pt-lg-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Login Administrator</h1> 
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
        <div class="col-lg-5 col-md-7">
          <div class="card border-0 mb-0"> 
            <div class="card-body px-lg-5 py-lg-5"> 
              <form role="form" method="post" action="<?php echo site_url() ?>Login_admin/auth">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="userid" placeholder="username" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div> 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Login</button>
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
       if($("#status_input").val() !== "kosong"){
          $("#modal-notification").modal();
       }
    });  
  </script>
  
    