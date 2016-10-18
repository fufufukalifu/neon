<div id="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5 class="panel-title">Video Yang Telah Anda Upload</h5>
		</div>
		<table class="table table-striped" id="zero-configuration" style="font-size: 14px">
			<thead>
				<tr>
					<th>ID</th>
					<th>Judul Video</th>
					<th>Nama File</th>
					<th>Deskripsi</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
		//#get list by id guru
		var  tblist_video;
		tblist_video = $('#zero-configuration').DataTable({ 
         "processing": true,
         "ajax": {
          "url": base_url+"index.php/videoBack/ajax_get_video_by_id_guru",
          "type": "POST"
        },
      });
		//##

      });

//# ketika tombol di klik
		function detail(id){console.log(id);
			var kelas ='.detail-'+id;
			var data = $(kelas).data('id');
			console.log(data);
		}
//##

//# fungsi menghapus video
	function dropvideo(id){

	}
</script>