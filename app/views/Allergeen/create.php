<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php require APPROOT . '/views/includes/head.php'; ?>

    <div class="container container-mvckdemo">
        <div class="wrapper-mvckdemo">
            <div class="form-group">
                <h2 class="form-heading">Create Allergeen</h2>

                <form action="<?= URLROOT; ?>/allergeen/create" method="post">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="naam">Naam</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="naam" id="naam">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="omschrijving">Omschrijving</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="omschrijving" id="omschrijving"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="klantnaam">Klant Naam</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="klantnaam" id="klantnaam">
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label class="col-sm-3 control-label" for="aantalVolwassen">Aantal Volwassen</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="aantalVolwassen" id="aantalVolwassen"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="aantalKinderen">Aantal Kinderen</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="aantalKinderen" id="aantalKinderen"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="aantalBaby">Aantal Baby</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="aantalBaby" id="aantalBaby" required>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <input class="btn btn-warning mr-1" type="submit" value="Verzenden">
                            <a class="btn btn-primary mr-1"
                                href="<?= URLROOT; ?>/allergeen/allergeenoverzicht">Terug</a>
                            <a class="btn btn-success" href="<?php URLROOT; ?>/homepages/index/">Home</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>

</html>