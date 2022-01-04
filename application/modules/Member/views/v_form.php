<div class="col-md-8"> 
      <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">  
            <div class="card">
                 
                <div class="card-body px-lg-5 py-lg-5"> 
                    <form action="<?php echo  site_url().'Signup/Simpan'; ?>" method="post" id="formAksi">
                    <input type="hidden" name="status" value="admin">
                      <h6 class="heading-small text-muted mb-4">Member Information</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="ref_code">Kode Sponsor</label>
                              <input type="text" id="ref_code" name="ref_code" class="form-control" placeholder="masukkan kode sponsor">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_name">Nama Lengkap</label>
                              <input type="text" id="mem_name" name ="mem_name" class="form-control" placeholder="Nama Lengkap" required>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_gender">Jenis kelamin</label>
                              <select name="mem_gender" id="mem_gender" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="hidden" name="label_provinsi">
                              <label class="form-control-label" for="mem_provinsi">Provinsi</label>
                              <select name="mem_provinsi" id="mem_provinsi" class="form-control" onchange="getCity()" required> 
                                <option value="">Pilih</option>
                                <?php
                                  foreach (getProvinsi() as $key => $value) {
                                    echo "<option value='".$key."'>".$value."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="hidden" name="label_kota">
                              <label class="form-control-label" for="mem_kab">Kota / Kabupaten</label>
                              <select name="mem_kab" id="mem_kab" class="form-control" onchange="labelData(this,'label_kota')" required>  
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_addr">Alamat Lengkap</label>
                              <textarea rows="4" name="mem_addr" class="form-control" placeholder=""></textarea>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_username">Username</label>
                              <input type="text" id="mem_username" name ="mem_username" class="form-control" placeholder="Username" required>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_password">Password</label>
                              <input type="text" id="mem_password" name ="mem_password" class="form-control" placeholder="Password" required>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_mail">Email</label>
                              <input type="email" id="mem_mail" name ="mem_mail" class="form-control" placeholder="Email" required>
                            </div>
                          </div> 
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_wa">No.Whatsapp</label>
                              <input type="number" id="mem_wa" name ="mem_wa" class="form-control" placeholder="No.Whatsapp" required>
                            </div>
                          </div>
                        </div> 
                      </div>
                      <hr class="my-4" />
                      <h6 class="heading-small text-muted mb-4">Bank Information</h6> 
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="hidden" name="label_bank">
                              <label class="form-control-label" for="mem_bank">Bank</label>
                              <select name="mem_bank" id="mem_bank" class="form-control" onchange="labelData(this,'label_bank')" required> 
                                <?php
                                  foreach (getBank() as $key => $value) {
                                    echo "<option value='".$key."'>".$value."</option>";
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_nama_rekening">Nama Rekening</label>
                              <input type="text" id="mem_nama_rekening" name ="mem_nama_rekening" class="form-control" placeholder="Nama Rekening" required>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-control-label" for="mem_no_rekening">Nomor Rekening</label>
                              <input type="number" id="mem_no_rekening" name ="mem_no_rekening" class="form-control" placeholder="Nomor Rekening" required>
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
    function getCity(){ 
        $("input[name='label_provinsi']").val($("#mem_provinsi option:selected").text());
          $.get( link+"/getCity/"+$("#mem_provinsi").val(), $(this).serialize())
          .done(function(data) {
              document.getElementById("mem_kab").innerHTML = data;
          }); 
        } 
    function labelData(options,elem) {
      $("input[name='"+elem+"']").val(options.options[options.selectedIndex].text);
    }
  </script>