<?php
Class VoedselPakketModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPaketten()
    {
        try{
        $sql =  "SELECT 
    pakket.Id AS pakketId,
    Klant.Id AS KlantId,
    Klant.Naam,
    Gezin.AantalVolwassen,
    Gezin.AantalKinderen,
    Gezin.AantalBaby
FROM Gezin
INNER JOIN Klant ON Gezin.Id = Klant.GezinId
INNER JOIN Pakket ON Klant.Id = Pakket.KlantId
WHERE Klant.Id = 1
GROUP BY Klant.Id
";

        }catch(PDOException $error){
            echo $error->getMessage();
        }

        $this->db->query($sql);

        $result = $this->db->resultSet();
        return $result;
    }

    public function getPakketById($id)
    {

        try{
        $sql =  "SELECT 
                         PAK.Id AS PakketId
                        ,KLANT.Id AS KlantId
                        ,KLANT.Naam AS KlantNaam 
                        ,PROD.Categorie
                        ,PAK.Aantal
                        ,PROD.Naam
                        ,PROD.id as productId
                    
                    FROM Pakket AS PAK
                    INNER JOIN Product AS PROD
                    ON PAK.ProductId = PROD.Id
                    
                    INNER JOIN Klant AS KLANT
                    ON KLANT.Id = PAK.KlantId
                    WHERE  KLANT.Id = :id";

        }catch(PDOException $error){
            echo $error->getMessage();
        }

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;
    }
}