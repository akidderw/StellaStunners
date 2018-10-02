<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php 
$title = "Extending Problems";
$pageName = "Extending Problems";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>Once a problem has been solved, there are various ways of playing around with it. One can be simply to look for another solution. The intro problem 1000.75, about Scott the Painter has numerous solutions, and in finding them all, one finds an interesting pattern.</p>

	<p>When a problem involves numbers, tweaking the numbers can tease out interesting patterns. For example, problem 1550.22, about dogs and ducks, states: If a certain number of dogs and ducks have 30 heads and 100 feet, how many of each are there?</p>

	<p>In solving the problem, we can note that if all 30 animals were ducks, we'd have only 60 feet. Replacing a duck with a dog adds two feet to the total. We need to add 40 feet, so we try replacing 20 ducks with dogs, giving us 20 dogs and 10 ducks. 20 x 4 + 10 x 2 = 100, so we're right: 20 dogs and 10 ducks.</p>

	<p>But now that we have solved the problem and are enjoying our success, what if we tweak the numbers? What if there aren't 30 animals, but 32? Can we still get 100 feet? Or what if there aren't 100 feet &ndash; what if there are 106? Can 30 animals have 106 feet? What if there are definitely 20 dogs but a variable number of geese? How many feet are possible then? And so on. Relationships among the numbers become evident &ndash; little formulas emerge.</p>

	<p>The what-if-not strategy is fully presented in the excellent book, <span style="text-decoration: underline;">The Art of Problem Posing</span>, by Stephen Brown and Marion Walter, published by the Franklin Press.</p>
	
	<p>Finally, it is often worth seeing if one's several solutions to a problem can be generalized into a formula.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
