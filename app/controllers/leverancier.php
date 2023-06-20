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
        var_dump($POST);
        $update = $this->LeverancierModel->  update($POST);
   


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
}