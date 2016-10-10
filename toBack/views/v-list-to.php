<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
    	<div class="row">
    		<div class="container">
    			<div class="panel panel-default">
                    <!--Start untuk menampilkan nama tabel -->
                    <div class="panel-heading">
                    	<h3>List Try Out</h3>
                    </div>
                    <div class="panel-body">
                    	<table class="table table-striped" id="zero-configuration" style="font-size: 13px">
                    		<thead>
                    			<tr>
                    				<th>ID</th>
                    				<th>Nama TO</th>
                    				<th>Tanggal Mulai</th>
                    				<th>Tanggal Berakhir</th>
                    				<th>Aksi</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			<?php foreach ($listTO as $row): ?>
                    				<tr>
                    					<td><?= $row['id_tryout']; ?></td>
                    					<td><?= $row['nm_tryout']; ?></td>
                    					<td><?= $row['tgl_mulai']; ?></td>
                    					<td><?= $row['tgl_berhenti']; ?></td>
                    					<td>
                    					<a class="btn btn-sm btn-primary" title="Edit" onclick="edit_to()"><i class="ico-file5"></i></a>
										<a class="btn btn-sm btn-success" title="Add Soal" href="<?= base_url()?>index.php/toback/addPaketTo/<?=$row['UUID']?>"><i class="ico-file-plus2"></i></a>
										<a class="btn btn-sm btn-danger" title="Hapus" onclick="delete_paket('6')"><i class="ico-remove"></i></a>
										</td>
                    				</tr>
                    			<?php endforeach ?>
                    		</tbody>
                    	</table>
                    </div>
                </div>
    			
    		</div>
    	</div>
    </div>
</section>