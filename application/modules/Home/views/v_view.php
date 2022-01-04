    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
         
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Downline</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <form action="<?php echo  site_url().'Home/Simpan'; ?>" method="post" id="formAksi">
                      <div class="text-center">
                      <input type="hidden" id="ref_code" value="<?php echo $this->session->userdata('fc_referral_id'); ?>" name="ref_code" class="form-control" placeholder="masukkan kode sponsor" value="<?php echo $this->uri->segment(2); ?>">
                      <a href="whatsapp://send?text=http://cspnetwork.net/Signup/<?php echo $this->session->userdata('fc_referral_id'); ?>" class="btn btn-success my-4">Bagikan ke WhatsApp</a>
                      <a href="http://www.facebook.com/sharer.php?u=http://cspnetwork.net/Signup/<?php echo $this->session->userdata('fc_referral_id'); ?>" class="btn btn-primary my-4" target="_blank">Share To Facebook</a>
                      <button type="submit" class="btn btn-primary my-4">SHARE LINK</button>
                      </div>
                    </form>
                  </p>
                  </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Bonus Aktif</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Bonus Bulan Ini </span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Bonus All</span>
                  </p>
                
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total PH/GH</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">PH hari ini </span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">GH hari ini</span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">PH All </span>
                  </p>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">GH All</span>
                  </p>
                
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Wallet</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
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