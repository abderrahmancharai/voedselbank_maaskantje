<?php require APPROOT . '/views/includes/head.php'; ?>
<body>

<h1>Overzicht Leveranciers</h1>
<!-- <a style="text-decoration: underline;"  href="<?=URLROOT;?>/Leverancier/toevoegen">levrancier toevoegen </a> | -->

<div class="d-flex justify-content-end">
    <form method="POST" action="<?= URLROOT; ?>/Leverancier/index" class="form-inline">
        <div class="form-group mb-2">
            <select name="LeverancierType" class="form-control">
                <option>Selecteer type</option>
                <option>Bedrijf</option>
                <option>Instelling</option>
                <option>Overheid</option>
                <option>Particulier</option>
                <option>Donor</option>
            </select>
        </div>
        <input class="btn btn-secondary ml-1" type="submit" value="Toon">
    </form>
</div>


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">ContactPersoon</th>
            <th scope="col">Email</th>
            <th scope="col">Mobiel</th>
            <th scope="col">Leverancier nummer</th>
            <th scope="col">Leverancier type</th>
            <th scope="col">Product details</th>
        </tr>
        </thead>
        <tbody>
        <?= $data['rows']; ?>
        </tbody>
    </table>

  <div class="form-group row">
    <div class="col-md-12 text-md-right">
        <a class="btn btn-primary" href="<?php URLROOT; ?>/Leverancier/index">Home</a>
    </div>
</div>



</body>
</html>
