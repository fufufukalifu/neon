<!-- TABEL KONTEN 1 . FORM LEARNINGNLINE -->
<div class="row">
 <div class="col-md-12">
  <div class="panel panel-default">
   <div class="panel-heading">
    <!-- <h3 class="panel-title">Tambah Learning Topik</h3> -->
     <div class="toolbar">
    <br>

      <ol class="breadcrumb breadcrumb-transparent nm">
        <li><span><a href="<?=base_url('learningline')?>"><i class="ico-list"></i></a></span></li>

        <li><span>{tingkat}</span></li>
        <li>{mapel}</li>
        <li>{bab}</li>   
        <li class="active"><a href="#">{judul}</a></li>        

      </ol><br>
    </div>
  </div>
  <div class="panel-body">
  <input type="hidden" name="topikID" value="{topikID}">
    <!-- Start Body modal -->
    <form  class="panel panel-default form-horizontal form-bordered form-topik"  method="post" >
     <div  class="form-group">
      <label class="col-sm-3 control-label">Tingkat</label>
      <div class="col-sm-8">

       <!-- stkt = soal tingkat -->
       <input type="text" disabled="true" name="tingkat" value="{tingkat}" class="form-control">
     </div>
   </div>

   <div  class="form-group">
    <label class="col-sm-3 control-label">Mata Pelajaran</label>
    <div class="col-sm-8">
     <input type="text" disabled="true" name="mapel" value="{mapel}" class="form-control">
   </div>
 </div>

 <div  class="form-group">
  <label class="col-sm-3 control-label">Bab</label>
  <div class="col-sm-8">
   <input type="text" class="form-control" disabled="true" name="bab" value="{bab}">

   <input type="hidden" name="select_bab" value="{id}">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Nama Topik</label>
  <div class="col-sm-8">

   <input type="text" class="form-control" name="nama_topik" value="{judul}">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Urutan</label>
  <div class="col-sm-8">

   <input type="text" class="form-control" name="urutan" value="{urutan}">
 </div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Status</label>
  <div class="col-sm-8">
   <span class="radio custom-radio-primary">  
    <input type="radio" id="radio1" value="1" name="status"checked>  
    <label for="radio1">&nbsp;&nbsp;Published</label>   
  </span>
  <span class="radio custom-radio-primary">  
    <input type="radio" id="radio2" value="0" name="status">  
    <label for="radio2">&nbsp;&nbsp;Non Published</label>   
  </span>
</div>
</div>

<div  class="form-group">
  <label class="col-sm-3 control-label">Deskripsi</label>
  <div class="col-sm-8">
    <textarea class="form-control" name="deskripsi">{deskripsi}</textarea>
  </div>
</div>

<div class="form-group no-border">
  <label class="col-sm-3 control-label"></label>
  <div class="col-sm-9">
   <a class="btn btn-primary update_topik">Update</a>
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
