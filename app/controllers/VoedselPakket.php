<?php

class VoedselPakket extends Controller
{
    // Properties, field
    private $VoedselPakketModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->VoedselPakketModel = $this->model('VoedselPakketModel'); // Model initialisatie
    }
    public function index()
    {


        $this->view('VoedselPakket/index');

    }

    public function read()
    {
        $nietgevonden = ''; 
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          
            $search = $this->VoedselPakketModel->SEARCH($POST);
            if (empty($search)) {
                $nietgevonden = 'er zijn geen gezinnen bekent die de geslecteerde eetwens hebben';
            }
    
            $rows = '';
            foreach ($search as $value) {
                $rows .= "<tr>
                    <td>$value->Naam</td>
                    <td>$value->Omschrijving</td>
                    <td>$value->AantalVolwassen</td>
                    <td>$value->AantalKinderen</td>
                    <td>$value->AantalBaby</td>
                    <td>$value->vertegwoordiger</td>
                    <td><a href='" . URLROOT . "/VoedselPakket/details/$value->gezinId'><i class='bx bxs-package'></i></a></td>
                    </tr>";
            }
    
            $data1 = [
                'title' => 'overzicht gezinnen met voedselpakket',
                'nietgevonden' => $nietgevonden,
                'rows' => $rows
            ];
            $this->view('VoedselPakket/read', $data1);
        } else {
            $getzin = $this->VoedselPakketModel->getgezin();
            $rows = '';
    
            foreach ($getzin as $value) {
                $rows .= "<tr>
                    <td>$value->Naam</td>
                    <td>$value->Omschrijving</td>
                    <td>$value->AantalVolwassen</td>
                    <td>$value->AantalKinderen</td>
                    <td>$value->AantalBaby</td>
                    <td>$value->vertegwoordiger</td>
                    <td><a href='" . URLROOT . "/VoedselPakket/details/$value->gezinId'><i class='bx bxs-package'></i></a></td>
                    </tr>";
            }
    
            $data = [
                'title' => 'overzicht gezinnen met voedselpakket',
                'rows' => $rows
            ];
    
            $this->view('VoedselPakket/read', $data);
        }
    }
    


    public function details($GezinId)
    {
        $details = $this->VoedselPakketModel->details($GezinId);
        $gezinbyid = $this->VoedselPakketModel->gezinbyid($GezinId);

        $rows = '';






        foreach ($details as $value) {


            $rows .= "<tr>
                
                            <td>$value->PakkketNummer</td>
                            <td>$value->DatumSamenstelling</td>  
                            <td>$value->DatumUitgifte</td>
                            <td>$value->Status</td>
                            <td>$value->Product</td>
                            <td><a href='" . URLROOT . "/VoedselPakket/update/$value->voedselpakketId'><i class='bx bxs-edit-alt'></i></i></a></td>
                            </tr>
                            ";
        }

        $data = [
            'title' => 'overzicht voedselpakket',
            'naam' => $gezinbyid->naam,
            'omschrijving' => $gezinbyid->Omschrijving,
            'Totaal_personen' => $gezinbyid->Totaal_personen,


            'rows' => $rows
        ];


        $this->view('VoedselPakket/details', $data);

    }
    public function update($voedselpakketId = 0)
    {
        $successMessage = '';
        $foutmelding = ''; 
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
    
            $getupdateinfo = $this->VoedselPakketModel->update($POST);
            $successMessage = 'De wijziging is doorgevoerd';
    
            $data = [
                'voedselpakketId' => $POST["voedselpakketId"],
                'successMessage' => $successMessage,
                'foutmelding' => $foutmelding,
            ];
    
            $this->view('VoedselPakket/update', $data);
        } else {
            $getupdateinfo = $this->VoedselPakketModel->getupdateinfo($voedselpakketId);
    
            if ($getupdateinfo->IsActive == 0) {
                $foutmelding = 'Dit gezin is niet meer ingeschreven bij de voedselbank en daarom kan de status niet meer gewijzigd worden';
            }
    
            $data = [
                'title' => 'wijzigen van voedselpakket',
                'Status' => $getupdateinfo->Status,
                'voedselpakketId' => $getupdateinfo->voedselpakketId,
                'successMessage' => $successMessage,
                'foutmelding' => $foutmelding,
            ];
    
            $this->view('VoedselPakket/update', $data);
        }
    }
    
}    