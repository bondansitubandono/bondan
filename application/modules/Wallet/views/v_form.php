  <div class="col-md-8">  
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">  
              <div class="card"> 
                  <div class="card-body px-lg-5 py-lg-5"> 
                      <form action="#" method="post" id="formAksi">
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
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_addr">Alamat</label>
                                <input type="text" id="mem_addr" name ="mem_addr" class="form-control" placeholder="Alamat" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_mail">Email</label>
                                <input type="text" id="mem_mail" name ="mem_mail" class="form-control" placeholder="Email" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_phone">No.Whatsapp</label>
                                <input type="text" id="mem_phone" name ="mem_phone" class="form-control" placeholder="Phone" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_saldo">Saldo</label>
                                <input type="text" id="mem_saldo" name ="mem_saldo" class="form-control" placeholder="Saldo" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_request">Request</label>
                                <input type="text" id="mem_request" name ="mem_request" class="form-control" placeholder="Request" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_topup">Topup</label>
                                <input type="number" id="mem_topup" name ="mem_topup" class="form-control" placeholder="0" onblur="hitung()" readonly>
                              </div>
                            </div>
                            <input type="hidden" id="mem_price" name="mem_price" value="<?php echo getSetup("TICKET_PRICE"); ?>">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_total">Total</label>
                                <input type="number" id="mem_total" name ="mem_total" class="form-control" placeholder="0" readonly>
                              </div>
                            </div> 
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_disc">Discount %</label>
                                <input type="number" id="mem_disc" name ="mem_disc" class="form-control" placeholder="0" value="<?php echo getSetup("TICKET_DISC_MNG"); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-control-label" for="mem_netto">Total Bayar</label>
                                <input type="number" id="mem_netto" name ="mem_netto" class="form-control" placeholder="0" value="0" readonly>
                              </div>
                            </div>   
                        </div>
                          <div class="text-center">
                          <button type="button" class="btn btn-danger my-4" data-dismiss="modal">Batal</button>
                              <button type="submit" id="btn_simpan" class="btn btn-primary my-4">Proses</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
          </div>
      </div>  
    </div> 
  </div> 
  <div class="col-md-6">
    <div class="modal fade" id="modal-history" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">History Pembelian ticket <span id="name_mem"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="overflow:auto;">
                  <table class="table table-striped table-bordered" id="table-history">
                    <thead class="thead-light">
                      <tr> 
                        <th scope="col" class="sort">Tanggal Transaksi</th>  
                        <th scope="col" class="sort">History</th>  
                      </tr>
                    </thead>
                    <tbody id="tbodyid">   
                    </tbody>
                  </table>
                </div> 
            </div>
        </div>  
      </div>
  </div>
  <script type="text/javascript">
    var link = "<?php echo  site_url().'Tiket'; ?>"; 
    function hitung(){
      var topup  = $("#mem_topup").val();
      var price  = $("#mem_price").val();
      $("#mem_total").val(rupiah(topup * price));
      var total  = decimal($("#mem_total").val());
      var disc   = $("#mem_disc").val();
      var hitung = topup%10; 
      var netto  = total - ((disc / 100) *total);  
      if(hitung > 0){ 
        document.getElementById("btn_simpan").disabled = true;
        alert("Transaksi tidak diperbolehkan karena TopUp hanya kelipatan 10."); 
      }else{
        document.getElementById("btn_simpan").disabled = false;
        $("#mem_netto").val(rupiah(netto));
      } 
    }
    $(document).on('submit','#formAksi',function(e){
        if(confirm("Apakah anda Yakin?")){ 
            e.preventDefault();
            $.ajax({
                    url: link+"/TopUp",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){ 
                      if (data.includes("Berhasil") == true) {
                        $("#modal-form").modal("hide");
                        alert("Berhasil TopUp");
                        datatable("Active"); 
                      }else{
                        alert("Gagal TopUp,Periksa inputan anda");
                      }  
                    }           
                });
                return false;
        }  
			}); 
  </script>