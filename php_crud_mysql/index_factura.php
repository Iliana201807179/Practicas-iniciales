<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_factura.php" method="POST">
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre del cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Nit" class="form-control" placeholder="NIT del cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Vendedor_Codigo" class="form-control" placeholder="Codigo del vendedor" autofocus>
          </div>
          <input type="submit" name="save_factura" class="btn btn-success btn-block" value="save factura">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No. Factura</th>
            <th>Nombre</th>
            <th>Nit</th>
            <th>Fecha</th>
            <th>Codigo del vendedor</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM factura";
          $result_factura = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_factura)) { ?>
          <tr>
            <td><?php echo $row['NoFactura']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Nit']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
            <td><?php echo $row['Vendedor_Codigo']; ?></td>
 
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>