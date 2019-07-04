<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "Checkout";
$pageName = "Make A Document";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<script>
	function removeProblemRow(event) {
		var target = event.target;
		var row = target.parentNode.parentNode;
		row.parentNode.removeChild(row);
	}

	$(document).ready(function() {
		$("#grabProblemButton").click(function() {
			var problemID = $("#getProblemID");
			var problemTable = $(this).next();
			var newRow = "<tr>";

			$.ajax({
				type: "GET",
				url: "/php/getProblemAsJSON.php",
				data: "id=" + problemID.val(),
				dataType: "json"
			}).done(function(problem) {
				newRow += "<td>" + problem.id + "</td>";
				newRow += "<td>" + problem.title + "</td>"
				newRow += "<td><button onclick=\"removeProblemRow(event)\">Remove Problem</button></td></tr>"
				problemTable.append(newRow);

			}).fail(function(msg) {
				alert("Could not find the specified problem.");
			}).always(function() {
				problemID.val("");
			});

		});

		$("#getProblemID").keyup(function(evt) {
			if (event.keyCode === 13) {
				evt.preventDefault();
				$("#grabProblemButton").click();
			}
		});

		$("#makeDocButton").click(function() {
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "make_doc.php", true);
			xhr.setRequestHeader("Content-Type", "application/json");
			xhr.responseType = "blob";

			xhr.onload = function() {
				if (xhr.status === 200) {
					var pdfFile = new Blob([xhr.response], {
						type: "application/pdf"
					});
					var link = document.createElement('a');
					link.href = window.URL.createObjectURL(pdfFile);
					link.download = $("#title").val();
					//link.target = "_blank";
					document.body.appendChild(link);
					link.click();
					document.body.removeChild(link);
				}
			};


			var problemSet = {
				title: $("#title").val(),
				problems: new Array()
			};

			console.log(problemSet);

			$("#problems").find("tr").slice(1).each(function() {
				problemSet.problems.push($(this).children().first().text());
			});

			console.log(JSON.stringify(problemSet));

			xhr.send(JSON.stringify(problemSet));
		});

	});
</script>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<br>Title: <input type="text" id="title"><br>

	<h3>Problems:</h3>

	Enter Stella Index: <input type="text" id="getProblemID">
	<button type="button" id="grabProblemButton">Add Problem</button>

	<table id="problems">
		<tr>
			<th>Stella Index</th>
			<th>Title</th>
		</tr>
	</table>

	<button type="button" id="makeDocButton">Make Document</button>

</div>


<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>