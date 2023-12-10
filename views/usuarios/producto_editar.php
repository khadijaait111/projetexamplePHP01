<?php

$id = $_GET['id'];
require_once ("../../includes/_db.php");
$consulta = "SELECT * FROM productos WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$productos = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions.php" method="POST"  enctype="multipart/form-data" >

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="nombre" class="form-label">Libelle *</label>
<input type="text"  id="nombre" name="nombre" value="<?php echo $productos ['nombre']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="descripcion" class="form-label">Prix Unitaire *</label>
<input type="text"  id="descripcion" name="descripcion" value="<?php echo $productos ['descripcion']; ?>" class="form-control" required>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="cantidad" class="form-label">Quantite *</label>
<input type="number"  id="cantidad" name="cantidad"  value="<?php echo $productos ['cantidad']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">

<div class="mb-3">
<label for="cantidad" class="form-label">Date *</label>
<input type="date"  id="cantidamin" name="cantidadmin" value="<?php echo $productos ['cantidad']; ?>" class="form-control" required>
</div>


</div>
</div>
<div class="row">
    <div class="col-sm-12">
    <div class="mb-3">
<label for="categorias" class="form-label">Categorie *</label>
<select name="categorias" id="categorias" class="form-control" required>
<option value="électronique">électronique</option>
    <option value="cuisine">Ordinateur portable</option>
    <option value="jouets">jouets</option>
    <option value="automobile">automobile</option>
    <option value="vetement">vetement</option>
    <option value="telephone">telephone</option>
    <option value="sport">sport</option>

  </select>
    </div>   
</div>
</div>
<div class="mb-3">
<div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <input type="file" class="form-control-file"  name="foto" id="foto" required>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
<input type="hidden" name="accion" value="editar_producto">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<button type="submit" class="btn btn-success">Modifier</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>