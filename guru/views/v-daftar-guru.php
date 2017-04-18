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
	            			<th>Email</th>
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
<!-- Modal form ubah email -->
<div class="modal fade" id="modal-chEmail">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal header -->
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

				<h4 class="modal-title">Ubah Email</h4>

			</div>
			<!-- /Modal Header -->
			<div class="modal-body">
				<input class="form-control" type="email" name="email" value="">
				<input class="form-control" type="penggunaID" name="penggunaID" value="" hidden="true">
			</div>
			<!-- Modal Body -->

			<!-- /Modal Body -->

			<!-- Modal Footer -->
			<div class="modal-footer">
				<button class="btn btn-success" onclick="updateEmail()">Simpan Perubahan</button>
			</div>
			<!-- /Modal Footer -->
		</div>
	</div><
</div>
<!-- /Modal form ubah email -->
<!-- Modal form ubah data guru -->
<div class="modal fade" id="modal-chguru">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!-- Modal header -->
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span>

				</button>

				<h4 class="modal-title">Detail Data Guru</h4>

			</div>
			<!-- /Modal Header -->
			<div class="modal-body">
				<form class="form-bordered">
				 <div class="form-group">
				 	<input type="text" name="guruID" value="" class="form-control col-md-6"/>
					<label>Nama Depan</label>
					<input type="text" name="namaDepan" value="" class="form-control col-md-6"/> 
				</div>
				 <div class="form-group">
					<label>Nama Belakang</label>
					<input type="text" name="namaBelakang" value="" class="form-control col-md-6" />
				</div>
				
				 <div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" value="" class="form-control col-md-6" />
				</div>
				
				 <div class="form-group">
					<label>No Kontak</label>
					<input type="text" name="nokontak" value="" class="form-control col-md-6" />
				</div>
				
				 <div class="form-group">
					<label>Biografi</label>

					<textarea type="text" name="biografi" value="" class="form-control col-md-6" ></textarea>
				</div>
				</form>
			
			</div>
			<!-- Modal Body -->

			<!-- /Modal Body -->

			<!-- Modal Footer -->
			<div class="modal-footer">
				<button class="btn btn-success" onclick="updateDatGuru()">Simpan Perubahan</button>
			</div>
			<!-- /Modal Footer -->
		</div>
	</div>
</div>
<!-- /Modal form ubah data guru -->

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

	function modalChEmail(penggunaID='',email='') {
		$('#modal-chEmail').modal('show');
		$('[name=email]').val(email);
		$('[name=penggunaID]').val(penggunaID);
	}

	function updateEmail() {
		var newEmail=$('[name=email]').val();
		var penggunaID=$('[name=penggunaID]').val();
		console.log(newEmail);

		url = base_url + "index.php/guru/updateEmail/";
		 var data;
	  swal({
	    title: "Yakin akan mngubah Email "+penggunaID+"?",
	    text: "Anda tidak dapat membatalkan ini.",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Ya,Tetap menyimpan perubahan Email!",
	    closeOnConfirm: false
	  },
	  function(){
	    var datas = {penggunaID:penggunaID,
	    							email:newEmail};
	    $.ajax({
	      dataType:"text",
	      data:datas,
	      type:"POST",
	      url:url,
	      success:function(data){

	        swal("Email berhasil diperbaharui !", "Email Baru = "+data, "success");
	       // window.location.href =base_url+"videoback/daftarvideo";
	      },
	      error:function(){
	        sweetAlert("Oops...", "Email gagal diperbaharui!", "error");
	      }

	    });
	  });
	}
	
	function detail(n) {
		$("#modal-chguru").modal('show');
		var id = "#data-"+n;
		var datas = $(id).data('todo');
		$('[name=guruID]').val(datas.guruID);
		$('[name=namaDepan]').val(datas.namaDepan);
		$('[name=namaBelakang]').val(datas.namaBelakang);
		$('[name=alamat]').val(datas.alamat);
		$('[name=nokontak]').val(datas.noKontak);
		$('[name=biografi]').val(datas.biografi);
		
	}

	function updateDatGuru() {
		var guruID = $('[name=guruID]').val();
		var namaDepan = $('[name=namaDepan]').val();
		var namaBelakang = $('[name=namaBelakang]').val();
		var alamat = $('[name=alamat]').val();
		var nokontak = $('[name=nokontak]').val();
		var biografi = $('[name=biografi]').val();
		url = base_url + "index.php/guru/updateDatGuru/";
		var datas = {	guruID:guruID,
									namaDepan:namaDepan,
	    						namaBelakang:namaBelakang,
	    						alamat:alamat,
	    						nokontak:nokontak,
	    						biografi:biografi
	    						};
	    $.ajax({
	      dataType:"text",
	      data:datas,
	      type:"POST",
	      url:url,
	      success:function(data){

	        swal("Data Guru berhasil diperbaharui!","--","success");
	      },
	      error:function(){
	        sweetAlert("Oops...", "Data Guru gagal diperbaharui!", "error");
	      }

	    });

	}


</script>