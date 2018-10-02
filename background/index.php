<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php 
$title = "Background Information";
$pageName = "Background Information";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>
	<p>In this section we provide some useful background material for Stella's Stunners.</p>

	<p>First is <a href="problem_solving.php">an essay on the importance of problem solving</a> in the mathematical lives of students.</p>

	<p>Next is <a href="heuristics.php">a list of 25 helpful problem-solving heuristics</a> that can be useful in tackling Stella problems, or any other challenging problem.</p>

	<p>Last is <a href="bio.php">a biography of Stella</a> to answer those inquisitive students who want to know, "Who is this mysterious Stella person anyway?"</p>

</div>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
