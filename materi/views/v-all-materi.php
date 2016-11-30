<section class="id="main" role="main"">
	<div class="container-fluid">
		<!-- Start row -->
		<div class="row">
			
			<div class="col-md-12">
				<!-- Start Panel -->
				<div class="panel panel-teal" >
				<!-- Start Pnel Heading -->
				<div class="panel-heading">
					<h3 class="panel-title">List Materi</h3>
					<!-- Start menu tambah materi -->
                        <div class="panel-toolbar text-right">
                            <a class="btn btn-inverse btn-outline" href="<?= base_url(); ?>index.php/materi/form_materi" title="Tambah Data" ><i class="ico-plus"></i></a>
                        </div>
                         <!-- END menu tambah materi -->

				</div>
				<!-- End Panel Heading -->
				<!-- Start Panel Body -->
				<div class="panel-body">
					<table class="table table-striped" id="zero-configuration" style="font-size: 12px" width="100%">
						<thead>
							<tr>
							<th>No</th>
								<th>Judul</th>
								<th>Tingkat</th>
								<th>Matapelajarn</th>
								<th>Bab</th>
								<th>Sub Bab</th>
								<th>Tanggal di buat</th>
								<th>Status</th>
								<th width="20%">Aksi</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<!-- END Panel Body -->
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	var  $list_materi;
	$(document).ready(function() {
		//#get list by id guru
		$list_materi = $('#zero-configuration').DataTable({ 
			"processing": true,
			"ajax": {
				"url": base_url+"index.php/materi/ajax_get_all_materi",
				"type": "POST"
			},
		});
		//##

	});

//# ketika tombol di klik
function detail(id){
	var kelas ='.detail-'+id;
	var data = $(kelas).data('id');
	var links;

	$('h3.modal-title').html(data.judulVideo);
	if (data.namaFile != null) {
		links = '<?=base_url();?>assets/video/' + data.namaFile;
		$('#video-ply').attr('src',links); 
		$('#mdetailvideo').modal('show');
	}else if(data.link != null){
		links = data.link;
		$('#video-ply-link').attr('src',links); 
		$('#mvideolink').modal('show');
	}else{

	}
	
}
//##

//# fungsi menghapus video
function drop_materi(UUID){
	if(confirm('Are you sure delete this data?')){
		$.ajax({
			url : base_url+"index.php/materi/del_materi/"+UUID,
			type: "POST",
			dataType: "TEXT",
			success: function(data)
			{
				console.log('success');
				reload_tblist();
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error deleting data');
			}
		});
	}
}
// fungsi updt


//fungsi reload table
function  reload_tblist(){
	$list_materi.ajax.reload(null,false);
}

</script>