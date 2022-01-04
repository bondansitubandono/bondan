<div class="container-fluid mt--8">
      <div class="row"> 
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats" onclick="datatable('Active')" style="cursor:pointer;">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Active <br/> Network</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $active_member; ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div> 
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats" onclick="datatable('InActive')" style="cursor:pointer;">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">InActive Network</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $inactive_member; ?></span>
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
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats" onclick="datatable('Pending')" style="cursor:pointer;">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Pending Approval</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $pending_member; ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                      <i class="ni ni-badge"></i>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>  
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Data Network<span id="status_active"></span></h6> 
                  </div>
                  <button class="btn btn-icon btn-primary" type="button"  data-toggle="modal" data-target="#modal-form" data-backdrop="static" data-keyboard="false">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Create Network</span>
                </button>
                </div>
              </div>
              <div class="card-body">
                <div id="pesan_id" class="alert alert-success alert-dismissible fade show" style="display:none;" role="alert"> 
                    <span class="alert-text"><strong><span id="status_id"></span></strong><span id="content_id"></span></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort">No.</th>
                      <th scope="col" class="sort">Nama</th> 
                      <th scope="col" class="sort">Kota</th>
                      <th scope="col" class="sort">SponsorKu</th>
                      <th scope="col" class="sort">Sponsor</th>
                      <th scope="col" class="sort">Email</th>
                      <th scope="col" class="sort">Level</th>
                      <th scope="col" class="sort">Status</th>
                      <th scope="col" class="sort">Opsi</th> 
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
    var link = "<?php echo site_url();?>Member"; 
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
          {'data' : 'no'}, 
          {'data' : 'fv_member'},
          {'mRender': function ( data, type, row ) {
              return row['fc_jenis']+" "+row['fv_city']+" - "+row['fv_province']
            }
          },
          {'data' : 'fc_referral_id'}, 
          {'mRender' :function ( data, type, row ) {
              return "<span id='see-upline' class='btn btn-primary text-white' data-fc_upline='"+row['fc_referral_from']+"' title='Klik untuk melihat upline'>"+row['fc_referral_from']+"</span>";
            }
          },
          {'data' : 'fc_mail'},
          {'mRender' :function ( data, type, row ) {
              if(row['fv_level'] == "MANAGER"){
                return "<span class='btn btn-success text-white' >Manager</span>";
              }else if(row['fv_level'] == "MEMBER") {
                return "<span class='btn btn-warning text-white' >Member</span>";
              }  
            }
          },
          {
            'mRender':function(data,type,row){
              let status_data = "";
              if(row['fc_approved'] == "Y" && row['fc_hold'] == "N"){
                  status_data = '<span class="badge badge-pill badge-success">Active</span>';
                } else if(row['fc_approved'] == "Y" && row['fc_hold'] == "Y"){
                  status_data = '<span class="badge badge-pill badge-danger">InActive</span>';
                }else if(row['fc_approved'] == "N" && row['fc_hold'] == "N"){
                  status_data = '<span class="badge badge-pill badge-warning">Need Approval</span></a>';
                }
                return status_data;
            }
          },
          {'mRender': function ( data, type, row ) {
                  let tombol = "";
                  if(row['fc_approved'] == "N" && row['fc_hold'] == "N"){
                    tombol = '<a class="dropdown-item" href="#" onclick="UpdateStatus('+row['fc_member']+',1)">Approved</a>';
                  } else if(row['fc_approved'] == "Y" && row['fc_hold'] == "N"){
                    tombol = '<a class="dropdown-item" href="#" onclick="UpdateStatus('+row['fc_member']+',2)">InActive</a>';
                  }else if(row['fc_approved'] == "Y" && row['fc_hold'] == "Y"){
                    tombol = '<a class="dropdown-item" href="#" onclick="UpdateStatus('+row['fc_member']+',3)">Activated</a>';
                  }
                  return '<div class="dropdown">'+
                        '<a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                          'Opsi</a>'+
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">'+
                          '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-form" data-backdrop="static" data-keyboard="false">Lihat</a>'+
                          tombol+
                          '<a class="dropdown-item" href="#">Edit</a>'+
                          '<a class="dropdown-item" href="#" onclick="hapus('+row['fc_member']+')" >Delete</a>'+
                        '</div></div>';
                },width:60
            },
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
      $("#laporan").on('click','#see-upline',function(){   
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
  </script>
  
