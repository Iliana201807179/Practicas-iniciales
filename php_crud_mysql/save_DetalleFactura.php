<?php
include('db.php');
if (isset($_POST['save_DetalleFactura'])) {
  $Factura_NoFactura = $_POST['Factura_NoFactura'];
  $Cantidad = $_POST['Cantidad'];
  $Id_Producto = $_POST['Id_Producto'];
  
  $query = "INSERT INTO detallefactura(Factura_NoFactura, Cantidad, Id_Producto) VALUES ('$Factura_NoFactura', '$Cantidad','$Id_Producto')";
  $Subtotal=$_POST["SELECT SUM(producto.Precio * detallefactura.Cantidad) FROM producto
  INNER JOIN detallefactura
  ON (producto.IdProducto = detallefactura.Id_Producto)"];
  $query1 = "INSERT INTO detallefactura(Subtotal) VALUES ('$Subtotal')";
  $result = mysqli_query($conn, $query,$query1);
  
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Detalle de factura Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_Detalle.php');
}
?>
