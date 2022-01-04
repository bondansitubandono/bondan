<div class="container-fluid mt--8">
      <div class="row">  
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-muted ls-1 mb-1">Data Tiket<span id="status_active"></span><br/>Omzet Ticket Per <?php echo format_tanggal_indo(date("Y-m-d")); ?> adalah <span class="text-red"><?php echo $omzet; ?> </span><a class="btn btn-primary" id="detail-omzet" href="#">Lihat Detail</a></h6> 
                  </div> 
                </div>
              </div>
              <div class="card-body">
              <p class="ct-lead">
                Member yang bisa dilakukan topup adalah level Manager,untuk member biasa untuk topup melalui manager masing2.
              </p>
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
    var link = "<?php echo site_url();?>Tiket"; 
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
          let btn_topup = "";
          if(row['fn_request'] > 0){
            btn_topup = "<span id='topup' class='btn btn-primary text-white' data-fc_member='"+row['fc_member']+"' data-fv_member='"+row['fv_member']+"' data-fv_addr='"+row['fc_jenis']+" "+row['fv_city']+" - "+row['fv_province']+"' data-fc_mail='"+row['fc_mail']+"' data-fc_phone='"+row['fc_phone']+"' data-fn_saldo='"+row['fn_saldo']+"' data-fn_request='"+row['fn_request']+"' data-fn_total='"+row['fn_total']+"'>TopUp</span>";
          }else{
            btn_topup = "";
          }
            return btn_topup+"<span id='history' class='btn btn-warning text-white' data-fc_member='"+row['fc_member']+"' data-fv_member='"+row['fv_member']+"'>History</span>"
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
      var fv_addr   = $(this).data("fv_addr");
      var fc_mail   = $(this).data("fc_mail");
      var fc_phone  = $(this).data("fc_phone");
      var fn_saldo  = $(this).data("fn_saldo");
      var fn_request= $(this).data("fn_request");
      var fn_total  = $(this).data("fn_total");
      $("#mem_kode").val(fc_member);
      $("#mem_name").val(fv_member);
      $("#mem_addr").val(fv_addr);
      $("#mem_mail").val(fc_mail);
      $("#mem_phone").val(fc_phone); 
      $("#mem_saldo").val(fn_saldo);
      $("#mem_request").val(rupiah(fn_request));
      $("#mem_topup").val(fn_request);
      $("#mem_total").val(rupiah(fn_total));
      hitung();
    });

    $("#laporan").on('click','#history',function(){   
      var fc_member = $(this).data('fc_member'); 
      var fv_member = $(this).data('fv_member');
      $("#name_mem").text(fv_member);
      $.ajax({
          type: 'GET',
          dataType:'JSON',
          url: link+"/History/"+fc_member,
          success:function(responseText){ 
            if(responseText != false){
              $("#modal-history").modal();
              $('#table-history').find("tr:gt(0)").remove();
              var table = document.getElementById("table-history"); 
              var row,cell1,cell2  
              for (var data of responseText) 
              {
                row = table.insertRow(1);
                cell1 = row.insertCell(0);
                cell2 = row.insertCell(1); 
                cell1.innerHTML = formatDate(data.fd_message);
                cell2.innerHTML = data.fv_message;
              } 
            }else{
              alert("History kosong");
            }
          }
      });
    });
    $("#detail-omzet").on('click',function(){ 
      $("#modal-omzet").modal();
      getOmzet();  
    });
    function getOmzet(date_filter){
      $.ajax({
          type: 'GET',
          dataType:'JSON',
          url: link+"/Omzet",
          success:function(responseText){ 
            if(responseText != false){ 
              $('#table-omzet').find("tr:gt(0)").remove();
              var table = document.getElementById("table-omzet"); 
              var row,cell1,cell2  
              for (var data of responseText) 
              {
                row = table.insertRow(1);
                cell1 = row.insertCell(0);
                cell2 = row.insertCell(1); 
                cell1.innerHTML = formatDate(data.fd_transaksi);
                cell2.innerHTML = data.fv_member;
                cell2.innerHTML = data.fn_topup;
              } 
            }else{
              alert("History kosong");
            }
          }
      });
    }
  </script>
  
