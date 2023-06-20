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

    public function update($leverancierId = 0)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if (empty($POST["product"])) {
                echo "je bent vergeten om iets in tevullen bij product";
                header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
            } else {
                $update = $this->LeverancierModel->update($POST);
                echo "leverancier is geupdate";
                header("Refresh: 4; URL=" . URLROOT . "/leverancier/index");
            }
        } else {
            $updateleverancierbyid = $this->LeverancierModel->updateleverancierbyid($leverancierId);
    
            $data = [
                'title' => 'magazijn in dienst',
                'leverancierId' => $updateleverancierbyid->leverancierId,
                'ContactPersoon' => $updateleverancierbyid->ContactPersoon,
                'BedrijfsNaam' => $updateleverancierbyid->BedrijfsNaam,
                'Email' => $updateleverancierbyid->Email,
                'Mobiel' => $updateleverancierbyid->Mobiel,
                'Huisnummer' => $updateleverancierbyid->Huisnummer,
                'Straat' => $updateleverancierbyid->Straat,
                'Postcode' => $updateleverancierbyid->Postcode,
                'DatumEerstVolgendeLevering' => $updateleverancierbyid->DatumEerstVolgendeLevering,
                'product' => $updateleverancierbyid->Naam,
                'DatumLevering' => $updateleverancierbyid->DatumLevering,
            ];
    
            $this->view('Leverancier/update', $data);
        }
    }
    
public function details($leverancierId)
{

    $detailsleverancierbyid = $this->LeverancierModel->detailsleverancierbyid($leverancierId);
    $detailsname = $this->LeverancierModel->detailsname($leverancierId);

        $rows = '';
        foreach ($detailsleverancierbyid as $value) {
            $rows .= "<tr>             
                        <td>$value->Naam</td>
                        <td>$value->Email</td>  
                        <td>$value->Mobiel</td>
                        <td>$value->Straat</td>
                        <td>$value->Huisnummer</td>
                        <td>$value->Postcode</td>
                        <td>$value->DatumEerstVolgendeLevering</td>
                        </tr>
                        ";
        }

        $data = [
            'title' => 'magazijn in dienst',
            'ContactPersoon' => $detailsname->ContactPersoon,
            'BedrijfsNaam' => $detailsname->BedrijfsNaam,
            'rows' => $rows
        ];
   

    $this->view('Leverancier/details', $data);
}
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
