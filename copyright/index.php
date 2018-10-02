<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once DOCUMENT_ROOT."/php/login.php";
?>

<?php 
$title = "Sources";
$pageName = "Sources";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<table id="source_table">
	<?php
	$sources = file("sources.txt");
	$tableHead = array_shift($sources);
	echo "<thead><tr>";
	foreach (explode("\t", $tableHead) as $column) {
		echo "<th>$column</th>";
	}
	echo "</tr></thead>";
	echo "<tbody>";
	foreach ($sources as $line) {
		echo '<tr>';
		foreach (explode("\t", $line) as $datum) {
			echo "<td>$datum</td>";
		}
		echo '</tr>';
	}
	echo "</tbody>";
	?>
	</table>
	
	<hr>
	<h3>A note on sources</h3>
	<p>I have found sources for quite a few problems, some of which are in our 18 sets and some of which we're not yet using. When I found a source, I gave its code name, as found in the Stella Sources spreadsheet. For all the problems, especially the rest, I put a number alongside the problem, as follows:</p>
	
	<ol>
	<li>Problems taken word for word, or a copied diagram exactly; source given accurately. There are about 150 of these.</li>
	<li>Problems taken word for word, or a copied diagram exactly; source not found. There are 32 or so of these, alas. These are the ones I'm unhappy about.</li>
	<li>Problems with a cool idea, that I have rewritten for local/timely reasons; good spirit to credit the source but not legally required, I'm sure.</li>
	<li>Problems with a cool idea that have appeared in many sources; no need to cite.</li>
	<li>Problems that are generic; no need to cite (like recipes found in all cookbooks).</li>
	<li>Problems that are just straight math things-- no particular flavor; no need to cite (anybody could have thought them up-- these aren't like those in #2).</li>
	<li>Problems that originate with Stella (or Jasper); no need to cite, obviously.</li>
	<li>Problems that might or might not be original, but that have no need to be cited.</li>
	<li>Multiple choice questions, presumably from AHSME's.</li>
	</ol>

	<p>There are problems in categories 3-6 where I've found one or more sources, but as far as I'm concerned there's no need to cite them-- I list the source just, well, showing off that I found it. Perhaps the most-used single source is the massive collection of problems given out at "a conference on computers in secondary-school mathematics, June 22-27, 1986", at Phillips Exeter Academy. There is a staggering number of interesting problems in this collection. There is no copyright for the entire document, and there is no citation for any problem. Thus I don't think we're required at all to cite these problems, but we might give an acknowledgement somewhere to Exeter. Whatever.</p>

</div>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
