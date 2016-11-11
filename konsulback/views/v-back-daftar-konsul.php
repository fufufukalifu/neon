        <section id="main" role="main">
          <!-- START Template Container -->
          <div class="container-fluid">
            <div class="col-md-12">
              <!-- section header -->
                     <!--    <div class="section-header mb15">
                            <h5 class="semibold">Justified Tabs</h5>
                          </div> -->
                          <!--/ section header -->
                          <!-- tab -->
                          <ul class="nav nav-tabs ">
                            <li class="active"><a href="#tabone2" data-toggle="tab">Pertanyaan Saya</a></li>
                            <!-- <li><a href="#tabtwo2" data-toggle="tab">Pertanyaan Setingkat</a></li> -->
                            <li><a href="#tabthree2" data-toggle="tab">Semua Pertanyaan</a></li>
                          </ul>
                          <!--/ tab -->
                          <!-- tab content -->
                          <div class="tab-content panel">
                            <div class="tab-pane active" id="tabone2">
                              <!-- Start Pencarian tab 3 -->
                              <form action="" role="search">
                               <div class="has-icon">
                                <input type="text" class="form-control" placeholder="Search Pertanyaan...">
                                <i class="ico-search form-control-icon"></i>
                              </div>
                            </form>
                            <hr>
                            <!-- END Pencarian tab3 -->
                            <!-- Start data pertanyaan guru-->
                            <div class='main_div'>
                                <ul class="load_content" id="load_more_ctnt">
                                   
                                   <?php foreach ($questions as $row):
                                   
                                        $id=$row['pertanyaanID'];

                                        $message=$row['isiPertanyaan'];
                                        ?>
                                        <li>
                                            <a href="#"><?php echo $message; ?>
                                                
                                            </a>
                                        </li>
                                       <?php endforeach ?>
                                    </ul>
                                    <div class="more_div">
                                        <a href="#">
                                            <div id="load_more_<?php echo $id; ?>" class="more_tab">
                                                <div class="more_button" id="<?php echo $id; ?>">Load More Content
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                          <!-- End data oertanyaan guru -->
                        </div>
                        <!-- Tab Semua Konsultasi -->
                        <!-- <div class="tab-pane" id="tabtwo2"> -->
                        <!-- Start Pencarian tab 3 -->
                        <!--     <form action="" role="search">
                               <div class="has-icon">
                                <input type="text" class="form-control" placeholder="Search Pertanyaan...">
                                <i class="ico-search form-control-icon"></i>
                              </div>
                            </form> -->
                            <!-- END Pencarian tab3 -->

                            <!-- </div> -->
                            <div class="tab-pane" id="tabthree2">
                              
                             <!-- Start Koneten -->
                             <!-- Start Pencarian tab 3 -->
                             <form action="" role="search">
                               <div class="has-icon">
                                <input type="text" class="form-control" placeholder="Search Pertanyaan...">
                                <i class="ico-search form-control-icon"></i>
                              </div>
                            </form>
                            <!-- END Pencarian tab3 -->

                            <hr>
                            <!--  -->
                            <!--Start data Semau  pertanyaan -->
                            <div class='main_div'>
                                <ul class="load_content" id="load_more_ctnt1">
                                   
                                   <?php foreach ($my_questions as $value):
                                   
                                        $id1=$row['pertanyaanID'];

                                        $message1=$row['isiPertanyaan'];
                                        ?>
                                        <li>
                                            <a href="#"><?php echo $message1; ?>
                                                
                                            </a>
                                        </li>
                                       <?php endforeach ?>
                                    </ul>
                                    <div class="more_div">
                                        <a href="#">
                                            <div id="load_more1_<?php echo $id1; ?>" class="more_tab">
                                                <div class="more_button1" id="<?php echo $id1; ?>">Load More Content
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                          <!--END data Semau  pertanyaan -->

                          <!--  -->
                          <!-- End Konten -->
                        </div>
                      </div>
                      <!--/ tab content -->
                    </div>
                  </div>
                </section>
                <script type="text/javascript">
                  $(function() {
                    
                    $('.more_button').live("click",function() 
                    {
                      var url = base_url+"index.php/konsulback/moreallsoal";
                      var getId = $(this).attr("id");
                      if(getId)
                      {
                        $("#load_more_"+getId).html('<img src="load_img.gif" style="padding:10px 0 0 100px;"/>');  
                        $.ajax({
                          type: "POST",
                          url: url,
                          data: "getLastContentId="+ getId, 
                          cache: false,
                          success: function(html){
                            $("ul#load_more_ctnt").append(html);
                            $("#load_more_"+getId).remove();
                          }
                        });
                      }
                      else
                      {
                        $(".more_tab").html('The End');
                      }
                      return false;
                    });
                    // load more pertanyaan berdasarkan keahlian guru
                    $('.more_button1').live("click",function() 
                    {
                      var url = base_url+"index.php/konsulback/moremapelsoal";
                      var getId = $(this).attr("id");
                      if(getId)
                      {
                        $("#load_more_"+getId).html('<img src="load_img.gif" style="padding:10px 0 0 100px;"/>');  
                        $.ajax({
                          type: "POST",
                          url: url,
                          data: "getLastContentId="+ getId, 
                          cache: false,
                          success: function(html){
                            $("ul#load_more_ctnt1").append(html);
                            $("#load_more1_"+getId).remove();
                          }
                        });
                      }
                      else
                      {
                        $(".more_tab").html('The End');
                      }
                      return false;
                    });
                  });

                </script>