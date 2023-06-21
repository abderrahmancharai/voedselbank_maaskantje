<?php

class Leverancier extends Controller
{
    // Properties, field
    private $LeverancierModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->LeverancierModel = $this->model('LeverancierModel'); // Model initialisatie
    }

    public function index()
    {
        
        $getleverancier = $this->LeverancierModel->getleverancier();

        // $contactgegevens = $this->LeverancierModel->getLeverancierById($productId);

        // var_dump($getLeverancierById);
  
        

            $rows = '';




            foreach ($getleverancier as $value) {
    
    
                $rows .= "<tr>
                
                            <td>$value->Naam</td>
                            <td>$value->ContactPersoon</td>  
                            <td>$value->Email</td> 
                            <td>$value->Mobiel</td>
                            <td>$value->LeverancierNummer</td>
                            <td>$value->LeverancierType</td> 
                            <td><a href='" . URLROOT . "/Leverancier/details/$value->Id/'><i class='bx bx-box'></i></i></a></td>
                            </tr>
                         
                            ";
            }


 
            $data = [
                'rows' => $rows,
                // 'Naam' => $contactgegevens->Naam,
                // 'LeverancierNummer' => $contactgegevens->LeverancierNummer,
                // 'LeverancierType' => $contactgegevens->LeverancierType
            ];
       

        $this->view('leverancier/index',$data);
    }


    public function details($leverancierId)
        {

    $productDetailsByLeverancierId = $this->LeverancierModel->getProductenByLeverancierId($leverancierId);

    $datum = $this->LeverancierModel->getDatumById($productId);



  

        $rows = '';
        foreach ($productDetailsByLeverancierId as $value) {
            $rows .= "<tr>             
                        <td>$value->Naam</td>
                        <td>$value->SoortAllergie</td>  
                        <td>$value->Barcode</td>
                        <td>$value->HoudbaarheidsDatum</td>
                        <td><a href='" . URLROOT . "/Leverancier/update/$value->Id/$value->productId'><i class='bx bx-box'></i></i></a></td>
                        </tr>
                        ";
        }

        $data = [

            'rows' => $rows,

        ];
   

    $this->view('Leverancier/details', $data);
}


public function update($leverancierId = NULL, $productId = NULL)
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          var_dump("Ik ben bij update get" );

          $product = $this->LeverancierModel->getProductenByLeverancierId($productId);

          var_dump($product);




          $data = [
                    // 'leveranciernaam' => $contactGegevens->Naam,
                    // 'contactpersoon' => $contactGegevens->ContactPersoon,
                    // 'leveranciernummer' => $contactGegevens->LeverancierNummer,
                    // 'mobiel' => $contactGegevens->Mobiel,
                    'leverancierId' => $leverancierId,
                    'productId' => $productId,
              
                  ];


            $this->view('/Leverancier/update', $data);
        } else {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump("Ik ben bij update");
            // var_dump($leverancierId);
            //exit();
            // var_dump($_POST);

 

            $result = $this->LeverancierModel->update($_POST);  

            header('Location: ' . URLROOT . '/Leverancier/details/' . $_POST['productId']);
            
        }
    }


    // public function update($leverancierId = 0)
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
    //         if (empty($POST["product"])) {
    //             echo "je bent vergeten om iets in tevullen bij product";
    //             header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
    //         } else {
    //             $update = $this->LeverancierModel->update($POST);
    //             echo "leverancier is geupdate";
    //             header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
    //         }
    //     } else {
    //         $updateleverancierbyid = $this->LeverancierModel->updateleverancierbyid($leverancierId);
    
    //         $data = [
    //             'title' => 'magazijn in dienst',
    //             'leverancierId' => $updateleverancierbyid->leverancierId,
    //             'ContactPersoon' => $updateleverancierbyid->ContactPersoon,
    //             'BedrijfsNaam' => $updateleverancierbyid->BedrijfsNaam,
    //             'Email' => $updateleverancierbyid->Email,
    //             'Mobiel' => $updateleverancierbyid->Mobiel,
    //             'Huisnummer' => $updateleverancierbyid->Huisnummer,
    //             'Straat' => $updateleverancierbyid->Straat,
    //             'Postcode' => $updateleverancierbyid->Postcode,
    //             'DatumEerstVolgendeLevering' => $updateleverancierbyid->DatumEerstVolgendeLevering,
    //             'product' => $updateleverancierbyid->Naam,
    //             'DatumLevering' => $updateleverancierbyid->DatumLevering,
    //         ];
    
    //         $this->view('Leverancier/update', $data);
    //     }
    // }
    

public function toevoegen()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        if (empty($POST["product"])) {
            echo "Je bent vergeten om iets in te vullen bij product";
            header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
          
        } else {
            $update = $this->LeverancierModel->update($POST);
            echo "Leverancier is geüpdatet";
            header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
        }
        $toevoegen = $this->LeverancierModel->toevoegen($POST);
    } else {
        $this->view('Leverancier/toevoegen');
    }
}


public function delete($LeverancierId)
{
    $delete = $this->LeverancierModel->delete($LeverancierId);
    echo "leverancier is verwijderd";
    header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
    $this->view('Leverancier/delete');
}
}
