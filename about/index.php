<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once(DOCUMENT_ROOT."/php/login.php");
?>

<?php 
$title = "About";
$pageName = "How to Use Stella's Stunners";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>The Stella problems can be used in a variety of ways in the classroom. They can be part of regular assignments or given for extra credit. They can be used in sets or individually as time allows. They can provide a program for math club meetings or the substance for school or district mathematics contests. Their use is limited only by your imagination.</p>

	<p>In this section Rudd Crawford shares ways that he has used <a href="classroom.php">Stella in the classroom</a>, some example grading slips (<a href="grading_slips_small.pdf" target="_blank">small</a> and <a href="grading_slips_large.pdf" target="_blank">large</a>), and methods for <a href="extending.php">extending the problems</a>.</p>
	
	<!--
	This code should not be displayed on the final site
	<hr>
	<p>Put some LaTeX code here:</p>
	<textarea id="texCode" style="font-family: Courier; font-size: 1.2em; width: 100%; max-width: 100%; min-height: 4.8em; outline: none; resize: none; overflow: hidden;"></textarea>
	<br>
	<button onclick="writeMath()" style="cursor: pointer; margin-top: 20px;">Preview</button>
	-->
	<script> /* Ripped from https://gist.github.com/ugin/5779160 */
		function resize(event) {
			event.target.style.height = 'auto';
			event.target.style.height = event.target.scrollHeight + 'px';
		}

		function delayedResize(event) {
			window.setTimeout(resize, 0, event);
		}
		
		var texCode = document.getElementById("texCode");

		texCode.addEventListener('change',  resize, false);
		texCode.addEventListener('cut',     delayedResize, false);
		texCode.addEventListener('paste',   delayedResize, false);
		texCode.addEventListener('drop',    delayedResize, false);
		texCode.addEventListener('keydown', delayedResize, false);

		texCode.dispatchEvent(new Event('change'));

		function writeMath() {
			var tex = document.getElementById("texCode").value;
			document.getElementById("preview").innerHTML = tex;
			MathJax.Hub.Queue(["Typeset", MathJax.Hub, "preview"]);
		}
	</script>

	<p id="preview"></p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
