<div class="col-md-8"> 
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">  
            <div class="card">
                 
                <div class="card-body px-lg-5 py-lg-5"> 
                    <form action="<?php echo  site_url().'Tiket/TopUp'; ?>" method="post" id="formAksi">
                      <h6 class="heading-small text-muted mb-4">Member Information</h6>
                      <input type="hidden" id="mem_kode" name ="mem_kode" class="form-control">
                      <div class="pl-lg-4">
                        <div class="row"> 
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_name">Nama Lengkap</label>
                              <input type="text" id="mem_name" name ="mem_name" class="form-control" placeholder="Nama Lengkap" readonly>
                            </div>
                          </div>  
                      </div>
                       
                      </div>
                        <div class="text-center">
                        <button type="button" class="btn btn-danger my-4" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary my-4">Simpan</button>
                        </div>
                    </form>
                </div>
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
    var link = "<?php echo site_url();?>Signup"; 
    $(document).ready(function(){
       if($("#status_input").val() !== "kosong"){
          $("#modal-notification").modal();
       }
    }); 
  </script>