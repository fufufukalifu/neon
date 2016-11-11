<?php
// include "dbConfig.php";

// if(isSet($_POST['getLastContentId']))
// {
// $getLastContentId=$_POST['getLastContentId'];
// $result=mysql_query("select id, isiPertanyaan from tb_k_pertanyaan where id <".$getLastContentId." order by id desc limit 1");
// $count=mysql_num_rows($result);
// if($count>0){
foreach ($moreask1 as $row):
	
	$id=$row['pertanyaanID'];

$message1=$row['isiPertanyaan'];
?>
<li>
<a href="#"><?php echo $message1; ?></a>
</li>
<?php endforeach ?>

<a href="#"><div id="load_more1_<?php echo $id; ?>" class="more_tab">
<div id="<?php echo $id; ?>" class="more_button1">Load More Content</div></a>
</div>

<?php
// } else{
// echo "<div class='all_loaded'>No More Content to Load</div>";
// }
// }
?>
