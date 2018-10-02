<?php
preg_match("/(.*\/stella).*/", __DIR__, $docRoot);
define("DOCUMENT_ROOT", $docRoot[1]);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once DOCUMENT_ROOT."/php/login.php";
?>

<?php 
$title = "About";
$pageName = "How to Use Stella's Stunners";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<?php 

		// if no conn set up
$conn = new mysqli($hn, $un, $pw, $db);
//upload.txt
if($conn->connect_error){ die($conn->connect_error);}else{
	
}


if(isset($_POST['probtag']) && isset($_POST['tag'])){
	$num=$_POST['probtag'];
	$tag=$_POST['tag'];
	$query = "INSERT INTO relat(probnum, tag) VALUES('$num','$tag')";
	$result   = $conn->query($query);
    	if (!$result) {
		echo "INSERT failed: $query<br>" .$conn->error . "<br><br>";
	}else{
		echo "<h1>Tag successfully added.<br></h1>";
	}

}



if(isset($_POST['probdelete']) && $_POST['confirm'] == 'on'){
	$del=$_POST['probdelete'];
	$query= "DELETE FROM problems WHERE probnum ='$del'";
	$result   = $conn->query($query);
    	if (!$result) {echo "INSERT failed: $query<br>" .
      	$conn->error . "<br><br>";}else{
		echo "<h1>Problem successfully deleted.<br></h1>";
	}

}

if (isset($_POST['num'])   &&
      isset($_POST['title'])    &&
      isset($_POST['text']) &&
      isset($_POST['sol']))
  {
    $num   = $_POST['num'];
    $title    = $_POST['title'];
    $text=  $_POST['text'];
	if(isset($_POST['textim'])&&$_POST['textim']=='on'){
		$textim = 1;
	}else{
    $textim     = 0;
	}
    $sol     = $_POST['sol'];
	if(isset($_POST['solim'])&&$_POST['solim']=='on'){
		$solim = 1;
	}else{
    		$solim     = 0;
	}
    $query    = "INSERT INTO problems(probnum, name, probtext, probim, soltext, solim)" .
      "VALUES('$num','$title','$text','$textim','$sol','$solim');";
	//echo $query;
    $result   = $conn->query($query);
    if (!$result) {echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";}else{
		echo "<h1>Problem successfully added.<br></h1>";
	}
  }

 echo <<<_END
  <form action="secure.php" method="post"><pre>
Problem number	<input type="text" name="num">
Title		<input type="text" name="title">
Text		
<textarea rows="10" cols="50" name="text"></textarea>
Check if there is an image for the problem	<input type="checkbox" name="textim">
Solution
<textarea rows="10" cols="50" name="sol"></textarea>
Check if there is an image for the solution	<input type="checkbox" name="solim">
		<input type="submit" value="ADD PROBLEM	">
  </pre></form>
_END;

$query = "SELECT * from problems";
	echo $query;	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	$rows = $result->num_rows;	
	echo $rows;
	echo "<br>";
	for($j=0; $j < $rows ;$j++){
					$result->data_seek($j);
					$prbnum = $result->fetch_assoc()['probnum'];
					echo 'Problem # '. $prbnum .'  ';
					$result->data_seek($j);
					echo '<b>TITLE</b> '. $result->fetch_assoc()['name'].'<br>';
					$result->data_seek($j);
					echo '<b>PROBLEM</b> <br>'. $result->fetch_assoc()['probtext'].'<br>';	
					$result->data_seek($j);
					if(1==$result->fetch_assoc()['probim']&&file_exists($prbnum.".png")){
						echo '<img src="'.$prbnum.'.png" alt="image">';
						echo '<br>';
					}
					$result->data_seek($j);
					echo '<b>SOLUTION</b> <br>'.$result->fetch_assoc()['soltext'].'<br><br>';
					$result->data_seek($j);
					if(1==$result->fetch_assoc()['solim']&&file_exists($prbnum."s.png")){
						echo '<img src="'.$prbnum.'s.png" alt="image">';
						echo '<br>';
					}
					$result->data_seek($j);
					$prob = $result->fetch_assoc()['probnum'];
					$result->data_seek($j);
					$probtitle= $result->fetch_assoc()['name'];
					echo "<a href='index.php?prob=".$prob."&probtitle=".$probtitle."'>add</a>";
					echo "<br><br>";
				}


echo <<<_END
  <form action="secure.php" method="post">
Problem number to delete <input type="text" name="probdelete">
<br>Are you sure you want to delete? <input type="checkbox" name="confirm">
<input type="submit" value="DELETE">
</form>
_END;

echo <<<_END
  <form action="secure.php" method="post">
Problem number <input type="text" name="probtag">
<br>Tag <input type="text" name="tag">
<input type="submit" value="ADD TAG">
</form>
_END;



	?>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
