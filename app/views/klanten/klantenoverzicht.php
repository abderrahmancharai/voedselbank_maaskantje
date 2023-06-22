<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center">Overzicht Klanten</h1>

        <div class="d-flex justify-content-end">
            <form action="<?= URLROOT; ?>/klanten/klantenoverzicht" method="POST">
                <select name="Postcode">
                    <option>Selecteer postcode</option>
                    <option>5271TH</option>
                    <option>5271ZE</option>
                    <option>5271TJ</option>
                    <option>5271ZH</option>
                </select>
                <input type="submit" value="toon gezinnen" class="btn btn-secondary">
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
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
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>