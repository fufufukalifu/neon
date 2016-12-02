<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
   <div class="panel-heading">
    <h3 class="panel-title">Tambah Learning Step</h3>
    <div class="panel-toolbar text-right">
      <a class="btn btn-success" 
      href="<?= base_url(); ?>index.php/learningline" 
      title="Lihat Topik" ><i class="ico-th-list"></i></a>
    </div> 
  </div>
  <div class="panel-body">
    <!-- Start Body modal -->
    <form  class="panel panel-default form-horizontal form-bordered form-topik"  method="post" >
     <div  class="form-group">
      <label class="col-sm-3 control-label">Nama Topik</label>
      <div class="col-sm-8">
       <!-- stkt = soal tingkat -->
       <input type="text" class="form-control" name="urutan" value="{namaTopik}" disabled="true">
       <input type="hidden" class="form-control" name="id" value="{id}" disabled="true">

     </div>
   </div>

   <div  class="form-group">
    <label class="col-sm-3 control-label">Urutan</label>
    <div class="col-sm-8">
     <!-- stkt = soal tingkat -->
     <input type="text" class="form-control" name="urutan">
   </div>
 </div>

 <div  class="form-group">
  <label class="col-sm-3 control-label">Nama Step</label>
  <div class="col-sm-8">
    <input type="text" class="form-control" name="namastep">
  </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Jenis Step</label>
  <div class="col-sm-8">
    <select class="form-control" name="select_jenis">
      <option value="0">-- Pilih Jenis Step --</option>
      <option value="1">Video</option>
      <option value="2">Materi</option>
      <option value="3">Latihan</option>
    </select>
  </div>
</div>

<div  class="form-group jenis container-fluid">
  <h4 class="text-center">Pilih Jenis Terlebih Dahulu</h4>

</div>

<div class="form-group no-border">
  <div class="col-sm-1"></div>
  <div class="col-sm-11">
   <a class="btn btn-primary simpan_step">Simpan</a>
   <button type="reset" class="btn btn-danger reset">Reset</button>
 </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
