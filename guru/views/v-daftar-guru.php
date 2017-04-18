<section id="main" role="main">
	<div>
		<div class="col-md-12">
			<div class="row">
				<!-- Panel -->
				<div class="panel panel-default">
						<!-- Panel Heading -->
					  <div class="panel-heading">
              <h4 class="panel-title">Daftar Siswa</h4>
              <div class="panel-toolbar text-right">
              	<a href="http://localhost/netjoo-2/register/registerGuru" class="btn btn-success"><i class="ico-user-plus"></i></a>
              </div>
            </div>
            <!-- /Panel Heading -->
            <!-- Panel Body -->
            <div class="panel-body">
            	<!-- Tabel Guru -->
            	<table class="daftarsiswa table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
	            	<thead>
	            	<input class="form-control mb10 " type="text" name="cari" placeholder="Cari Guru">
	            		<tr>
	            			<th>No</th>
	            			<th>Nama Pengguna</th>
	            			<th>Nama</th>
	            			<th>Mengajar</th>
	            			<th>Tanggal Terdaftar</th>
	            			<th>Aksi</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            			<?=$tb_guru?>
	            	</tbody>
            	</table>
            	<!-- /Tabel Guru -->
            </div>
            <div class="panel-footer">
            	<ul class="pagination mt0 mb0 col-sm-6">
								<?php 
										echo $this->pagination->create_links();
								 ?>
							</ul>
							<div class="text-right col-sm-6"><a href="javascript:void(0);"><?=$jumlahGuru?> terdaftar</a></div>
            </div>
            <!-- /Panel Body -->
				</div>
				<!-- /Panel -->


			</div>
		</div>
	</div>
</section>
<!-- script event -->
<script type="text/javascript">
	function resetSandi(penggunaID='',namaPengguna='') {
		 url = base_url + "index.php/guru/resetPassword/";
		 var data;
	  swal({
	    title: "Yakin akan me-reset katasandi "+namaPengguna+"?",
	    text: "Anda tidak dapat membatalkan ini.",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Ya,Tetap me-reset katasandi!",
	    closeOnConfirm: false
	  },
	  function(){
	    var datas = {penggunaID:penggunaID,
	    							namaPengguna:namaPengguna};
	    $.ajax({
	      dataType:"text",
	      data:datas,
	      type:"POST",
	      url:url,
	      success:function(data){

	        swal("kata sandi baru : [namaPengguna]+[tgl sekarang] !", "Katasandi Baru = "+data, "success");
	       // window.location.href =base_url+"videoback/daftarvideo";
	      },
	      error:function(){
	        sweetAlert("Oops...", "Ktasandi gagal di reset!", "error");
	      }

	    });
	  });
	}
</script>