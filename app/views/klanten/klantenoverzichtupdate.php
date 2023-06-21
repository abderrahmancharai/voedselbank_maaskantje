<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klanten Overzicht Update</title>
</head>

<body>
    <h1>Klanten Overzicht Update</h1>
    <a href="<?= URLROOT; ?>/klanten/index">Terug</a> |
    <p>Er zijn <?= $data["amountOfklanten"]; ?> klanten</p>
    <table border="1">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Geboortedatum</th>
                <th>TypePersoon</th>
                <th>Vertegenwoordiger</th>
                <th>Straatnaam</th>
                <th>Huisnummer</th>
                <th>Toevoeging</th>
                <th>Postcode</th>
                <th>Woonplaats</th>
                <th>Email</th>
                <th>Mobiel</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['klant'] as $value) : ?>
            <tr>
                <td><?= $value->Voornaam ?></td>
                <td><?= $value->Tussenvoegsel ?></td>
                <td><?= $value->Achternaam ?></td>
                <td><?= $value->Geboortedatum ?></td>
                <td><?= $value->TypePersoon ?></td>
                <td><?= $value->Vertegenwoordiger ?></td>
                <td><?= $value->Straatnaam ?></td>
                <td><?= $value->Huisnummer ?></td>
                <td><?= $value->Toevoeging ?></td>
                <td><?= $value->Postcode ?></td>
                <td><?= $value->Woonplaats ?></td>
                <td><?= $value->Email ?></td>
                <td><?= $value->Mobiel ?></td>
                <td><a href="<?= URLROOT ?>/klanten/update/<?= $value->Id ?>">Update</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html> -->