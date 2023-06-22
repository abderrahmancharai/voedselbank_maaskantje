<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center">Person Details</h1>
        <a href="<?= URLROOT; ?>/klanten/klantenoverzicht" class="d-block text-center mb-4">Back to Overview</a>
        <div class="table-responsive">
            <table class="table table-striped">
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
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>