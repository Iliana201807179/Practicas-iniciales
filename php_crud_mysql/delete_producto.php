<?php
include("db.php");
if(isset($_GET['idProducto'])) {
  $idProducto = $_GET['idProducto'];
  $query = "DELETE FROM producto WHERE idProducto = $idProducto";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Producto Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index_Producto.php');
}
?>