<?php require APPROOT . '/views/includes/head.php'; ?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2 class="form-heading">Persoon Update</h2>
            <form action="<?= URLROOT; ?>/klanten/update/<?= $data['persoonId'] ?? ''; ?>" method="post">

                <input type="hidden" name="persoonId" value="<?= $data['persoonId'] ?? ''; ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Voornaam</label>
                    <input class="form-control" type="text" required name="voornaam" id="voornaam"
                        value="<?= $data['PersoonId'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Tussenvoegsel</label>
                    <input class="form-control" type="text" name="tussenvoegsel" id="tussenvoegsel"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Achternaam</label>
                    <input class="form-control" type="text" name="achternaam" id="achternaam"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Geboortedatum</label>
                    <input class="form-control" type="date" name="geboortedatum" id="geboortedatum"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Type Persoon</label>
                    <input class="form-control" type="text" name="typePersoon" id="typePersoon"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Vertegenwoordiger</label>
                    <input class="form-control" type="text" name="vertegenwoordiger" id="vertegenwoordiger"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Straatnaam</label>
                    <input class="form-control" type="text" name="straatnaam" id="straatnaam"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Huisnummer</label>
                    <input class="form-control" type="text" name="huisnummer" id="huisnummer"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Toevoeging</label>
                    <input class="form-control" type="text" name="toevoeging" id="toevoeging"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Postcode</label>
                    <input class="form-control" type="text" name="postcode" id="postcode"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Woonplaats</label>
                    <input class="form-control" type="text" name="woonplaats" id="woonplaats"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Mobiel</label>
                    <input class="form-control" type="text" name="mobiel" id="mobiel"
                        value="<?= $data['contact'] ?? ''; ?>">
                </div>

                <input type="submit" class="btn btn-warning mr-1" value="Update">
                <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/klanten/klantenoverzicht">Terug</a>
                <a class="btn btn-success" href="<?= URLROOT; ?>/homepages/index/">Home</a>
            </form>
        </div>
    </div>
</div>