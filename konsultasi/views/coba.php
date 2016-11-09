<!DOCTYPE html>
<html>
<head>
	<title>Percobaan</title>
</head>
<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery.min.js') ?>"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript">
	base_url = "<?=base_url() ?>";
	$(document).ready(function(){
		url = base_url +"konsultasi/search2/6";
		var countries = [
		{ value: 'Andorra'},
   		{ value: 'Zimbabwe'}
   ];
   console.log(countries);

   $('#search').autocomplete({
   	source: url,
   	select: function (suggestion) {
        // alert(suggestion);		
        console.log(suggestion);
    }
   });
});
</script>
<body>
	<input type="text" name="namapertanyaan" id="search">
</body>
</html>