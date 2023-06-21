<?php require APPROOT . '/views/includes/head.php'; ?>
<body>

<h1>Overzicht Leveranciers</h1>
<!-- <a style="text-decoration: underline;"  href="<?=URLROOT;?>/Leverancier/toevoegen">levrancier toevoegen </a> | -->

<form method="POST" action="<?= URLROOT; ?>/Leverancier/index">
    <div>
        <label for="leverancierType">Select Leverancier Type:</label>
        <select id="leverancierType" name="leverancierType">
            <option value="">All</option>
            <option value="Bedrijf">Bedrijf</option>
            <option value="Instelling">Instelling</option>
            <option value="Overheid">Overheid</option>
            <option value="Particulier">Particulier</option>
            <option value="Donor">Donor</option>
        </select>
        <button type="submit">Filter</button>
    </div>
</form>

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



</body>
</html>
