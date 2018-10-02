<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php 
$title = "Acknowledgements";
$pageName = "Acknowledgements";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>The following people were crucial to the (re)creation of this website:</p>

	<ul>
	<li>Your name here</li>
	</ul>

</div>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
