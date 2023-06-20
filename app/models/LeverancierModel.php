<?php
class LeverancierModel
{
    // Properties, fields
    private $db;
    public $helper;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getleverancier()
    {

        try {
            $sql="
        select
        leverancier.Id as leverancierId,
             leverancier.BedrijfsNaam,
		leverancier.ContactPersoon,
         product.naam,
        leverancier.aantal,
        productperleverancier.DatumLevering
       
        
        from leverancier
        
        inner join  productperleverancier on
        Leverancier.Id = productperleverancier.LeverancierId
        
         inner join  product on
        product.Id = productperleverancier.ProductId";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;

        } catch(PDOException $error) {
            echo $error->getMessage();
            throw $error->getMessage();
        }
    }
}