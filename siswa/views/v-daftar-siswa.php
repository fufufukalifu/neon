

<section id="main" role="main">

	<section class="container">

		<div class="row">
			<div class="col-md-10 data-offset=2" style="background: white"><br>
				<table class="daftarguru table table-striped mt15" style="font-size: 13px">
					<thead>
						<tr>
							<th>no</th>
							<th>Id siswa</th>
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

	</section>
	<script type="text/javascript">
		$(document).ready(function() {
			url = base_url+"siswa/ajax_daftar_siswa";
			$('.daftarguru').DataTable({
				"ajax": {
					"url": url,
					"type": "POST"
				},
				"emptyTable":       "Tidak Ada Data Siswa",
				"info":             "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
			});

		});
	</script>