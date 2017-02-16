<!-- START Template Main -->
<section id="main" role="main">
	<!-- START Template Container -->
	<div class="container-fluid">
		<!-- START row -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-teal">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pengawas</h3>
						<!-- Start menu tambah soal -->
						<div class="panel-toolbar text-right">
						<a class="btn btn-inverse btn-outline" href="<?= base_url(); ?>index.php/pengawas/formPengawas" title="Tambah Data" ><i class="ico-plus"></i></a>
						</div>
						<!-- END menu tambah soal -->
					</div>
					<table class="table table-striped table-bordered" id="tb_pengawas" style="font-size: 13px" width="100%">
						<thead>
							<tr>
								<th >No</th>
								<th>Nama Pengguna</th>
								<th>Nama Pengawas</th>
								<th>Alamat</th>
								<th>Kontak</th>
								<th>Email</th>
								<th >Aksi</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--/ END row -->

	</div>
	<!--/ END Template Container -->
</section>
<!-- END Template Main -->

<script type="text/javascript">
	var tb_pengawas;
    $(document).ready(function() {
        tb_pengawas = $('#tb_pengawas').DataTable({ 
           "ajax": {
                    "url": base_url+"index.php/pengawas/ajax_listPengawas/",
                    "type": "POST"
                    },
            "processing": true,
        });
        $(function () {
              $('[data-toggle="popover"]').popover()
            });
       
    });

    function dropPengawas(uuid) {
    	if (confirm('Apakah Anda yakin akan menghapus data ini? ')) {
               // ajax delete data to database
               
               $.ajax({
                     url : base_url+"index.php/pengawas/deletePengawas/"+uuid,
                     type: "POST",
                     dataType: "TEXT",
                     success: function(data,respone)
                     {  
                       
                            reload_tblist();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                            alert('Error deleting data');
                            // console.log(jqXHR);
                            // console.log(textStatus);
                            // console.log(errorThrown);
                    }
                });
             }
    }
    function reload_tblist(){
      tb_pengawas.ajax.reload(null,false); 
    }
</script>