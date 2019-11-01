
  <?php
include('db.php');
if (isset($_POST['prueba'])) {
  $Subtotal=$_POST["SELECT SUM(producto.Precio * detallefactura.Cantidad) FROM producto
  INNER JOIN detallefactura
  ON (producto.IdProducto = detallefactura.Id_Producto)"];

  $query = "INSERT INTO detallefactura(Subtotal) VALUES ('$Subtotal')";
  $result = mysqli_query($conn, $query);
  
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Detalle de factura Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_Detalle.php');
}
?>