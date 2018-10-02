<?php

// Get error reporting in browser
function showErrors() {	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

// Recursively deletes a directory and its contents.
//
// Found at https://secure.php.net/manual/en/function.rmdir.php
// in nbari@dalmp.com's comment.
function deleteDir($dir) { 
	$files = array_diff(scandir($dir), array('.','..')); 
	foreach ($files as $file) {
		(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
	}
	return rmdir($dir);
}

// Makes a temporary directory and returns its name.
// It works by using the function that creates temporary
// to generate a name for a directory.
//
// Found at https://stackoverflow.com/questions/1707801/making-a-temporary-dir-for-unpacking-a-zipfile-into
// in Mario Mueller's answer.
function tempdir($prefix) {
	$tempfile=tempnam(sys_get_temp_dir(), $prefix);

	// you might want to reconsider this line when using this snippet.
	// it "could" clash with an existing directory and this line will
	// try to delete the existing one. Handle with caution.
	if (file_exists($tempfile)) { unlink($tempfile); }
	mkdir($tempfile);
	if (is_dir($tempfile)) { return $tempfile; }
}

// Redirection function
function redirect($url) {
	header("Location: http://$_SERVER[HTTP_HOST]".$url);
	exit();
}


?>




