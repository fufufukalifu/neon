 <!-- START ROW -->
 <div class="row">

  <div class="col-md-12">
   <!--START Panel  -->
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title"><?=$panelheading ?></h3>
    </div>
    <!-- Start Panel Body -->
    <div class="panel-body">
     <div class="row">
      <!--Start Container  -->
      <div class="container">
       <!-- Strat -->
       <div class="col-sm-11">
        <!-- start -->
        <div class="panel panel-default">
         <div class="panel-heading">
          <h3 class="panel-title">Daftar Soal</h3>
          <input type="text" name="id" id="id_paket" value="<?=$id_paket;?>" hidden="true">
         </div>
         <!-- Start -->
         <div class="panel-body">
          <form action="#" id="formsoal">
           <div class="form-group">
            <div class="col-sm-12">
             <div class="col-sm-2">
              Filter:
             </div>
             <div class="row">
              <div class="row-col-sm-12">
               <div class="col-sm-4">
                <select name="" id="tingkatID" class="form-control">
                 <option value="">Tingkat</option>
                </select>
               </div>
               <div class="col-sm-4">
                <select name="" id="pelajaranID" class="form-control">
                 <option value="">Pelajaran</option>
                </select>
                <br>
               </div>
              </div>
              <div class="col-sm-12">
               <div class="col-sm-2">

               </div>

               <div class="row">
                <div class="row-col-sm-12">
                 <div class="col-sm-4">
                  <select name="" id="babID" class="form-control">
                   <option value="">Bab</option>
                  </select>
                 </div>

                 <div class="col-sm-4">
                  <select name="" id="subBabId" class="form-control">
                   <option value="">Sub Bab</option>
                  </select>
                 </div>
                </div>
               </div>

              </div>
             </div>
            </div>
            <div class="col-sm-12">
             <br><br><br>
            </div>
            <div class="col-sm-12">
             <div class="col-sm-12">Soal:</div>
                <div class="col-md-12">
                  
                </div>
             <div class="col-sm-12">
              <form >
               <table class="table table-striped" id="oplistsoal"  style="font-size: 13px">
                <thead>
                 <tr>
                  <th>/</th>

                  <th>Judul Soal</th>
                  <th>Sumber</th>
                  <th>SOAL</th>
                  <th>Level</th>

                 </tr>
                </thead>

                <tbody class="soal">

                </tbody>
               </table>
              </form>
              <!-- START PESAN ERROR EMPTY INPUT -->
                  <div class="alert alert-dismissable alert-danger" id="emptyinput_op" hidden="true">
                    <button type="button" class="close" onclick="hide_msg_empty()" >×</button>
                    <strong>O.M.G.!</strong> Silahkan pilih soal yang akan ditambahkan ke paket.
                  </div>
                  <!-- END PESAN ERROR EMPTY INPUT -->
             </div>
             <div class="col-sm-12 btn">
              <div class="col-sm-2">
               <br>
               <input class="btn btn-primary tambahsoal" type="button" value="tambahkan soal"/>
              </div>
             </div>

            </div>
           </div>
          </form>

         </div>

         <!-- END -->

        </div>

        <!-- END -->
       </div>
       <!-- ENd -->

       <!-- Strat -->
       <div class="col-sm-11">
        <div class="panel panel-default">
         <div class="panel-heading">
          <h3 class="panel-title">Daftar Soal yang Telah di Tambahkan</h3>
         </div>
         <div class="panel-body soaltambah">
          <form action="" id="">
           <table class="table table-striped" id="tblist" style="font-size: 13px">
            <thead>
             <tr>
              <th>IDs</th>
              <th>Judul Soal</th>
              <th>Sumber</th>
              <th>SOAL</th>
              <th>Level</th>
              <th>Aksi</th>
             </tr>
            </thead>

            <tbody>

            </tbody>
           </table>

          </form>
         </div>
        </div>
       </div>
       <!-- END -->

      </div>
      <!-- END container -->
     </div>
    </div>
    <!-- END Panel Body -->
   </div>    
   <!--END Panel  -->
  </div>

 </div>
 <!-- END ROW --> 


 <script>
  //var untuk list soal yg sudah di add ke paket
  var tblist_soal;
  //var untuk list soal 
  var list_soal;
    // Script for getting the dynamic values from database using jQuery and AJAX
    $(document).ready(function() {

     var id_paket =$('#id_paket').val();
        // get tingkat drop down
        $('#TingkatID').change(function() {

         var form_data = {
          name: $('#TingkatID').val()
         };

         $.ajax({
          url: "<?php echo site_url('videoback/getPelajaran'); ?>",
          type: 'POST',
          data: form_data,
          dataType:'text',
          success: function(msg) {
           var sc='';
           $.each(msg, function(key, val) {
            sc+='<option value="'+val.id+'">'+val.keterangan+'</option>';
           });
           $("#pelajaranID option").remove();
           $("#pelajaranID").append(sc);
          }
         });
        });
        // get list soal 

        tblist_soal = $('#tblist').DataTable({ 

         "processing": true,

         "ajax": {
          "url": base_url+"index.php/paketsoal/ajax_listsoal/"+id_paket,
          "type": "POST"
         },

        });

        //hide pesan error empty input
         


       });

//hide pesan error empty input


//buat load tingkat
function loadTingkat(){
 jQuery(document).ready(function(){
  var tingkat_id = {"tingkat_id" : $('#tingkatID').val()};
  var idTingkat;

  $.ajax({
   type: "POST",
   data: tingkat_id,
   url: "<?= base_url() ?>index.php/videoback/getTingkat",

   success: function(data){
    $('#tingkatID').html('<option value="">Tingkat</option>');
    $.each(data, function(i, data){
     $('#tingkatID').append("<option value='"+data.id+"'>"+data.aliasTingkat+"</option>");
     return idTingkat=data.id;
     alert("asd");
    });
   }
  });

  $('#tingkatID').change(function(){
   tingkat_id={"tingkat_id" : $('#tingkat').val()};
   load_pelajaran($('#tingkatID').val());
   $('.soal').empty();
   $('pelajaranID').empty();
  });

  $('#pelajaranID').change(function(){
   pelajaran_id = {"pelajaran_id":$('#pelajaranID').val()};
   loadbab($('#pelajaranID').val());
   $('.soal').empty();
  });

  $('#babID').change(function(){
   bab_id = {"bab_id":$('#babID').val()};
   loadsubbab($('#babID').val());
   $('.soal').empty();
            // $('subbabID').empty();


           });


  $('#subBabId').change(function(){
             // console.log('cihuy');
             // alert('Pilih Bab Matapelajaran');
             $('.soal').empty();
             load_pelajaran(idTingkat);
             var idSubBab = $('#subBabId').val();
             if (idSubBab=="") {
              alert('Pilih Bab Matapelajaran');
             }else{
              addsoal(idSubBab);

             };
            });

  $('.tambahsoal').click(function(){
   tambahkansoal();
  });
 })};

    //buat load pelajaran
    function load_pelajaran(tingkatID){
     $.ajax({
      type: "POST",
      data: tingkatID.tingkat_id,

      url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/"+tingkatID,
      success: function(data){
       $('#pelajaranID').html('<option value="">Mata Pelajaran</option>');
       $.each(data, function(i, data){
        $('#pelajaranID').append("<option value='"+data.id+"'>"+data.keterangan+"</option>");
       });
      }
     });
    }
    //buat load bab
    function loadbab(mapelID){
        // var babID;
        $.ajax({
         type: "POST",
         url: "<?php echo base_url() ?>index.php/videoback/getBab/"+mapelID,
         success: function(data){

          $('#babID').html('<option value="">Bab Pelajaran</option>');
                //console.log(data);
                $.each(data, function(i, data){
                 $('#babID').append("<option value='"+data.id+"'>"+data.judulBab+"</option>");
                    // babid=data.id;
                   });
               } 

              });
        // return 
       }

    //load sub bab
    function loadsubbab(babID) {

     $.ajax({
      type: "POST",
      data: babID.bab_id,
      url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,
      success: function (data) {

       $('#subBabId').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');
               // console.log(data);
               $.each(data, function (i, data) {
                $('#subBabId').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");
               });
              }

             });
    }

    function addsoal(subBabId){

        list_soal = $('#oplistsoal').DataTable({ 
           "bServerSide": true,

           "ajax": {
            "url": base_url+"index.php/paketsoal/ajax_get_soal_by_subbabid/"+subBabId,
            "type": "POST"
        },
           "processing": true,
           
           "bDestroy": true,
        });
        

    }



       function tambahkansoal(){
        var idsoal = [];
        var idSubBab = $('#subBabId').val();
        var id_paket =$('#id_paket').val();

        $(':checkbox:checked').each(function(i){
         idsoal[i] = $(this).val();

        }); 
        console.log(idsoal);
        if (idsoal.length > 0) {
            var url = base_url+"index.php/paketsoal/addsoaltopaket";

          $.ajax({
           url : url,
           type: "POST",
           dataType:'text',
           data: {data:idsoal,
            idSubBab:idSubBab,
            id_paket:id_paket},

              // cache: false,
            // dataType: "JSON",
            success: function(data,respone)
            {   
                  console.log(respone);// for testing
                  // console.log(data);
                  reload_tblist();
                   $(':checkbox').attr('checked',false);

                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {

                   console.log(errorThrown);
                   console.log(textStatus);
                   console.log(jqXHR);
                   alert('Error adding / update data');
                  }
                 });
        } else {
          $("#emptyinput_op").show();
        }
  
       }
       function hide_msg_empty() {
           $("#emptyinput_op").hide();
        }
       function reload_tblist(){
        tblist_soal.ajax.reload(null,false); //reload datatable ajax 
       }

       function drop_soal(id)
       {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
             url : base_url+"index.php/paketsoal/dropsoalpaket/"+id,
             type: "POST",
             dataType: "JSON",
             success: function(data)
             {
                    //if success reload ajax table
                    // $('#modal_form').modal('hide');
                    reload_tblist();
                   },
                   error: function (jqXHR, textStatus, errorThrown)
                   {
                    alert('Error deleting data');
                   }
                  });

           }
          }
          
          loadTingkat();
         </script>