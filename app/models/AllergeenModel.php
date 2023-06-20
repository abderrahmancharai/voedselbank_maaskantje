<?php

class AllergeenModel
{
    // Properties, fields
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllergeen()
    {
        $sql = "SELECT Allergeen.Id, Allergeen.Naam, Allergeen.Omschrijving, Klant.Naam AS KlantNaam
                FROM Allergeen
                INNER JOIN Klant ON Allergeen.KlantId = Klant.Id";

        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

public function getSingleAllergeen($allergeenId)
{
    $this->db->query("SELECT 
                            Allergeen.Id,
                            Allergeen.Naam,
                            Allergeen.Omschrijving,
                            Klant.Naam AS KlantNaam
                        FROM 
                            Allergeen
                        INNER JOIN 
                            Klant ON Allergeen.KlantId = Klant.Id
                        WHERE 
                            Allergeen.Id = :allergeenId");
    $this->db->bind(':allergeenId', $allergeenId, PDO::PARAM_INT);
    return $this->db->single();
}

public function updateAllergeen($data)
{
    try {
        $this->db->query("UPDATE Allergeen
                            INNER JOIN Klant ON Allergeen.KlantId = Klant.Id
                            SET Allergeen.naam = :naam,
                                Allergeen.omschrijving = :omschrijving,
                                Klant.naam = :klantnaam
                            WHERE Allergeen.id = :allergeenId;");

        $this->db->bind(':allergeenId', $data['allergeenId'], PDO::PARAM_INT);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':omschrijving', $data['omschrijving'], PDO::PARAM_STR);
        $this->db->bind(':klantnaam', $data['klantnaam'], PDO::PARAM_STR);

        $this->db->execute();
    } catch (PDOException $e) {
        echo $e->getMessage() . "Rollback";
    }
}

public function createAllergeen($post) {
    try {
$this->db->query("
    INSERT INTO Gezin (AantalVolwassen, AantalKinderen, AantalBaby, IsActive, Opmerking, DatumAangemaakt, Datumgewijzigd)
    VALUES (:aantalVolwassen, :aantalKinderen, :aantalBaby, 1, NULL, SYSDATE(6), SYSDATE(6))
");

$aantalVolwassen = isset($post['aantalVolwassen']) ? $post['aantalVolwassen'] : 0;
$aantalKinderen = isset($post['aantalKinderen']) ? $post['aantalKinderen'] : 0;
$aantalBaby = isset($post['aantalBaby']) ? $post['aantalBaby'] : 0;

$this->db->bind(':aantalVolwassen', $aantalVolwassen, PDO::PARAM_INT);
$this->db->bind(':aantalKinderen', $aantalKinderen, PDO::PARAM_INT);
$this->db->bind(':aantalBaby', $aantalBaby, PDO::PARAM_INT);
$this->db->execute();

$this->db->query("
    INSERT INTO Klant (GezinId, Naam, IsActive, DatumAangemaakt, Datumgewijzigd)
    VALUES (LAST_INSERT_ID(), :naam, 1, SYSDATE(6), SYSDATE(6))
");

$this->db->bind(':naam', $post['klantnaam'], PDO::PARAM_STR);
$this->db->execute();

$this->db->query("
    INSERT INTO allergeen (KlantId, Naam, Omschrijving, IsActive, DatumAangemaakt, Datumgewijzigd)
    VALUES (LAST_INSERT_ID(), :naam, :omschrijving, 1, SYSDATE(6), SYSDATE(6))
");

$this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
$this->db->bind(':omschrijving', $post['omschrijving'], PDO::PARAM_STR);
$this->db->execute();



        return true;
    } catch (PDOException $e) {
        echo "Databasefout: " . $e->getMessage();
        return false;
    }
}

public function delete($allergeenId)
{
    try {
        $this->db->query("DELETE FROM productperallergeen WHERE AllergeenId = :allergeenId");
        $this->db->bind(':allergeenId', $allergeenId, PDO::PARAM_INT);
        $this->db->execute();

        $this->db->query("DELETE FROM Allergeen WHERE Id = :allergeenId");
        $this->db->bind(':allergeenId', $allergeenId, PDO::PARAM_INT);
        $this->db->execute();

        return true; 
    } catch (PDOException $e) {
        echo "Databasefout: " . $e->getMessage();
        return false;
    }
}

}