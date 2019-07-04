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
			var problemTable = $("#problems");
			var newRow = "";
			var addType = $("input[type=radio][name=add-type]:checked").val();

			$.ajax({
				type: "GET",
				url: "/php/getProblemAsJSON.php",
				data: {
					id: problemID.val(),
					addType: addType
				},
				dataType: "json"
			}).done(function(problem) {
				newRow += "<tr>"
				newRow += "<td>" + problem.id + "</td>";
				newRow += "<td>" + problem.title + "</td>"
				newRow += "<td><button onclick=\"removeProblemRow(event)\">Remove Problem</button></td>"
				newRow += "</tr>"
				problemTable.append(newRow);

			}).fail(function(death) {
				alert(death.responseText);
			}).always(function() {
				problemID.val("");
			});

		});

		$("input[type=radio][name=add-type]").change(function(evt) {
			// $("#getProblemID").attr("placeholder", ``)
			if ($("input[type=radio][name=add-type]:checked").val() === 'id') {
				$("#getProblemID").attr('placeholder', 'Stella Index')
			} else {
				$("#getProblemID").attr('placeholder', 'Title')
			}
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
	<table>
		<tr>
			<td>
				<input id="addIndex" type="radio" name="add-type" value="id" checked>
				<label for="addIndex">Add by Stella Index</label>
			</td>
			<td>
				<input id="addTitle" type="radio" name="add-type" value="title">
				<label for="addTitle">Add by Title</label>
			</td>
		</tr>
		<tr>
			<td>
				<input style="width: 100%" type="text" placeholder="Stella Index" id="getProblemID">
			</td>
			<td style="text-align: right">
				<button type="button" id="grabProblemButton">Add Problem</button>
			</td>
		</tr>
		<!-- <label for="getProblemTitle">Enter Problem Title: </label>
		<input type="text" id="getProblemTitle">
		<br /> -->
	</table>
	<br>
	<table id="problems">
		<tr>
			<th>Stella Index</th>
			<th>Title</th>
		</tr>
	</table>

	<button type="button" id="makeDocButton">Make Document</button>

</div>


<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>