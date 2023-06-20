<?php

class Allergeen extends Controller

{
    private $allergeenModel;

    public function __construct()
    {
        $this->allergeenModel = $this->model('AllergeenModel');
    }

    public function index()
    {

        $data = [
            'title' => 'Allergeen Index'
        ];

        $this->view('allergeen/index', $data);
    }

    public function allergeenoverzicht()
{
    $allergeen = $this->allergeenModel->getAllergeen(); 
    $rows = '';
    foreach ($allergeen as $value) {
        $rows .= "<tr>
            <td>$value->KlantNaam</td>
            <td>$value->Naam</td>
            <td>$value->Omschrijving</td>
            <td><a href='" . URLROOT . "/allergeen/update/$value->Id'><img src='" . URLROOT . "/img/bx-edit.svg' alt='Info'></a>
            <td><a href='" . URLROOT . "/allergeen/delete/$value->Id'><img src='" . URLROOT . "/img/bx-x.svg' alt='Info'></a>
        </tr>";
    }
    $data = [
        'title' => 'Allergeen',
        'rows' => $rows
    ];
    $this->view('allergeen/allergeenoverzicht', $data);
}

public function update($allergeenId)
{
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data = [
            'allergeenId' => $allergeenId,
            'naam' => $_POST['naam'],
            'omschrijving' => $_POST['omschrijving'],
            'klantnaam' => $_POST['klantNaam']
        ];

        if (empty($data['naam']) || empty($data['omschrijving']) || empty($data['klantnaam'])) {
            echo "Vul alle velden in";
            header("Refresh: 4; URL=" . URLROOT . "/allergeen/allergeenoverzicht");
        } else {
            $this->allergeenModel->updateAllergeen($data);
            $_SESSION['message'] = 'Successful update';
            header("Refresh: 2; URL=" . URLROOT . "/allergeen/allergeenoverzicht/$allergeenId");
            echo "de klant is gewijzigd";
        }
    } else {
        $allergeen = $this->allergeenModel->getSingleAllergeen($allergeenId);

        if ($allergeen) {
            $data = [
                'title' => 'Update Allergeen',
                'allergeen' => $allergeen
            ];

            $this->view("allergeen/update", $data);
        } else {
            // Handle the case when the allergeen is not found
        }
    }
}



public function delete($allergeenId)
{
    $deleteStatus = $this->allergeenModel->delete($allergeenId);

    if ($deleteStatus) {
      $data = ['deleteStatus' => 'Allergeen is verwijderd'];

 header("Refresh: 2; URL=" . URLROOT . "/allergeen/allergeenoverzicht/$allergeenId");
    echo "Allergeen is verwijderd";
}
}

public function create()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'naam' => isset($_POST['naam']) ? trim($_POST['naam']) : '',
                'omschrijving' => isset($_POST['omschrijving']) ? trim($_POST['omschrijving']) : '',
                'klantnaam' => isset($_POST['klantnaam']) ? trim($_POST['klantnaam']) : ''
            ];

            if (empty($data['naam']) || empty($data['omschrijving']) || empty($data['klantnaam'])) {
                echo "Vul alle velden in";
                header("Refresh: 4; URL=" . URLROOT . "/allergeen/allergeenoverzicht");
            } else {
                if ($this->allergeenModel->createAllergeen($data)) {
                    header("Refresh: 2; URL=" . URLROOT . "/allergeen/allergeenoverzicht");
                    echo "Allergeen is gemaakt";
                } else {
                    echo "Failed to create Allergeen";
                }
            }
        } catch (PDOException $e) {
            echo "Het inserten van het record is niet gelukt";
            header("Refresh: 3; URL=" . URLROOT . "/allergeen/allergeenoverzicht");
            exit;
        }
    } else {
        $data = [
            'title' => "Create Allergeen"
        ];

        $this->view("allergeen/create", $data);
    }
}




}