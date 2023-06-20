<?php require APPROOT . '/views/includes/head.php'; ?>

<body>
    <h1>Allergeen</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Allergie</th>
                <th scope="col">Allergie Omschrijving</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
</body>

<a href="<?= URLROOT; ?>/allergeen/create" class="btn btn-primary">Create Allergeen</a>


</html>