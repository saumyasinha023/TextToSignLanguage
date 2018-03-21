<!DOCTYPE html>
<html>
<head>
	<title>Text-to-Sign-Language</title>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='../English2ISLGenerator-master/css/one.css'>
	</script>
	
	<style>
.demo-card-wide.mdl-card {
  
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 300px;
  
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>
</head>
<body>



  <div id="toolbar" style="height:100px">
    
    <div id="title" style="font-size:30px;text-align:center;margin-left:450px">
      Text to Indian Sign Language Conversion
    </div>
  </div>
  <div id="content" data-0="padding-top: 192px;" data-192="padding-top: 190px;">
</div>


	<form action="" method="post" name="myform" id="myform">
	<div style="display:inline-block">
	<div class="demo-card-wide mdl-card" style="margin-top:100px;margin-left:400px;margin-right:50px;display:inline-block;">
	<div class="mdl-card__title" style="background: url('../English2ISLGenerator-master/img2.jpg')
  center / cover;">
	</div>
	<div class="mdl-card__actions mdl-card--border">
	<button type="submit" name="Video" formaction="videodemo.php" class="mdl-button mdl-js-button mdl-button--raised  mdl-button--colored mdl-js-ripple-effect " style="color:#fff; margin-top:100px;width:300px;text-align:center" >Video</button>
	</div>
	</div>
	
	
	<div class="demo-card-wide mdl-card" style="margin-top:100px;display:inline-block;">
	<div class="mdl-card__title" style="background: url('../English2ISLGenerator-master/img1.jpg')
  center / cover;">
	
	</div>
	<div class="mdl-card__actions mdl-card--border">
	<button type="submit" name="Animation" formaction="avatardemo.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect " style="color:#fff; margin-top:100px;width:350px" >Animation</button>
	</div>
	</div>
	</div>
	</form>
</body>
</html>