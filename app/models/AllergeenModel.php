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
}