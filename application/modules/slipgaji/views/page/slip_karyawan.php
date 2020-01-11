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
            <div class="page-heading">
                <h1 class="page-title">DataTables</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">DataTables</li>
                </ol>
            </div>
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
                  '<td>'+data[i].totalgajineto+'</td>'+
                  '<td style="text-align:right;">'+
                  			'<a href="javascript:void(0);" class="btn btn-primary btn-sm item_detailonline" data-id="' +data[i].id+'" data-name="'+data[i].name+'" data-value = "'+data[i].value+'" style="margin-right:1%;"><span class="fa fa-th fa-1"></span></a>'+
                   '</td>'+           
                   '</tr>';

            }
            $('#show_data_slip').html(html);
            }

            });
    
    }
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