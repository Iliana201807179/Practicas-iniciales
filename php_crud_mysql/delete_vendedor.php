<?php
include("db.php");
if(isset($_GET['Codigo'])) {
  $Codigo = $_GET['Codigo'];
  $query = "DELETE FROM vendedor WHERE Codigo = $Codigo";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Vendedor Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}
?>