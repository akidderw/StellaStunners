<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php // Check if a user is logged in
session_start();

if (!isset($_SESSION['user'])) { // Redirect if not logged in
	//redirect("/problems/editor/login.php");
	die();
}
?>

<?php require_once(DOCUMENT_ROOT."/php/DBHandler.php") ?>

<?php // Application Logic

$handle = new Editor();
$id = $handle->realEscapeString($_POST['problemID']);
$response = array();

if (!$problem = $handle->getProblem($id)) {
	$response['success'] = False;
	$response['message'] = "Could not find problem $id";
	die(json_encode($response));
}

// Delete an existing problem
if (!$id) {
	$response['success'] = False;
	$response['message'] = "No Stella number specified";
} else {
	if ($handle->query("DELETE FROM problems WHERE id = '$id'")) {
		deleteDir(DOCUMENT_ROOT."/images/stunners/$id");
		$handle->query("DELETE FROM tagmap WHERE problem_id = '$id'");
		$response['success'] = True;
		$response['message'] = "Problem $id successfully deleted";
	} else {
		$response['success'] = False;
		$response['message'] = "Error: {$handle->error()}";
	}
}

echo json_encode($response);

?>

