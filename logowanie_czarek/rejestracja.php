<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rejestracja.css">
    <title>Rejestracja</title>
</head>
<body>

    <?php
        include ('php/zarzadzajUzytkownikiem.php');
    ?>

    <main>
    <section>
        <h1><b>Zarejestruj</b></h1>
        <form method="POST">

    <div class="k">

        <div class="lewy">
            <p>Imie: </p><input type="text" name="imie" required><br>
            <br>
            <p>Login: </p><input type="text" name="login" required><br>
            <br>
            <p>Hasło: </p><input type="password" name="haslo1" required><br>
            <br>
        </div>

        <div class="prawy">
            <p>Nazwisko: </p><input type="text" name="nazwisko" required><br>
            <br>
            <p>Adres e-mail: </p><input type="email" name="email" required><br>
            <br>
            <p>Powtórz hasło: </p><input type="password" name="haslo2" required><br>
            <br>
        <button type="submit" name="rejestracja-form">Zaloguj</button>
        </div>
        <p id="cos">Jeżeli masz już konto <a href="logowanie.php">Zaloguj się</a></p>

    </div>

        </form>
    </section>
    </main>
    
</body>
</html>