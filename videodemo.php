<?php

if(isset($_POST['username']))
{	
	$filename= $_POST['username'];
	$pyscript_video = 'video_convert.py';
	$pyscript_convert = 'convert2isl.py';
	$python='C:\\Users\\varda\\Miniconda3\\python.exe';
	$cmd = "$python $pyscript_convert $filename";
	$isl = exec("$cmd");
	echo("isl");
	$cmd = "$python $pyscript_video $isl";
	exec("$cmd");
	session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<link rel='stylesheet' href='../English2ISLGenerator-master/css/one.css'>
</head>
<body>
	<div id="toolbar" style="height:100px">
    
    <div id="title" style="font-size:30px;text-align:center;margin-left:450px">
      Text to Indian Sign Language Conversion
	  
    </div>
	<form>
	<button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" style="margin-left:1450px;margin-top:50px" formaction="main.php" >
	<i class="material-icons">home</i>
	</button>
	
	</form>
  </div>
  <div id="content" data-0="padding-top: 192px;" data-192="padding-top: 190px;" style="padding-bottom:50px">
</div>
	<?php
	if (isset($filename)){
	echo	'<center style="padding-top:30px">';
	echo	'<video width="1080" height="480" controls autoplay>';
	echo	'<source src="my_concatenation.mp4" type="video/mp4">';
	echo	'Your browser does not support the video tag.';
	echo	'</source></video>';
	echo	'</center>';
	echo '<br>';
	echo '<br>';
	echo '<center><a href="http://localhost/proj/English2ISLGenerator-master/videodemo.php" target="_blank">Try converting other text to Video </a></center>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo 'VARDAN';
	$vars = array_keys(get_defined_vars());
	foreach($vars as $var) {
    unset(${"$var"});
}
	}	?>
	
	</br>
	</br>
	</br>
	<form action="" method="post" name="myform" id="myform">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="padding-left:20px;margin-left:550px">
  	<INPUT class="mdl-textfield__input" TYPE = "Text" NAME = "username" >
  	<label class ="mdl-textfield__label" for="inputText" style="font-size:20px;padding-left:20px">English text:  <?php if(!empty($_POST['username'])){echo $isl;}?> </label>
  	<button type="submit"class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored " id="Video" style="margin-left:300px;background-color:#01579B;padding:10px">
	<i class="material-icons" >arrow_forward</i>
	</button>
	</div>
	<br>
	
	
	</form>

	</body>
</head>