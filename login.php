<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if (isset($_REQUEST['action']) && $_REQUEST['action'] == "login") {

    $db = new mysqli("localhost", "root", "", "serwer_logowania");

    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    
    $q = $db->prepare("SELECT * FROM dane WHERE email = ? LIMIT 1");
    $q->bind_param("s", $email);

    $q->execute();
    $result = $q->get_result();

    $userRow = $result->fetch_assoc();
    if ($userRow == null) {
        echo "Błędny login lub hasło";
    } else {
        if (password_verify($pass, $userRow['Passhash'])) {
            echo "Zalogowano poprawnie";
        } else {
            echo "Błędny login lub hasło";
        }
    }
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == "register") {
    $db = new mysqli("localhost", "root", "", "serwer_logowania");
    $email = $_REQUEST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $pass = $_REQUEST['password'];
    $passrepeat = $_REQUEST['passwordRepeat'];
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    
    if($pass = $passrepeat) {
        $q = $db->prepare("INSERT INTO dane VALUES (NULL, ?, ?, ?, ?)");
        $passhash = password_hash($pass, PASSWORD_ARGON2I);
        $q->bind_param("ssss", $email, $passhash, $name, $surname);
        $result = $q->execute();
        if($result){
            echo "Konto zostało utworzone poprawnie";
        } else {
            echo "Coś poszło nie tak";
        }
    } else {
        echo "Hasła nie są zgodnie - spróbuj ponownie!";
    }

}


?>
<div class="row">
<div class="column">
<h1> Zaloguj się</h1>
<form action="login.php" method="post">
        <div>
            <label for="emailInput">Email:</label>
        <input type="email" name="email" id="emailInput">
    </div>

        <div>
             <label for="passwordInput">Hasło:</label>
        <input type="password" name="password" id="passwordInput">
    </div>

        <div class="center">
            <input type="hidden" name="action" value="login">
        <input type="submit" value="Zaloguj">
    </div>

</form>
</div>
    <div class="column">
<h1>Zarejestruj się</h1>
<form action="login.php" method="post">
    <div class="column2">
        <label for="emailInput">Email:</label>
        <input type="email" name="email" id="emailInput">
    </div>

    <div class="column2">
        <label for="passwordInput">Hasło:</label>
        <input type="password" name="password" id="passwordInput">
    </div>

    <div class="column2">
        <label for="NameInput">Imie:</label>
        <input type="name" name="name" id="NameInput">
    </div>

    <div class="column2">
        <label for="surnameInput">Nazwisko:</label>
        <input type="name" name="surname" id="surnameInput">
    </div>

    <div class="column2"> 
        <label for="passwordRepeatInput">Hasło ponownie:</label>
        <input type="password" name="passwordRepeat" id="passwordRepeatInput">
    </div>
        
        
        
       
        <input type="hidden" name="action" value="register">
        <input type="submit" value="Zarejestruj">
    </form>
    </div>
</div>
</body>
</html>
