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
    <a href="<?= URLROOT; ?>/klanten/klantenoverzicht">Back to Overview</a>
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
            <?= $data['rows']; ?>
        </tbody>
    </table>
</body>

</html>