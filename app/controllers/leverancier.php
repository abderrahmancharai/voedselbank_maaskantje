<?php

class leverancier extends Controller
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
        

            $rows = '';




            foreach ($getleverancier as $value) {
    
    
                $rows .= "<tr>
                
                            <td>$value->BedrijfsNaam</td>
                            <td>$value->ContactPersoon</td>  
                            <td>$value->naam</td>
                            <td>$value->aantal</td>
                            <td>$value->DatumLevering</td>
                            <td><a href='" . URLROOT . "/Leverancier/details/$value->leverancierId'><i class='bx bxs-user'></i></a></td>
                            <td><a href='" . URLROOT . "/Leverancier/update/$value->leverancierId'><i class='bx bxs-edit-alt'></i></i></a></td>
                            <td><a href='" . URLROOT . "/Leverancier/delete/$value->leverancierId'><i class='bx bx-x'></i></i></i></a></td>
                            </tr>
                            ";
            }
    
            $data = [
                'title' => 'magazijn in dienst',
        
                'rows' => $rows
            ];
       

        $this->view('leverancier/index',$data);
    }
}