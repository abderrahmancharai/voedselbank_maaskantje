<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h1>klant details</h1>
           
<form action="<?= URLROOT; ?>/klanten/update" method="post">
  <table>
    <tbody>
   
      <tr>
        <td>
            <label for="firstname">Voornaam</label>
          <input type="text" name="Voornaam" id="Voornaam" value="<?= $data["klant"]->Voornaam; ?>">
        </td>
      </tr>
      <tr>
        <td>
            <label for="Tussenvoegsel">Tussenvoegsel</label>
          <input type="text" name="Tussenvoegsel" id="Tussenvoegsel" value="<?= $data["klant"]->Tussenvoegsel; ?>">
        </td>
      </tr>
      <tr>
        <td>
            <label for="achternaam">Achternaam</label>
          
         <input type="text" name="Achternaam" id="Achternaam" value="<?= $data["klant"]->Achternaam; ?>">
        </td>
      </tr>
      <tr>
        <td>
            <label for="mobiel">mobiel</label>
         <input type="number" name="Mobiel"  value="<?= $data["klant"]->mobiel; ?>">
        </td>
      </tr>
      <tr>
      <tr>
        <td>
            <label for="Email">Email</label>
         <input type="email" name="Email" id="Email"value="<?= $data["klant"]->Email;  ?>"   >
        </td>
      </tr>
      <tr>
        <td>

            <label for="IsVolwassen">IsVolwassen</label>
         <input type="number" name="IsVolwassen" value="<?= $data["klant"]->IsVolwassen; ?>">
        </td>

        <tr>
        <td>
            <input type="hidden" name="persoonId" value="<?= $data["klant"]->persoonId; ?>">
        </td>
        <td>
        
        </td>
      </tr>
         <tr>
      </tr>
      <tr>
        <td>
          <input type="submit" value="update">
        </td>
      </tr>
    </tbody>
  </table>

</form>
    

       
      

    
</body>
</html>