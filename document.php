
<?php

session_start();
include 'connect.php';

$email=$_SESSION['user'];

$fetch=$connection->query("SELECT * FROM user_regis WHERE email='$email'");

$fetch1=mysqli_fetch_array($fetch);

$name=$fetch1['name'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>Navigus docs</title>
	
	<style type="text/css">
	*
	{
		margin: 0px;
		padding: 0px;

	}
	#edit {
		height: 400px;
		width: 98%;
		border: 1px solid black;
		margin-left: 1%;
		background: #fcedee;
	}

	.main
	{
		margin-top: 10px;
		position: static;
		
	}

	.header{
		height: 100px;
		width: 100%;
		background: linear-gradient(to right, rgba(255,0,0,.5),rgb(66, 135, 245.5));
	}
	
	#Share{
		background: rgba(252, 53, 100);
		color: white;
		padding: 10px;
		font-size: 30px;
		border: 1px solid red;
		border-radius: 10px;
		position: absolute;
		margin-top: 1.5%;
		margin-left: 73%;

	}
	.imga {
	  position: absolute;
	  display: inline-block;
	  margin-top: 1%;
	  margin-left: 82%;
	}

	.imga .getname {
	  visibility: hidden;
	  width: 130px;
	  background: rgba(252, 139, 150);
	  color: black;
	  text-transform: uppercase;
	  text-align: center;
	  border-radius: 8px;
	  padding: 5px 0;
	  position: absolute;
	  z-index: 1;
	  margin-left: -30px;
	 
	}

	.imga .getname::after {
	  content: "";
	  position: absolute;
	  bottom: 100%;
	  left: 50%;
	  margin-left: -5px;
	  border-width: 5px;
	  border-style: solid;
	  border-color: transparent transparent black transparent;
	}

	.imga:hover .getname {
	  visibility: visible;
	}

	#save{ 
	  margin-left: 87%; 
	  color:white; 
	  margin-top: 1%;
	  background:red; 
	  font-size: 26px;
	  padding:3px 10px; 
	  border-radius: 10px;
	  border: 1px solid red;

	}
	#save:hover
	{
		 box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	}

	</style>
	<script type="text/javascript">
	function saveEdits() {

	var editElem = document.getElementById("edit");

	var userVersion = editElem.innerHTML;

	localStorage.userEdits = userVersion;

	document.getElementById("update").innerHTML="Edits saved!";

	}
	function checkEdits() {

	if(localStorage.userEdits!=null)
		document.getElementById("edit").innerHTML=localStorage.userEdits;
	}
	</script>
</head>
<body onload="checkEdits()">

<div class="header">
	<img src="dd.jpg" style="height: 80px; width: 120px; margin-left: 1%;margin-top: .75%;">
	<input type="button" name="" value="Share" id="Share">
	<div class="imga"><img src="images.png" style="height: 60px; width: 60px; border-radius: 50%;">
		<span class="getname"><?php echo $name;?></span>
	</div>
</div>


<div class="main">
	<h3 style="font-weight: bold; margin-left: 1%; color: #fc7c80">This file is editable by only the register user </h3>
	<div id="edit" contenteditable="true">
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>

	<input type="button" value="Save" onclick="saveEdits()" id="save">

	<div style="font-weight: bold; margin-left: 87%; color: #fc7c80; margin-top: 1%;" id="update"> Edit and click to save</div>

</div>
</body>
</html>
