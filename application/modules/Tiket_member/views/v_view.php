<style type="text/css">
   .scroll{
  overflow: scroll;
  height: 150px;

}
  </style>
<div class="container-fluid mt--8">
      <div class="row">  
      <div class="col-xl-4 col-md-6">
            <div class="card card-stats" onclick="datatable('Active')" style="cursor:pointer;">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Request Ticket</h5>                    
                    <span class="h2 font-weight-bold mb-0"><b id="tota"></b></span>
                    </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                </div> 
                <div class="scroll">
                <?php for($no=1; $no<=10; $no++) { ?>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up" > </i>   <i> </i> <b id="act_down<?php echo $no; ?>"></b> </span>
                    <span class="text-nowrap">Total Request Level <?php echo $no; ?> </span>
                  </p>
                <?php } ?>
              </div>
              </div>
            </div>
          </div> 
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats" onclick="datatable('InActive')" style="cursor:pointer;">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Request Ticket Ku</h5>
                    <span class="h2 font-weight-bold mb-0"><b id="tota2"></b></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-circle-08"></i>
                    </div>
                  </div>
                </div> 
                
              
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats" onclick="datatable('Pending')" style="cursor:pointer;">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Saldo Ticket</h5>
                    <span class="h2 font-weight-bold mb-0"><b id="tota3"></b></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                      <i class="ni ni-badge"></i>
                    </div>
                  </div>
                </div> 
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up" > </i>   <i> </i> <b id="act_down3"></b> </span>
                    <span class="text-nowrap">Total Downline </span>
                  </p>
             
              </div>
            </div>
          </div>  
        
          <div class="col-xl-12">
          <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Data Ticket<span id="status_active"></span></h6> 
                  </div>
                  <select id="level" class="btn btn-icon btn-success" onchange="datatable2()">
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                    <option value="4">Level 4</option>
                    <option value="5">Level 5</option>
                    <option value="6">Level 6</option>
                    <option value="7">Level 7</option>
                    <option value="8">Level 8</option>
                    <option value="9">Level 9</option>
                    <option value="10">Level 10</option>
                  </select>
                 
                  <a class="btn btn-primary" id="detail-omzet2" href="#" data-fc_wa='<?php  echo $fc_wa; ?>' data-fv_addr='<?php  echo $fv_addr; ?>' data-fc_mail='<?php  echo $fc_mail; ?>' data-fc_member='<?php  echo $fc_member; ?>' data-fv_member='<?php  echo $fv_member; ?>'>Request Pembelian Tiket</a>
              
                </div>
              </div>
           
              <div class="card-body">
              <div id="report1">
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
              <div id="report2" style="display:none;">
              <div id="laporan" class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable2">
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
  </div>
  <script type="text/javascript">
    var link = "<?php echo site_url();?>Tiket_member"; 
    var table;
    var table2;
      $(document).ready(function($){ 
        datatable("Active");  
//datatable2("Active"); 
      });
    function datatable(status_active){
      kode=1;
      
      $.ajax({
            type: 'POST',
            dataType:'JSON',
            url: link+"/Cekkode/level/"+kode,
            success:function(responseText){   
            	
//		     $('input[name="ref_code"]').val(responseText.no);    
document.getElementById("act_down1").innerHTML = responseText.no1;	
document.getElementById("act_down2").innerHTML = responseText.no2;	
document.getElementById("act_down3").innerHTML = responseText.no3;	
document.getElementById("act_down4").innerHTML = responseText.no4;	
document.getElementById("act_down5").innerHTML = responseText.no5;	
document.getElementById("act_down6").innerHTML = responseText.no6;	
document.getElementById("act_down7").innerHTML = responseText.no7;	
document.getElementById("act_down8").innerHTML = responseText.no8;	
document.getElementById("act_down9").innerHTML = responseText.no9;	
document.getElementById("act_down10").innerHTML = responseText.no10;	  
document.getElementById("act_down10\1").innerHTML = responseText.no11;	  
document.getElementById("tota").innerHTML = responseText.no;    
document.getElementById("tota2").innerHTML = responseText.request;  	  
document.getElementById("tota3").innerHTML = responseText.saldo;    
//document.getElementById("act_down2").innerHTML = responseText.no2;	  
//document.getElementById("tota2").innerHTML = responseText.no2;  
//document.getElementById("act_down3").innerHTML = responseText.no3;	  
//document.getElementById("tota3").innerHTML = responseText.no3;
//document.getElementById("act_up").innerHTML = responseText.no;		  
//document.getElementById("tota").innerHTML = (responseText.no) + (responseText.no);		    	
            }
        });
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
        'url'	: "<?php echo site_url($this->uri->segment(1).'/data/');?>"+status_active+"/"+kode,
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
    function datatable2(kode,status_active){
      
    	$('#report1').slideUp('1000');
     	$('#report2').slideDown('1000');
     
      kode =document.getElementById('level').value;

      $.ajax({
            type: 'POST',
            dataType:'JSON',
            url: link+"/Cekkode/level/"+kode,
            success:function(responseText){   
            	
//		     $('input[name="ref_code"]').val(responseText.no);    
document.getElementById("act_down1").innerHTML = responseText.no1;	
document.getElementById("act_down2").innerHTML = responseText.no2;	
document.getElementById("act_down3").innerHTML = responseText.no3;	
document.getElementById("act_down4").innerHTML = responseText.no4;	
document.getElementById("act_down5").innerHTML = responseText.no5;	
document.getElementById("act_down6").innerHTML = responseText.no6;	
document.getElementById("act_down7").innerHTML = responseText.no7;	
document.getElementById("act_down8").innerHTML = responseText.no8;	
document.getElementById("act_down9").innerHTML = responseText.no9;	
document.getElementById("act_down10").innerHTML = responseText.no10;	  
document.getElementById("tota").innerHTML = responseText.no11;   	  
document.getElementById("tota2").innerHTML = responseText.request;  	  
document.getElementById("tota3").innerHTML = responseText.saldo;    
//document.getElementById("act_down2").innerHTML = responseText.no2;	  
//document.getElementById("tota2").innerHTML = responseText.no2;  
//document.getElementById("act_down3").innerHTML = responseText.no3;	  
//document.getElementById("tota3").innerHTML = responseText.no3;
//document.getElementById("act_up").innerHTML = responseText.no;		  
//document.getElementById("tota").innerHTML = (responseText.no) + (responseText.no);		    	
            }
        });      
      table2 = $('#datatable2').DataTable({
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
        'url'	: "<?php echo site_url($this->uri->segment(1).'/data2/');?>"+status_active+"/"+kode,
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
    function reload_table2(){
      table2.ajax.reload(null,false); 
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
    $("#detail-omzet2").on('click',function(){ 
      $("#modal-proses").modal();
      var fc_member = $(this).data('fc_member');
      var fv_member = $(this).data('fv_member');
      var fv_addr = $(this).data('fv_addr');
      var fc_wa = $(this).data('fc_wa');
      var fc_mail = $(this).data('fc_mail');
      $("#mem_kode2").val(fc_member);
      $("#mem_name2").val(fv_member);
      $("#mem_addr2").val(fv_addr);
      $("#mem_mail2").val(fc_mail);
      $("#mem_phone2").val(fc_wa);
    
   //   getOmzet();  
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
  
