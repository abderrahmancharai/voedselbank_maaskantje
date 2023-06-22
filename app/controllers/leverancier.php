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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  

        $getleverancier = $this->LeverancierModel->filterByType($POST);


                 

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

            if (empty($value)) {
                $data = [
                   
                    'rows' => "<tr><td colspan='8'><div class='alert alert-warning' role='alert'>Er zijn geen gezinnen bekent die de geselecteerde eetwens hebben</div></td></tr>"
                ];
            }
       

        $this->view('leverancier/index',$data);

        } else {
            $getleverancier = $this->LeverancierModel->getleverancier();

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

            ];

        $this->view('leverancier/index',$data);
    }
    }

    public function details($leverancierId)
        {

    $productDetailsByLeverancierId = $this->LeverancierModel->getProductenByLeverancierId($leverancierId);




  

        $rows = '';
        foreach ($productDetailsByLeverancierId as $value) {
            $rows .= "<tr>             
                        <td>$value->Naam</td>
                        <td>$value->SoortAllergie</td>  
                        <td>$value->Barcode</td>
                        <td>$value->HoudbaarheidsDatum</td>
                        <td><a href='" . URLROOT . "/Leverancier/update/$value->productId'><i class='bx bxs-edit-alt'></i></i></a></td>
                        </tr>
                        ";
        }

        $data = [

            'rows' => $rows,

        ];
   

    $this->view('Leverancier/details', $data);
}


public function update($productId = NULL)
{ 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        // Get the current date
        $currentDate = date('Y-m-d');
        
        // Calculate the date after 7 days
        $nextDate = date('Y-m-d', strtotime($currentDate . ' + 7 days'));

        if ($POST['Houdbaarheidsdatum'] >= $nextDate) {
            $result = $this->LeverancierModel->update($POST);

            if ($POST) {
                // Update successful
                $message = "<div style='background-color: #d4edda; color: #155724; padding: 10px;'>De houdbaarheids datum is gewijzigd</div>";
                header("Refresh: 3; URL=" . URLROOT . "/Leverancier/index" . $POST['productId']);
                echo $message;
            }
          } else {
            // Date is not after 7 days
            $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px;'>De geselecteerde datum moet minimaal 7 dagen vooruit liggen</div>";
            header("Refresh: 3; URL=" . URLROOT . "/Leverancier/index" . $POST['productId']);
            echo $message;
        }
    } else {
        $datum = $this->LeverancierModel->getDatumById($productId);
        $data = [
            'productId' => $productId,
            'Houdbaarheidsdatum' => $datum->Houdbaarheidsdatum
        ];

        $this->view('/Leverancier/update', $data);
    }
}



}