<html>
<head>
    <style>
    k{
          <float:right>;
      }
body{
      background-color: grey;
      }
      
      p1{color:purple;}
    </style>
    <title> Friend Book </title>
    <header><center><h1> Friend Book <h1></center></header>
    </head>
<body>
<p1><h1><b><i><center>Welcome to Friend Book</center></i></b></h1></p1>

<h2>Add a new friend:</h2>
<form action="webprojet.php" method="post">
Name: <input type="text" name="name">
<input type="submit">
</form><br><br><br>

<?php 
$filename = 'friends.txt';
if(isset($_POST["name"]))
{	if($_POST["name"]!=""){
	$file = fopen( $filename, "a" );
	fwrite( $file, PHP_EOL.$_POST["name"] );
	fclose($file);
}
}
?>


</form>
<h2>My Friend List:</h2>
<?php
$file = fopen( $filename, "r" );
while (!feof($file)) {
	$word=fgets($file);
	if(isset($_GET["Filter"]))
	{
		if (isset($_GET["Filterlist"]))
		{
			$pos = strpos(strtolower ($word), strtolower ($_GET["Filter"]));
			if ($pos !== false) 
			{
				if($pos===0)
				echo "<li>".$word."</li>";
			}
			
		}
		else
		{
			if(strstr(strtolower ($word),strtolower ($_GET["Filter"])))
				{echo "<li>".$word."</li>";}
		}
	}
	else
	{
		echo "<li>".$word."</li>";
	}
}
fclose($file);
?>

<h2>Search in my friend list:</h2>
<form action="webprojet.php" method="get">
	Search: <input type="text" name="Filter">
	<input type="checkbox" name="Filterlist">Filter list</input>
    <input type="submit">
    
<br><br>
<p1><h1><center>Have a nice day<center><i><b></h1></p1>
</body>
</html>