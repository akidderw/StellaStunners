<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php 
$title = "Contact";
$pageName = "Contact";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>This is where we will put contact information.</p>

</div>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
