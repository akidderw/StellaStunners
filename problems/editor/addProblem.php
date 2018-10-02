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
$title = $handle->realEscapeString($_POST['title']);
$probText = $handle->realEscapeString($_POST['probText']);
$solText = $handle->realEscapeString($_POST['solText']);

$response = array();

if (($_FILES['probImage']['error'] != UPLOAD_ERR_NO_FILE) or ($_FILES['solImage']['error'] != UPLOAD_ERR_NO_FILE)) {
	mkdir(DOCUMENT_ROOT."/images/stunners/".$id);
}

if ($_FILES['probImage']['error'] != 4) {
	$probImage = 1;
	$imageFileType = strtolower(pathinfo($_FILES['probImage']['name'], PATHINFO_EXTENSION));
	move_uploaded_file($_FILES['probImage']['tmp_name'], DOCUMENT_ROOT."/images/stunners/".$id."/pfig1.".$imageFileType);
} else { $probImage = 0; }

if ($_FILES['solImage']['error'] != 4) {
	$solImage = 1;
	$imageFileType = strtolower(pathinfo($_FILES['solImage']['name'], PATHINFO_EXTENSION));
	move_uploaded_file($_FILES['solImage']['tmp_name'], DOCUMENT_ROOT."/images/stunners/".$id."/sfig1.".$imageFileType);
} else { $solImage = 0; }

// Craft and execute INSERT query
$values = "('$id', '$title', '$probText', $probImage, '$solText', $solImage)";
if ($handle->query("INSERT into problems (id, title, probtext, probimage, soltext, solimage) VALUES $values")) {
	$response['success'] = True;
	$response['message'] = "Problem $id successfully added!";

	// Iterate through all tags and see which were set in the form
	foreach ($handle->getTagNames() as $tagName) {
		if (isset($_POST[$tagName])) {
			$tag = $handle->getTagByName($tagName);
			$handle->query("INSERT into tagmap (problem_id, tag_id) VALUES ('$id', {$tag->getID()})");
		}
	}
} else {
	$response['success'] = False;
	$response['message'] = "Error: {$handle->error()}";
}




echo json_encode($response);

?>

