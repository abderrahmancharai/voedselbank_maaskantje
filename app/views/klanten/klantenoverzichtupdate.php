<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1>klanten overzicht</h1>
    <a href="<?=URLROOT;?>/klanten/index">terug</a> |

    <p>Er zijn <?= $data["amountOfklanten"]; ?> klanten</p>
    <table>
        <table border=1>
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>mobiel</th>
                <th>email</th>
                <th>volwassen</th>
                <th>update</th>

            </tr>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
  

</body>
</html>