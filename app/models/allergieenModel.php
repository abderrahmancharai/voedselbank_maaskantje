    <?php
    class allergieenModel {
        // Properties, fields
        private $db;
        public $helper;

        public function __construct() 
        {
        $this->db = new Database();
        }

        public function getallergieen()
        {
            try
            { $sql = "SELECT   Gezin.id AS GezinId,
                                Gezin.Naam AS Gezinsnaam,
                                Gezin.Omschrijving,
                                Gezin.AantalVolwassenen,
                                Gezin.AantalKinderen,
                                Gezin.AantalBabys,
                                Persoon.Voornaam AS VertegenwoordigerNaam
                        FROM Gezin
                        INNER JOIN Persoon 
                        ON Gezin.Id = Persoon.GezinId
                        WHERE Persoon.IsVertegenwoordiger = 1;";

                $this->db->query($sql);
                $result = $this->db->resultSet();
                return $result;

            } catch(PDOException $error)
            {
                echo $error->getMessage();

                throw $error->getMessage();
            }
        }

       public function getAllergeenById($GezinId)
       {
    try {
        $sql = "SELECT Gezin.id,
                       Gezin.Naam AS Gezinsnaam,
                       Gezin.Omschrijving,
                       Gezin.TotaalAantalPersonen
                FROM Gezin
                WHERE Gezin.Id = :gezinid";

        $this->db->query($sql);
        $this->db->bind(':gezinid', $GezinId, PDO::PARAM_INT);
        $result = $this->db->resultSet();
        return $result;
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}


        public function allergieendetails($GezinId)
    {
        try
        {
            $sql = "SELECT 
                Persoon.Voornaam, 
                Persoon.TypePersoon, 
                Persoon.IsVertegenwoordiger,
                Allergie.Naam
            FROM Gezin
            INNER JOIN Persoon ON Gezin.Id = Persoon.GezinId
            LEFT JOIN AllergiePerPersoon ON Persoon.Id = AllergiePerPersoon.PersoonId
            LEFT JOIN Allergie ON AllergiePerPersoon.AllergieId = Allergie.Id
            WHERE Gezin.Id = :gezinid";

            $this->db->query($sql);
            $this->db->bind(':gezinid', $GezinId, PDO::PARAM_INT);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $error) {
            echo $error->getMessage();
            throw $error;
        }
    }
    }