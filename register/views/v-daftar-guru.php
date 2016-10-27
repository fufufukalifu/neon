

<section id="main" role="main">

	<section class="container">

	<div class="panel panel-default">
    <!-- panel heading/header -->
    <div class="panel-heading">
        <h3 class="panel-title"><i class="ico-user"></i> Daftar Guru <a href="<?=base_url('register/registerGuru') ?>" class="btn btn-success"><i class="ico-user-plus"></i></a></h3>
        
    </div>
    <!--/ panel heading/header -->
    <!-- panel body with collapse capabale -->
    <div class="panel-collapse pull out">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" style="background: white"><br>
                    <table class="daftarguru table table-striped mt15" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Pengguna</th>
                                <th>Tanggal Daftar</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ panel body with collapse capabale -->
</div>

	</section>
	<script type="text/javascript">
		$(document).ready(function() {
			//load daftar guru.
			$('.daftarguru').DataTable({
				"ajax": {
					"url": "http://localhost/neon/index.php/guru/ajax_list_guru",
					"type": "POST"
				},
				"emptyTable":"Tidak Ada Data Guru",
				"info":"Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
			});


		});
	</script>