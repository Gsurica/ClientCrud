<?php 

  if (count($_POST) > 0) {

    $ERRORS = ["EMPTY-FIELD", "INVALID-TYPE", "UNKNOW"];
    $isError = false;

    function clearStrings ($string) {
      return preg_replace("/[^0-9]/", "", $string);
    }

    function throwErrors ($errorText, $errorType, $errorIndex) {

      global $ERRORS;
      global $isError;

      switch ($errorType) {
        case $ERRORS[0]:
          $isError = true;
          echo '<div class="alert alert-danger" role="alert">'
                  . $errorText . " <b>(ERROR INDEX):</b> " . $errorIndex . 
                '</div>';
          break;
        case $ERRORS[1]:
          $isError = true;
          echo '<div class="alert alert-danger" role="alert">'
                  . $errorText . " <b>(ERROR INDEX):</b> " . $errorIndex . 
              '</div>';
          break;
        case $ERRORS[2]:
          $isError = true;
          echo '<div class="alert alert-danger" role="alert">'
                  . $errorText . " <b>(ERROR INDEX):</b> " . $errorIndex . 
              '</div>';
          break;
        case $ERRORS[3]:
          $isError = true;
          echo '<div class="alert alert-danger" role="alert">'
                . $errorText . " <b>(ERROR INDEX):</b> " . $errorIndex . 
              '</div>';
          break;
        default:
          $isError = false;
          break;
      }

    }

    function verifyFields ($fieldOne, $fieldTwo, $fieldThree = "", $fieldFour = "") {

      global $ERRORS;

      if (strlen($fieldOne) === 0) {
        throwErrors("THE NAME FIELD MUST NOT OT BE EMPTY ", $ERRORS[0], 0);
      }

      if (strlen($fieldTwo) === 0) {
        throwErrors("THE EMAIL FIELD MUST NOT OT BE EMPTY ", $ERRORS[0], 0);
      }

      if ($fieldThree !== "") {
        $fieldThree = implode("-", array_reverse(explode("/", $fieldThree)));
      }

      if ($fieldFour !== "") {
        $fieldFour = clearStrings($fieldFour);
        if (strlen($fieldFour) > 11 || strlen($fieldFour) < 11) {
          throwErrors("THE VALUE PUT IN IS INVALID", $ERRORS[2], 2);
        }
      }
    }

    verifyFields($_POST["name"], $_POST["email"], $_POST["birthday"], $_POST["birthday"]);

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciar seus clientes!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="./css/index.css" rel="stylesheet" >
</head>
<body>
  <form action="" method="POST">
    <div class="container bg-danger">
      <div class="row d-flex flex-column">
        <div class="col-sm-6 d-flex bg-danger flex-column ">
          <input type="text" value="<?php if(isset($_POST["name"])) echo $_POST["name"]; ?>" name="name" id="inputName" placeholder="Nome" />
          <input type="text" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" name="email" id="inputEmail" placeholder="Email" />
          <input type="text" value="<?php if(isset($_POST["cel"])) echo $_POST["cel"]; ?>" name="cel" id="inputTel" placeholder="(00) 99999-8888" />
          <input type="text" value="<?php if(isset($_POST["birthday"])) echo $_POST["birthday"]; ?>" name="birthday" id="inputNascimento" placeholder="00/00/0000" />
        </div>
        <div class="col-sm-6">
          <button class="btn bg-info" type="submit">Criar cliente</button>
        </div>
      </div>
    </div>
  </form>
</body>
</html>