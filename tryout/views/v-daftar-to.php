<style type="text/css">
  .dataTables_filter input{
display: inline-block;
    background-color: #ffffff;
    line-height: 40px;
    height: 40px;
    padding: 0 18px;
    border: #f27c66 2px solid;
  }

    .dataTables_length select{
display: inline-block;
    background-color: #ffffff;
    line-height: 40px;
    height: 40px;
    padding: 0 18px;
    border: #f27c66 2px solid;
  }


</style>
<!-- START Blog Content -->
<section class="section bgcolor-white"> 
  <div class="container">
   <!-- START Row -->
   <div class="row">
    <h3>Daftar Tryout</h3>
      <form action="" id="">
       <table class="table" id="zero-configuration" style="font-size: 13px">
        <thead>
         <tr>
          <th>ID Tryout</th>
          <th>Nama Tryout</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>

      </tbody>
    </table>

    </form>
</div>
</div>

</section>


</section>
<!--/ END Template Main -->
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables.min.js') ?>"></script>
<script type="text/javascript">
  function kerjakan_to(id){
    var kelas = "#btn-"+id;
    var datas = $(kelas).data('todo');
    console.log(datas);
  }

  $(document).ready(function() {
   var tblist_soal = $('#zero-configuration').DataTable({ 

     "processing": true,

     "ajax": {
      "url": base_url+"index.php/tryout/ajax_get_tryout",
      "type": "POST"
    },

  });
 });
</script>
