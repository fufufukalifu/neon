<?php
// include "dbConfig.php";

// if(isSet($_POST['getLastContentId']))
// {
// $getLastContentId=$_POST['getLastContentId'];
// $result=mysql_query("select id, isiPertanyaan from tb_k_pertanyaan where id <".$getLastContentId." order by id desc limit 1");
// $count=mysql_num_rows($result);
// if($count>0){
foreach ($moreask as $row):
                                   
                                        $id=$row['pertanyaanID'];

                                        $message=$row['isiPertanyaan'];
?>
<li>
<a href="#"><?php echo $message; ?></a>
</li>
<?php endforeach ?>

<a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
<div id="<?php echo $id; ?>" class="more_button">Load More Content</div></a>
</div>

<?php
// } else{
// echo "<div class='all_loaded'>No More Content to Load</div>";
// }
// }
?>
