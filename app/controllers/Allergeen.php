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

        $this->allergeenModel->updateAllergeen($data);

        $SESSION['message'] = 'Successful update';

        header("Location: " . URLROOT . "/allergeen/allergeenoverzicht");
        exit();
    } else {
        $allergeen = $this->allergeenModel->getSingleAllergeen($allergeenId);

        if ($allergeen) {
            $data = [
                'title' => 'Update Allergeen',
                'allergeen' => $allergeen
            ];

            $this->view("allergeen/update", $data);
        } else {
        }
    }
}

public function delete($allergeenId)
{
    $deleteStatus = $this->allergeenModel->delete($allergeenId);

    if ($deleteStatus) {
      $data = ['deleteStatus' => 'Allergeen is verwijderd'];

    // Set the redirect URL
    $redirectURL = URLROOT . '/allergeen/allergeenoverzicht';

    // Redirect to the specified URL after 3 seconds
    header("Refresh: 3; url=" . $redirectURL);
    exit; // Terminate script execution after redirection
}
}




}