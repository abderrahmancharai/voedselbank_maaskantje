<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Overzicht Klanten</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Gezin</th>
                <th>Vertegenwoordiger</th>
                <th>E-mailadres</th>
                <th>Mobiel</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>Klant Details</th>
            </tr>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
</body>

</html>