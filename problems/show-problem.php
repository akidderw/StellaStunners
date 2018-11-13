<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php require_once(DOCUMENT_ROOT."/php/DBHandler.php") ?>

<?php
$handle = new Stella();

// If the id isn't specified or doesn't have an entry, then redirect to problems/index.php
if (!isset($_GET["id"]) or !($problem = $handle->getProblem($_GET["id"]))) {
	redirect("/problems");
	exit();
} else { $handle->close(); }
?>

<!-- Allows use of ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Button to show solution -->
<script>
$(document).ready(function(){
	$("#solutiontext").hide();
	$("#solution").click(function(){
		$("#solutiontext").toggle(1000);
	});
});
</script>

<?php // Begin webpage
$title = "Problems";
$pageName = "Problems";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>
	<h2 style="font-family: serif;"> <?php echo "{$problem->getID()} &ndash; {$problem->getTitle()}"; ?> </h3>

	<br>	
	<img src="<?php echo "{$problem->getProbImgURL()}"; ?>"> 

	<p><?php echo "{$problem->getProbText()}"; ?>  </p>
	<hr>
	<button id='solution'> Show Solution </button>
	<p id='solutiontext'><b>Solution: <br></b>
		<?php echo "{$problem->getSolText()}";  ?>
		<br>
		<img src="<?php echo "{$problem->getSolImgURL()}"; ?>">
	</p>
	<div id="tagList">
	<span>Tags:</span>
	<?php foreach ($problem->getTags() as $tagName) {
		echo "<span class=\"tagLabel\">$tagName</span>\n";
	}?>
	</div>
		
</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>

