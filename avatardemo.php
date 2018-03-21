<!DOCTYPE html>
<?php

if(isset($_POST['englishtext']))
{
    
    $isl = "";
    $pyscript = 'convert2isl.py';
    $python='C:\\Users\\varda\\Miniconda3\\python.exe';
    $englishinput = $_POST['englishtext'];
    $cmd = "$python $pyscript $englishinput";
	
    $isl = exec("$cmd");

}

?>
<html>
    <head>
    	<?php require_once("include.php"); ?>
        <title>ISL : Avatar Page</title>
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
        <meta http-equiv="Access-Control-Allow-Methods" content="GET">
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<link rel='stylesheet' href='../English2ISLGenerator-master/css/one.css'>
        <link rel="stylesheet" href="css/cwasa.css" />
        <script type="text/javascript" src="js/allcsa.js"></script>
        <script language="javascript">
			// Initial configuration
			var initCfg = {
				"avsbsl" : ["luna", "siggi", "anna", "marc", "francoise"],
				"avSettings" : { "avList": "avsbsl", "initAv": "marc" }
				};
				
			// global variable to store the sigmal list
			var sigmlList = null;

            // global variable to tell if avatar is ready or not
            var tuavatarLoaded = false;
		</script>
    </head>
    <body onload="CWASA.init(initCfg);" style="margin-top:0!important;">
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
<div style="padding-top:80px">
    <div id="loading" class="container"><div class="row text-center"><span style="background-color:#ebf8a4; padding: 8px 20px;">Loading ... Please wait...</div></div></div>
        <!-- left side division starts here -->
		<div style="width:40%; padding:15px; float:left; margin-left:14%;">

	
<form action="" method="post" name="myform" id="myform">
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
<input class="mdl-textfield__input" type = "Text" name = "englishtext" style="margin-bottom:5px">
<label class ="mdl-textfield__label" for="inputText" style="font-size:20px;">English text: </label>

<button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored " id="parseisl" style="margin-left:300px;background-color:#01579B;padding:10px">
<i class="material-icons" >arrow_forward</i>
</button>
</div>

</form>
<label class="mdl-textfield__input" for="inputText">The text to animate:  <?php if(!empty($_POST['englishtext'])){ echo $isl;}?> </label><br>
<button type="button" class="btn btn-primary" onclick="yahoo();" id="a">Generate Play Sequence</button>
<button type="button" id="btnClear" class="btn btn-default">Clear</button>


</div>
<div id="dom-target" style="display: none;">
    <?php 
        //$output = "42"; //Again, do some operation, get the output.
        echo htmlspecialchars($isl); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
    ?>
</div>

<div id="menu2">
<br>
Words will be displayed here
</div>

<div id="menu3">
<br>
Alphabets will be displayed here
</div>

<div id="menu4">
<br>
Number will be displayed here
</div>


		</div> <!-- left side division ends here -->
<script language="javascript" src="js/animationPlayer.js"></script>		
		<?php 
			// This is the main player where the animation happens	
			include_once("animationPlayer.php"); 
		?>


<script type="text/javascript" src="js/player.js"></script>
<script type="text/javascript">
/*
	Load json file for sigml available for easy searching
*/
$.getJSON("js/sigmlFiles.json", function(json){
    sigmlList = json;
});

// code for clear button in input box for words
$("#btnClear").click(function() {
	$("#inputText").val("");
    $("#debugger").html("");
});

// code to check if avatar has been loaded or not and hide the loading sign
var loadingTout = setInterval(function() {
    if(tuavatarLoaded) {
        $("#loading").hide();
        clearInterval(loadingTout);
        console.log("Avatar loaded successfully !");
    }
}, 1000);


// code to animate tabs

alltabhead = ["menu1-h", "menu2-h", "menu3-h", "menu4-h"];
alltabbody = ["menu1", "menu2", "menu3", "menu4"];

function activateTab(tabheadid, tabbodyid)
{
    for(x = 0; x < alltabhead.length; x++)
        $("#"+alltabhead[x]).css("background-color", "white");
    $("#"+tabheadid).css("background-color", "#d5d5d5");
    for(x = 0; x < alltabbody.length; x++)
        $("#"+alltabbody[x]).hide();
    $("#"+tabbodyid).show();
}

activateTab("menu1-h", "menu1"); // activate first menu by default

</script>

    </body>
</html>
