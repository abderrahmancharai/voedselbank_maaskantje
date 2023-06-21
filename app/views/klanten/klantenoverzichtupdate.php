<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Details</title>
</head>

<body>
    <h1>Person Details</h1>
    <a href="<?= URLROOT; ?>/klanten/klantenoverzichtupdate">Back to Overview</a>
    <table border="1">
        <thead>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['klant'] as $value) : ?>
            <tr>
                <td>First Name</td>
                <td><?= $value->Voornaam ?></td>
            </tr>
            <tr>
                <td>Insertion</td>
                <td><?= $value->Tussenvoegsel ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?= $value->Achternaam ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?= $value->Geboortedatum ?></td>
            </tr>
            <tr>
                <td>Person Type</td>
                <td><?= $value->TypePersoon ?></td>
            </tr>
            <tr>
                <td>Representative</td>
                <td><?= $value->Vertegenwoordiger ?></td>
            </tr>
            <tr>
                <td>Street</td>
                <td><?= $value->Straatnaam ?></td>
            </tr>
            <tr>
                <td>House Number</td>
                <td><?= $value->Huisnummer ?></td>
            </tr>
            <tr>
                <td>Addition</td>
                <td><?= $value->Toevoeging ?></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><?= $value->Postcode ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?= $value->Woonplaats ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $value->Email ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?= $value->Mobiel ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>