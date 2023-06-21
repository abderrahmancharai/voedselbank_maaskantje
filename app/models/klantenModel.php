<?php
class klantenModel
{
  // Properties, fields
  private $db;
  public $helper;

  public function __construct()
  {
    $this->db = new Database();
  }

public function getklant()
    {
        $sql = "SELECT
    Persoon.Id AS Id,
    Gezin.Naam AS NaamGezin,
    CONCAT_WS(' ', Persoon.Voornaam, NULLIF(Persoon.Tussenvoegsel, ''), Persoon.Achternaam) AS Vertegenwoordiger,
    Contact.Email AS E_mailadres,
    Contact.Mobiel,
    Contact.Straat AS Adres,
    Contact.Woonplaats,
    Contact.Postcode
FROM
    Persoon
    LEFT JOIN Gezin ON Persoon.GezinId = Gezin.Id
    LEFT JOIN ContactPerGezin ON Persoon.GezinId = ContactPerGezin.GezinId
    LEFT JOIN Contact ON ContactPerGezin.ContactId = Contact.Id
WHERE
    Contact.Email IS NOT NULL AND Contact.Mobiel IS NOT NULL;


";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
}

public function details($PersoonId)
{
    try {
        $sql = "
       SELECT
        p.Voornaam,
        p.Tussenvoegsel,
        p.Achternaam,
        p.Geboortedatum,
        p.TypePersoon,
        CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
        c.Straat AS Straatnaam,
        c.Huisnummer,
        c.Toevoeging,
        c.Postcode,
        c.Woonplaats,
        c.Email,
        c.Mobiel
    FROM
        Persoon AS p
    INNER JOIN
        Contact AS c ON p.Id = c.Id
    WHERE
        p.id = :persoonid
        ";

        $this->db->query($sql);
        $this->db->bind(':persoonid', $PersoonId, PDO::PARAM_INT);

        $result = $this->db->resultSet();
        return $result;

    } catch(PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

public function updateinfo($PersoonId, $data)
{
    try {
        $sql = "
            UPDATE Persoon AS p
            INNER JOIN Contact AS c ON p.Id = c.Id
            SET
                p.Voornaam = :voornaam,
                p.Tussenvoegsel = :tussenvoegsel,
                p.Achternaam = :achternaam,
                p.Geboortedatum = :geboortedatum,
                p.TypePersoon = :typePersoon,
                p.IsVertegenwoordiger = :vertegenwoordiger,
                c.Straat = :straatnaam,
                c.Huisnummer = :huisnummer,
                c.Toevoeging = :toevoeging,
                c.Postcode = :postcode,
                c.Woonplaats = :woonplaats,
                c.Email = :email,
                c.Mobiel = :mobiel
            WHERE
                p.Id = :persoonId
        ";

        $this->db->query($sql);
        $this->db->bind(':voornaam', $data['voornaam']);
        $this->db->bind(':tussenvoegsel', $data['tussenvoegsel']);
        $this->db->bind(':achternaam', $data['achternaam']);
        $this->db->bind(':geboortedatum', $data['geboortedatum']);
        $this->db->bind(':typePersoon', $data['typePersoon']);
        $this->db->bind(':vertegenwoordiger', $data['vertegenwoordiger']);
        $this->db->bind(':straatnaam', $data['straatnaam']);
        $this->db->bind(':huisnummer', $data['huisnummer']);
        $this->db->bind(':toevoeging', $data['toevoeging']);
        $this->db->bind(':postcode', $data['postcode']);
        $this->db->bind(':woonplaats', $data['woonplaats']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobiel', $data['mobiel']);
        $this->db->bind(':persoonId', $PersoonId, PDO::PARAM_INT);

        $this->db->execute();

        // Return the number of affected rows
        return $this->db->rowCount();
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}

public function update($PersoonId, $data)
{
    try {
        $sql = "
            UPDATE Persoon
            SET
                Voornaam = :voornaam,
                Tussenvoegsel = :tussenvoegsel,
                Achternaam = :achternaam,
                Geboortedatum = :geboortedatum,
                TypePersoon = :typePersoon,
                IsVertegenwoordiger = :vertegenwoordiger
            WHERE
                Id = :persoonId
        ";

        $this->db->query($sql);
        $this->db->bind(':voornaam', $data['voornaam']);
        $this->db->bind(':tussenvoegsel', $data['tussenvoegsel']);
        $this->db->bind(':achternaam', $data['achternaam']);
        $this->db->bind(':geboortedatum', $data['geboortedatum']);
        $this->db->bind(':typePersoon', $data['typePersoon']);
        $this->db->bind(':vertegenwoordiger', $data['vertegenwoordiger']);
        $this->db->bind(':persoonId', $PersoonId, PDO::PARAM_INT);

        $this->db->execute();

        // Return the number of affected rows
        return $this->db->rowCount();
    } catch (PDOException $error) {
        echo $error->getMessage();
        throw $error;
    }
}


}
// public function getKlantDetails($klantId)
// {
//     try {
//         $sql = "
//         SELECT
//             p.Voornaam,
//             p.Tussenvoegsel,
//             p.Achternaam,
//             p.Geboortedatum,
//             p.TypePersoon,
//             CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
//             c.Straat AS Straatnaam,
//             c.Huisnummer,
//             c.Toevoeging,
//             c.Postcode,
//             c.Woonplaats,
//             c.Email,
//             c.Mobiel
//         FROM
//             Persoon AS p
//         INNER JOIN
//             Contact AS c ON p.Id = c.Id
//         WHERE
//             p.Id = :klantId";

//         $this->db->query($sql);
//         $this->db->bind(':klantId', $klantId);
//         $result = $this->db->single();
//         return $result;
//     } catch(PDOException $error) {
//         echo $error->getMessage();
//         throw $error->getMessage();
//     }
// }
// }
// public function getklantoverzicht()
// {
    // $sql = "SELECT
    //     p.Voornaam,
    //     p.Tussenvoegsel,
    //     p.Achternaam,
    //     p.Geboortedatum,
    //     p.TypePersoon,
    //     CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
    //     c.Straat AS Straatnaam,
    //     c.Huisnummer,
    //     c.Toevoeging,
    //     c.Postcode,
    //     c.Woonplaats,
    //     c.Email,
    //     c.Mobiel
    // FROM
    //     Persoon AS p
    // INNER JOIN
    //     Contact AS c ON p.Id = c.Id";

//     $this->db->query($sql);
//     $result = $this->db->resultSet();
//     return $result;
// }

// public function getklantoverzichtbyid($contactId)
// {
//     $sql = "SELECT
//         p.Voornaam,
//         p.Tussenvoegsel,
//         p.Achternaam,
//         p.Geboortedatum,
//         p.TypePersoon,
//         CASE WHEN p.IsVertegenwoordiger = 1 THEN 'Ja' ELSE 'Nee' END AS Vertegenwoordiger,
//         c.Straat AS Straatnaam,
//         c.Huisnummer,
//         c.Toevoeging,
//         c.Postcode,
//         c.Woonplaats,
//         c.Email,
//         c.Mobiel
//     FROM
//         Persoon AS p
//     INNER JOIN
//         Contact AS c ON p.Id = c.Id
//     WHERE
//         c.Id = :contactId";

//     $this->db->query($sql);
//     $this->db->bind(':contactId', $contactId);
//     $result = $this->db->resultSet();
//     return $result;
// }

// }

  // public function getklantbyid($persoonId)
  // {
  //   $sql = "select 
	// typepersoon.Id as  typepersoonId
  //   ,persoon.Id    as  persoonId 
  //   ,contact.Id    as  contactId 
  //       ,persoon.Voornaam
  //   ,persoon.Tussenvoegsel
  //   ,persoon.Achternaam
  //   ,persoon.IsVolwassen
  //   ,contact.mobiel
  //   ,contact.Email
  //   from typepersoon
    
  //   inner join  persoon on
  //   TypePersoonId = typepersoon.Id
    
  //   inner join contact on
  //   contact.PersoonId = persoon.Id where persoonId = :persoonid";
  //   $this->db->query($sql);
  //   $this->db->bind(':persoonid', $persoonId, PDO::PARAM_INT);
  //   $result = $this->db->single();
  //   return $result;
  // }











  // public function update($post)
  // {
  //   if (empty($post["Email"])) {
  //     return true;
  //   } else {
  //     $sql = "UPDATE typepersoon 
  //         inner join persoon on TypePersoonId = typepersoon.Id
  //         inner join contact on contact.PersoonId = persoon.Id
  //         SET persoon.Voornaam = :Voornaam,
  //         persoon.Tussenvoegsel = :Tussenvoegsel,
  //         persoon.achternaam = :Achternaam,
  //         persoon.IsVolwassen = :IsVolwassen,
  //         contact.Email= :Email,
  //         contact.Mobiel = :Mobiel
  //         WHERE persoon.Id = :persoonId;";
  //     $this->db->query($sql);
  //     $this->db->bind(':persoonId', $post["persoonId"], PDO::PARAM_INT);
  //     $this->db->bind(':Voornaam', $post["Voornaam"], PDO::PARAM_STR);
  //     $this->db->bind(':Tussenvoegsel', $post["Tussenvoegsel"], PDO::PARAM_STR);
  //     $this->db->bind(':Achternaam', $post["Achternaam"], PDO::PARAM_STR);
  //     $this->db->bind(':IsVolwassen', $post["IsVolwassen"], PDO::PARAM_INT);
  //     $this->db->bind(':Email', $post["Email"], PDO::PARAM_STR);
  //     $this->db->bind(':Mobiel', $post["Mobiel"], PDO::PARAM_INT);
  //     $this->db->execute();
  //     $result = $this->db->resultSet();
  //     return $result;

    
  //   }
  // }


  // public function search($post)
  // { 


  //   $sql = "select  	 persoon.id
  //   ,persoon.Voornaam
  //   ,persoon.Tussenvoegsel
  //   ,persoon.Achternaam
  //   ,contact.Mobiel
  //   ,contact.Email
  //   ,DATE(persoon.DatumAangemaakt) as Datum
  //   ,persoon.IsVolwassen
  //   from 		persoon
  //   inner join 	contact 
  //   on	contact.PersoonId = persoon.Id  
  //   where 		persoon.DatumAangemaakt <= :DatumAangemaakt 
  //   order by persoon.Achternaam ASC";
  //   $this->db->query($sql);
  //   $this->db->bind(':DatumAangemaakt', $post["datum"], PDO::PARAM_INT);
  //   $result = $this->db->resultSet();


  //   if (empty($result)) {
  //     return false;
  //   } else {
  //     return $result;
  //   }
  // }