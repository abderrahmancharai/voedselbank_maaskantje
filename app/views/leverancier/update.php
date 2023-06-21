<?php require APPROOT . '/views/includes/head.php'; ?>



<body>

<!-- <h1>geleverde producten</h1>
<h3>leverancier: <?= $data["leveranciernaam"]; ?></h3>
<h3>contactpersoon: <?= $data["contactpersoon"]; ?></h3> 
<h3>telefoonnummer: <?= $data["mobiel"]; ?></h3> -->



<form action="<?= URLROOT; ?>/Leverancier/update" method="post">
   
    <table>
        <tbody>
          
            <tr>
                <td>
                    <label for="DatumEerstVolgendeLevering">Datum eerstVolgendel levering</label>
                    <input type="date" name="datumEerstVolgendeLevering" id="DatumEerstVolgendeLevering">
                </td>
            </tr>
            <td>
          <input type="hidden" name="productId" value="<?= $data["productId"];?>">
          <input type="hidden" name="leverancierId" value="<?= $data["leverancierId"];?>">
        </td>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>

            <?php var_dump($data["productId"]);?>
        </tbody>
    </table>
</form>
</body>






