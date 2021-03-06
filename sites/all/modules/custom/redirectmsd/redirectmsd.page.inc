<? function redirectmsd_page($redirectid) { ?>

	<html>
	<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/sites/all/themes/msd2014/css/msd2014.css" media="all" />
	</head>
	
	<body id="rmsd_lightbox">
	
	<style style="text/css">
	html {
	    background-color: #FFFFFF;
	}
	
	body {
		padding:0;
		margin:0;
		background-color: #FFFFFF;
	}
	
	ul {
		list-style-type:disc;
		margin-left:40px;
	}
	
	.top-level {
	    background-color: #E6E6E6;
	    margin-bottom: 2px;
	    margin-left: -10px;
	    padding: 5px 0 5px 20px;
	}
	
	#rmsd_image_holder { margin-left:5px; }
	
	h5,h4,h3,h2,h1 { margin-left:10px; }
	p { margin-left: 10px; }
	input { margin-left:10px;}
	</style>

	<?php
	$result = db_query('SELECT n.id, n.name, n.caption, n.option1, n.option2, n.redirect1, n.redirect2 FROM {redirectmsd} n WHERE n.id = :id', array(':id' => $redirectid));
	$record = $result->fetchObject();
	
	if(!is_object($record)) {
		return;
	}
	?>
	
	<div id="rmsd_image_holder">
		<div class="content">
    		<p id="msd-logo-white"><a href="/"><img src="/sites/default/files/white_logo.jpg" alt="MSD logo"></a></p>
		</div>
	</div>

    <p id="redirect_caption"><?php print $record->caption; ?></p>
	    
	<form action="#" name="myForm" onsubmit="return validate();">
            
        <? if(strlen($record->option1) > 0 && strlen($record->option2) > 0) { ?> 			
			<input type="radio" name="option" id="option1" value="<?php print $record->option1; ?>"><span id="rmsd_opt"><?php print $record->option1; ?></span><br />
		<? } ?> 
		
		<? if(strlen($record->option2) > 0) { ?>
			<input type="radio" name="option" id="option2" value="<?php print $record->option2; ?>"><span id="rmsd_opt"><?php print $record->option2; ?></span><br /><br />
		<? } ?>
		
        <? if(
			strlen($record->option1) > 0 &&
			strlen($record->option2) == 0
		) { ?>
			<input type="submit" value="Continue" />
		<? } else { ?> 
			<input type="submit" value="Submit" />
		<? } ?>
		
	</form>
	
	<script type="text/javascript">
	function validate() {

		<? if(
				strlen($record->option1) > 0 &&
				strlen($record->option2) == 0
		) { ?>
			location.href="<?php print $record->redirect1; ?>";
		<? } else { ?>
		
		    if(document.getElementById('option1').checked) {
				location.href="<?php print $record->redirect1; ?>";
			}	
			
			if(document.getElementById('option2').checked) {
	     		location.href="<?php print $record->redirect2; ?>";
			}

		<? } ?>
		
		return false;
		
	}
	</script>

	</body>
	</html>
	<?
}
?>