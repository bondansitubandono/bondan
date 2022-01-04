  <div class="col-md-6">
    <div class="modal fade" id="modal-omzet" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">History Pembelian ticket<div class="custom-control custom-control-inline"> <input type="date" class="form-control" id="date_filter" name="date_filter"> sampai <input type="date" class="form-control" id="date_filter" name="date_filter"><br/></div><button type="button" onclick="getOmzet()" class="btn btn-primary">Lihat</button></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="overflow:auto;">
                  <table class="table table-striped table-bordered" id="table-omzet">
                    <thead class="thead-light">
                      <tr> 
                        <th scope="col" class="sort">Tanggal Transaksi</th>  
                        <th scope="col" class="sort">Member</th>  
                        <th scope="col" class="sort">Topup</th> 
                        <th scope="col" class="sort">Total</th> 
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
      
  </script>