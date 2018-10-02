<?php
preg_match("/(.*\/stella).*/", __DIR__, $docRoot);
define("DOCUMENT_ROOT", $docRoot[1]);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "Problems";
$pageName = "Problems";
include_once(DOCUMENT_ROOT."/includes/header.php");
include_once DOCUMENT_ROOT."/php/login.php";
?>

<?php include(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p><?php 
		echo "You are now viewing your cart";
		?></p>
	<p><?php 
		$conn = new mysqli($hn, $un, $pw, $db);

		if($conn->connect_error){ die($conn->connect_error);}else{ }
		
		$arr=explode(",",$_COOKIE[$cookie_name]);
		foreach($arr as $i){
			$temp = explode(":",$i);
			$query = "SELECT * FROM problems WHERE probnum = " . $temp[1];
			$result   = $conn->query($query);
			if (!$result) {echo "search failed $query";
			}else{
				$rows = $result->num_rows;	
				//echo $rows;
				echo "<br>";
				for($j=0; $j < $rows ;$j++){
					$result->data_seek($j);
					echo 'Problem # '. $result->fetch_assoc()['probnum'] .'  ';
					$result->data_seek($j);
					echo '<b>TITLE</b> '. $result->fetch_assoc()['name'].'<br>';
					$result->data_seek($j);
					echo '<b>PROBLEM</b> <br>'. $result->fetch_assoc()['probtext'].'<br>';
					$result->data_seek($j);
					echo '<b>SOLUTION</b> <br>'.$result->fetch_assoc()['soltext'].'<br><br>';
				}
			}
		}
		
		?>
	</p>
</div>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>

