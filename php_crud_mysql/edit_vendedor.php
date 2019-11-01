<?php
include("db.php");
$Nombre = '';
$Telefono= '';
if  (isset($_GET['Codigo'])) {
  $Codigo = $_GET['Codigo'];
  $query = "SELECT * FROM Vendedor WHERE Codigo=$Codigo";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Telefono = $row['Telefono'];
  }
}
if (isset($_POST['update'])) {
  $Codigo = $_GET['Codigo'];
  $Nombre= $_POST['Nombre'];
  $Telefono = $_POST['Telefono'];
  $query = "UPDATE Vendedor set Nombre = '$Nombre', Telefono = '$Telefono' WHERE Codigo=$Codigo";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Venededor Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_vendedor.php?Codigo=<?php echo $_GET['Codigo']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Modifica el nombre">
        </div>
        <div class="form-group">
          <input name="Telefono" type="text" class="form-control" value="<?php echo $Telefono; ?>" placeholder="Modifica el telefono">
        </div>
        <button class="btn-success" name="update">
          Modificar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>