<div class="container-fluid mt--8">
      <div class="row">  
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Data Tiket<span id="status_active"></span></h6> 
                  </div> 
                </div>
              </div>
              <div class="card-body">
                <div id="pesan_id" class="alert alert-success alert-dismissible fade show" style="display:none;" role="alert"> 
                    <span class="alert-text"><strong><span id="status_id"></span></strong><span id="content_id"></span></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <div id="laporan" class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort"></th>
                      <th scope="col" class="sort">Nama</th> 
                      <th scope="col" class="sort">Kota</th>
                      <th scope="col" class="sort">Saldo</th>
                      <th scope="col" class="sort">Request</th>
                      <th scope="col" class="sort">Total Bayar</th>
                      <th scope="col" class="sort">Email</th>  
                    </tr>
                  </thead>
                  <tbody>  
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  </div>
  <script type="text/javascript">
    var link = "<?php echo site_url();?>Tiket_member"; 
    var table;
      $(document).ready(function($){ 
        datatable("Active");
      });
    function datatable(status_active){
      table = $('#datatable').DataTable({
      'processing': true, //ini untuk menampilkan processing
      'serverSide': true, //iini untuk serversidenya  
      'order'		: [], //ini jika menginginkan diorder
      'destroy'   : true, 
      'language'  : {
        'searchPlaceholder'	: "Cari",
        "paginate": {
          "previous": "<i class='fas fa-angle-left'></i>",
          "next": "<i class='fas fa-angle-right'></i>"
        } 
      },
      'ajax':{
        'url'	: "<?php echo site_url($this->uri->segment(1).'/data/');?>"+status_active,
        "dataType": "json",
        'type'	: 'POST' 
      },//pasangkan hasil dari ajax ke datatablesnya
      'columns'	:[
        {'mRender' :function ( data, type, row ) {
            return "<span id='topup' class='btn btn-primary text-white' data-fc_member='"+row['fc_member']+"' data-fv_member='"+row['fv_member']+"' data-fv_member>TopUp</span>"
          }
        }, 
        {'data' : 'fv_member'},
        {'mRender': function ( data, type, row ) {
            return row['fc_jenis']+" "+row['fv_city']+" - "+row['fv_province']
          }
        },
        {'mRender' :function ( data, type, row ) {
            return row['fn_saldo'];
          }
        }, 
        {'mRender' :function ( data, type, row ) {
            return row['fn_request'];
          }
        },
        {'mRender' :function ( data, type, row ) {
            return "Rp."+rupiah(row['fn_total']);
          }
        },
        {'data' : 'fc_mail'} 
        ]
      });                  
    }
    function reload_table(){
      table.ajax.reload(null,false); 
    } 
    function hapus(kode){
      if(confirm("Apakah anda Yakin?")){ 
        $.get("<?php echo site_url($this->uri->segment(1).'/Hapus/');?>"+kode, $(this).serialize())
              .done(function(data) {  
                $("#pesan_id").show("slow");
                if(data.includes("Berhasil")){
                  $('#pesan_id').removeClass("alert-danger");
                  $('#pesan_id').addClass('alert-success');
                  $('#status_id').text("Berhasil");
                  $('#content_id').text(data);
                }else{
                  $('#pesan_id').removeClass("alert-success");
                  $('#pesan_id').addClass('alert-danger');
                  $("#status_id").text("Gagal");
                  $('#content_id').text(data);
                }
                  reload_table(); 
              });
              //--------------------------------
          }
    }

    function UpdateStatus(kode,status){
      if(confirm("Apakah anda Yakin?")){ 
        $.get("<?php echo site_url($this->uri->segment(1).'/Update_Status/');?>"+kode+"/"+status, $(this).serialize())
              .done(function(data) {  
                $("#pesan_id").show("slow");  
                  location.reload();
              });
              //--------------------------------
          }
    }
    $("#laporan").on('click','#topup',function(){ 
          $("#modal-form").modal();
					var fc_member = $(this).data('fc_member');
					var fv_member = $(this).data('fv_member'); 
					$("#mem_kode").val(fc_member);
          $("#mem_name").val(fv_member);
				});
  </script>
  
