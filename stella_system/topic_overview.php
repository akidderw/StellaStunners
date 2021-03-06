<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once DOCUMENT_ROOT."/php/login.php";
?>

<?php
$title="Topic Overview";
$pageName="Topic Overview";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<div id="table">
  <h1><?php echo $pageName ?></h1>
  
  <table id="topic_overview_table">
  <?php
    $file= file("topic_overview.txt");
    $tableHead = array_shift($file);
    echo "<thead><tr>";
    foreach(explode("\t",$tableHead) as $column){
      echo "<th>$column</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";

    foreach($file as $line){
      echo '<tr>';
      foreach(explode("\t", $line) as $datum){
        echo "<td>$datum</td>";
      }
      echo '</tr>';
    }
  echo "</tbody>";
  ?>
  </table>
</div>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>
<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>