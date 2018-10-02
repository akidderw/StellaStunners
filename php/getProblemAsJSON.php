<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");

?>

<?php include_once(DOCUMENT_ROOT."/php/DBHandler.php") ?>

<?php
if (!isset($_GET['id'])) {
	die("No problem ID specified.");
}

$handle = new Stella();

if (!$problem = $handle->getProblem($_GET['id'])) { die("Could not find problem $_GET[id]."); }

$handle->close();

echo $problem->toJSON();
?>




