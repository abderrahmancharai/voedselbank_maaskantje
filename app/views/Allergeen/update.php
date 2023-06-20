<?php require APPROOT . '/views/includes/head.php'; ?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2 class="form-heading">Allergeen Update</h2>
            <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-success"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
            <form action="<?= URLROOT; ?>/allergeen/update/<?= $data['allergeen']->Id; ?>" method="post">

                <input type="hidden" name="allergeenId" value="<?= $data['allergeen']->Id; ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Klant Naam</label>
                    <input class="form-control" type="text" name="klantNaam" id="klantNaam"
                        value="<?= $data['allergeen']->KlantNaam; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Allergie</label>
                    <input class="form-control" type="text" name="naam" id="naam"
                        value="<?= $data['allergeen']->Naam; ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Allergie Omschrijving</label>
                    <textarea class="form-control" name="omschrijving"
                        id="omschrijving"><?= $data['allergeen']->Omschrijving; ?></textarea>
                </div>

                <input type="submit" class="btn btn-warning mr-1" value="Update">
                <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/allergeen/allergeenoverzicht">Terug </a>
                <a class="btn btn-success" href="<?php URLROOT; ?>/homepages/index/">Home</a>
            </form>
        </div>
    </div>
</div>