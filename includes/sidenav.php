<div id="sidenav">
<h3>Problem Sets</h3>

<ul>
<?php
/* Creates 18 links on the navbar which the title "Problem Set #" */
for ($i=1; $i<19; $i++){
  $link = "/problems/show-problem.php?tag=set" . $i;
  echo "<a href='/problems/show-tag.php?tag=$i'><li>Problem Set $i</li></a>";
}
?>
</ul>
</div>
