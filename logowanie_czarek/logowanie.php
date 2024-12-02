<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logowanie.css">
    <title>Logowanie</title>
</head>
<body>

    <?php
        include ('php/zarzadzajUzytkownikiem.php');
    ?>

    <main>
    <section>
        <h1><b>Logowanie</b></h1>
        <form method = "POST">
        
            <p>Podaj login lub adres e-mail: </p><input type="text" name = "login/email"><br>
            <br>
            <p>Hasło: </p><input type="password" name = "haslo"><br>
            <br>
        <button type="submit" name="logowanie-form">Zaloguj</button>
        <p id="cos">Jeżeli nie masz konta <a href="rejestracja.php">Zarejestruj się</a></p>
        
        </form>
    </section>
    </main>
    
</body>
</html>