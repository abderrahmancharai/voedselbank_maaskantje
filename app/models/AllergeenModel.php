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