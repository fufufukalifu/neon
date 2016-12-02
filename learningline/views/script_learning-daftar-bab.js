<script>
//load table
$(document).ready(function () {
	tabel = $(kelas).DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
	});
});

//update data
function updatestatus(id,status){
	var url;
	if (status==1) {
		url = base_url+"learningline/updatepasive/"+id;
	}else{
		url = base_url+"learningline/updateaktiv/"+id;		
	}

	swal({
		title: "Anda Akan Merubah status learning?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya, update",
		cancelButtonText: "Tidak, batalan",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
		if (isConfirm) {
			$.ajax({
				url:url,
				dataType:"TEXT",
				type:'POST',
				success:function(){
					swal("Berhasil diupdate!", "status learning diaktifkan.", "success");
					tabel.ajax.reload(null,false);
				},
				error:function(){
					swal('gagal');
				}}
				);
		} else {
			swal("Dibatalkan", "Data batal diperbaharui", "error");
			tabel.ajax.reload(null,false);

		}
	});
}
function detail_topik(data){
	$('.detail_step').modal('show');
	judul = " <h4 class='modal-title' style='display: inline'>Daftar Step</h4>";
	$('.detail_step .modal-header').html(judul);
	$(".detail_step a").attr("href", base_url+"learningline/formstep/"+data);

	var url = base_url+"learningline/ajax_list_ge_step/"+data;
	dataTableLearning = $('.daftarstep').DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
		"bDestroy": true,

	});
}

//detail bab
function detail_bab(data){
	$('.detail_topik').modal('show');
	judul = " <h4 class='modal-title' style='display: inline'>Daftar Topik</h4>";
	$('.detail_topik .modal-header').html(judul);
	$(".detail_topik a").attr("href", base_url+"learningline/formtopik/"+data);
	var url = base_url+"learningline/ajax_get_list_topik/"+data;
	dataTableLearning = $(kelasDTLearning).DataTable({
		"ajax": {
			"url": url,
			"type": "POST"
		},
		"emptyTable": "Tidak Ada Data Pesan",
		"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
		"bDestroy": true,

	});

}


/*## -----------------------------Drop Learning-------------------------------##*/
function drop_topik(idtopik){
	url = base_url+"learningline/drop_topik";
	swal({
		title: "Yakin akan hapus Topik?",
		text: "Jika anda menghapus topik, step juga akan terhapus",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya,Tetap hapus!",
		closeOnConfirm: false
	},
	function(){
		var datas = {id:idtopik};
		$.ajax({
			dataType:"text",
			data:datas,
			type:"POST",
			url:url,
			success:function(){
				swal("Terhapus!", "Topik berhasil dihapus.", "success");
				tabel.ajax.reload(null,false);
			},
			error:function(){
				sweetAlert("Oops...", "Data gagal terhapus!", "error");
			}

		});
	});
}
/*## -----------------------------Drop Learning-------------------------------##*/


/*## -----------------------------Update Status bab Learning-------------------------------##*/
function update_learning_bab(id,status){
	var url;
	if (status==1) {
		url = base_url+"learningline/updatepasive_bab/"+id;
	}else{
		url = base_url+"learningline/updateaktiv_bab/"+id;		
	}

	swal({
		title: "Anda Akan Merubah status learning?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Ya, update",
		cancelButtonText: "Tidak, batalan",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
		if (isConfirm) {
			$.ajax({
				url:url,
				dataType:"TEXT",
				type:'POST',
				success:function(){
					swal("Berhasil diupdate!", "status learning diaktifkan.", "success");
					tabel.ajax.reload(null,false);
				},
				error:function(){
					swal('gagal');
				}}
				);
		} else {
			swal("Dibatalkan", "Data batal diperbaharui", "error");
			tabel.ajax.reload(null,false);

		}
	});
}
/*## -----------------------------Update Status bab Learning-------------------------------##*/

</script>