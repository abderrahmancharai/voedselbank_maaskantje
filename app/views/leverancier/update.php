<?php require APPROOT . '/views/includes/head.php'; ?>



<body>

<!-- <h1>geleverde producten</h1>
<h3>leverancier: <?= $data["leveranciernaam"]; ?></h3>
<h3>contactpersoon: <?= $data["contactpersoon"]; ?></h3> 
<h3>telefoonnummer: <?= $data["mobiel"]; ?></h3> -->



<!-- update_product_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Update Product Houdbaarheidsdatum</title>
</head>
<body>
    <h1>Update Product Houdbaarheidsdatum</h1>
    <form method="POST" action="<?= URLROOT; ?>/Product/update">
        <input type="hidden" name="productId" value="<?= $data['productId']; ?>">
        <label for="Houdbaarheidsdatum">Houdbaarheidsdatum:</label>
        <input type="date" name="Houdbaarheidsdatum" value="<?= $data['Houdbaarheidsdatum']; ?>">
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>







