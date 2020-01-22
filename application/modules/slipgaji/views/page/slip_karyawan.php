<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('alat/head.php');?>

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
                                    <th>Periode</th>
                                    <th>Jml Karyawan</th>
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
			<!-- modal detail -->
			<form>
			  <div class="modal fade" id="Modal_Detail_Karyawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
				  <div class="modal-content">
					<div class="modal-header">
					  <h5 class="modal-title" id="exampleModalLabel">Detail Slip Gaji</h5>
					  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>
					<div class="modal-body">
						 <table id="" class="table table-hover table-bordered table-striped" style="color:black;">
							<thead>
						   
							<tr>
							  <th>No</th>
							  <th>NIK</th>
							  <th>Nama Karyawan</th>
							  <th>Gaji Neto</th>
							  <th>Action</th>
							</tr>
						  </thead>
						 <tbody id="show_data_pasangbaru">
							
						  </tbody>
						</table> 
						  
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  <button type="button" type="submit" id="btn_update" class="btn btn-primary" data-dismiss="modal">Save</button>
					</div>
				  </div>
				</div>
			  </div>
			  </form>
			  <!-- end modal detail-->
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
        
        tampil_data_slip();
        function tampil_data_slip(){
            $.ajax({
			type  : 'ajax',
			url   : '<?php echo site_url('slipgaji/cdata/list_data_karyawan');?>',
			
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
    });
	function tampil_detail_data(periode){
		
		$.ajax({
			type  : 'GET',
			url   : '<?php echo site_url('slipgaji/cdata/list_data_detailkaryawan/?periode=');?>'+periode,
			
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
	$('#show_data_slip').on('click','.item_detailslip',function(){   
            var periode     = $(this).data('periode');
			// document.getElementById("gat_name").innerHTML = "Detail Gateway "+gat_name;
            $('#Modal_Detail_Karyawan').modal('show');

            tampil_detail_data(periode);
                 
            // $('[name="nameedit"]').val(name);
            // $('[name="valueedit"]').val(value);
            
     });
    
    </script>
	<script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
</body>

</html>