<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('alat/head.php');?>
<?php
        if ($this->session->flashdata('alert') == 'gagal_login') {
            echo "<script>alert('Login Gagal Cek Kembali User dan Password Anda');</script>";
        } else if ($this->session->flashdata('alert') == 'sukses_login') {
            echo "<script>alert('Login Sukses');</script>";
        }
        ?>
<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
       <?php $this->load->view('alat/headerpage');?>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <?PHP $this->load->view('alat/navmenu');?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php foreach($data as $r){echo $r->gaji_neto_all;?></h2>
                                <div class="m-b-5">Gaji Bulan Ini</div><i class="ti-shopping-cart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">1250</h2>
                                <div class="m-b-5">Gaji Bulan Lalu</div><i class="ti-bar-chart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $r->total_all_gaji;?></h2>
                                <div class="m-b-5">Total Seluruh Gaji</div><i class="fa fa-money widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong"><?php echo $r->total_all_potongan;}?></h2>
                                <div class="m-b-5">Total Potongan</div><i class="ti-user widget-stat-icon"></i>
                                <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="container">
                <!-- START PAGE CONTENT-->
            
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Table</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Periode</th>
                                    <th>Total Gaji Neto</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            
                            <tbody id="show_data_slip">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
            <!-- END PAGE CONTENT-->

            </div>
            <!-- END PAGE CONTENT-->
            <?php $this->load->view('alat/footer');?>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <?php $this->load->view('alat/themconf');?>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <?php $this->load->view('alat/footerasetjs');?>
    <script>
    $(document).ready(function(){
		function print(){
		window.print();
		}
		// setInterval(print,10000);
        tampil_data_slip();
        function tampil_data_slip(){
            $.ajax({
        type  : 'ajax',
        url   : '<?php echo site_url('slipgaji/cdata/list_data_slip');?>',
		
        dataType : 'json',
        async :false,
        success : function(data){
          var html = '';
          var i;
		   
          for(i=0; i<data.length; i++){
                   // No = i;
                   No = i+1;
     //               
				   
                  html += '<tr>'+
                  
                  '<td>'+No+'</td>'+
                  '<td>'+data[i].nik+'</td>'+
                  '<td>'+data[i].nama+'</td>'+
                  '<td>'+data[i].periode+'</td>'+
                  '<td>'+data[i].totalgajineto+'</td>'+
                  '<td style="text-align:right;">'+
                  			'<a href="javascript:void(0);" class="btn btn-primary btn-sm item_detailslip" data-id="'+data[i].id+'" data-nik="'+data[i].nik+'" data-nama="'+data[i].nama+'" data-cabang="'+data[i].namacabang+'" style="margin-right:1%;"><span class="fa fa-th fa-1"></span></a>'+
                   '</td>'+           
                   '</tr>';

            }
            $('#show_data_slip').html(html);
            }

            });
    
    }
	
	$('#show_data_slip').on('click','.item_detailslip',function(){   
            var id     = $(this).data('id');
            var nik     = $(this).data('nik');
            var nama     = $(this).data('nama');
            var cabang     = $(this).data('cabang');
			            // var id      = $(this).data('id');
            // var name    = $(this).data('name');
            // var value   = $(this).data('value');
            
             
            $('#Modal_Detail_Slip').modal('show');
            $('[name="id"]').val(id);
            $('[name="nik"]').val(nik);
            $('[name="nama"]').val(nama);
            $('[name="cabang"]').val(cabang);
			// document.getElementById("gat_name").innerHTML = "Detail Gateway "+gat_name;
            // $('#Modal_Detail').modal('show');

            // tampil_detail_data(id);
                 
            // $('[name="nameedit"]').val(name);
            // $('[name="valueedit"]').val(value);
            
     });
    });
	function tampil_detail_data(id){
		
		$.ajax({
			type  : 'GET',
			url   : '<?php echo site_url('slipgaji/cdata/list_data_detailperorangan/?id=');?>'+id,
			
			dataType : 'json',
			async :false,
			success : function(data){
			  var html = '';
			  var i;
			   
			  for(i=0; i<data.length; i++){
					   // No = i;
					   No = i+1;
		 //               
					  html += '<tr>'+
					  
					  '<td>'+No+'</td>'+
					  '<td>'+data[i].periode+'</td>'+
					  '<td>'+data[i].jml_karyawan+'</td>'+
					  '<td>'+data[i].total_gaji_n+'</td>'+
					  '<td style="text-align:right;">'+
								'<a href="javascript:void(0);" class="btn btn-primary btn-sm item_detailslip" data-periode="'+data[i].periode+'" style="margin-right:1%;"><span class="fa fa-th fa-1"></span></a>'+
					   '</td>'+           
					   '</tr>';

				}
				$('#show_data_slip').html(html);
				}

		});
	}

    
    </script>

</body>

</html>