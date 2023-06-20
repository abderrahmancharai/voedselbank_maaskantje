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
    <a href="<?=URLROOT;?>/klanten/klantenoverzicht">terug</a> |
    <form action="/klanten/klantenoverzicht" method="post">
    <input type="date" name="datum">
    <input type="submit" value="Tonen">
    </form>

    <p>Er zijn zoveel klanten gevonden: <?= $data["amountOfklanten"];  ?></p>
    <h3>datum: <?= $_POST['datum'] ?></h3>
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

            </tr>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
  

</body>
</html>