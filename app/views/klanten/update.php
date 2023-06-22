<?php require APPROOT . '/views/includes/head.php'; ?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group form-box">
            <h2 class="form-heading">Persoon Update</h2>
            <form action="<?= URLROOT; ?>/klanten/update/" method="post">
                <input type="hidden" name="PersoonId" value="<?= $data["PersoonId"]; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Voornaam</label>
                        <input class="form-control" type="text" required name="voornaam" id="voornaam"
                            value="<?= $data['Voornaam']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tussenvoegsel</label>
                        <input class="form-control" type="text" name="tussenvoegsel" id="tussenvoegsel"
                            value="<?= $data['Tussenvoegsel']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Achternaam</label>
                        <input class="form-control" type="text" name="achternaam" id="achternaam"
                            value="<?= $data['Achternaam']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Geboortedatum</label>
                        <input class="form-control" type="date" name="geboortedatum" id="geboortedatum"
                            value="<?= $data['Geboortedatum']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Type Persoon</label>
                        <input class="form-control" type="text" name="typePersoon" id="typePersoon"
                            value="<?= $data['TypePersoon']; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Vertegenwoordiger</label>
                        <input class="form-control" type="text" name="vertegenwoordiger" id="vertegenwoordiger"
                            value="<?= $data['Vertegenwoordiger']; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Straatnaam</label>
                        <input class="form-control" type="text" name="straatnaam" id="straatnaam"
                            value="<?= $data['Straatnaam']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Huisnummer</label>
                        <input class="form-control" type="text" name="huisnummer" id="huisnummer"
                            value="<?= $data['Huisnummer']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Toevoeging</label>
                        <input class="form-control" type="text" name="toevoeging" id="toevoeging"
                            value="<?= $data['Toevoeging']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Postcode</label>
                        <input class="form-control" type="text" name="postcode" id="postcode"
                            value="<?= $data['Postcode']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Woonplaats</label>
                        <input class="form-control" type="text" name="woonplaats" id="woonplaats"
                            value="<?= $data['Woonplaats']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?= $data['Email']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobiel</label>
                        <input class="form-control" type="text" name="mobiel" id="mobiel"
                            value="<?= $data['Mobiel']; ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-warning" value="Update">
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary" href="<?= URLROOT; ?>/klanten/klantenoverzicht">Terug</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-success" href="<?= URLROOT; ?>/homepages/index/">Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>