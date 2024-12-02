<?php

if(isset($_POST['rejestracja-form'])){
    rejestracja();
}

if(isset($_POST['logowanie-form'])){
    logowanie();
}


function rejestracja() {
    include ('cfg.php');
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    $hashedPassword1 = hash("sha256",$haslo1);
    $hashedPassword2 = hash("sha256",$haslo2);

    if($hashedPassword1 == $hashedPassword2) {
        $count_user_query = "SELECT COUNT(user_email) AS count_email FROM project_user WHERE user_email = '".$email."'";
        $result = mysqli_query($db, $count_user_query);
        $row = mysqli_fetch_array($result);
        if($row['count_email']== 0){
            $query = "INSERT INTO project_user 
            (user_name, user_surname, user_login, user_email, user_password)
            VALUES
            (?,?,?,?,?);";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, 'sssss', $imie, $nazwisko, $login, $email, $hashedPassword1);
            mysqli_stmt_execute($stmt);

            header("Location: logowanie.php");
            exit();
        }else{
            echo 'taki email juz istnieje!';
        }
    }else{
        echo 'Hasła są różne!';
    }

}

function logowanie() {
    
    include ('cfg.php');
    $login_email = $_POST['login/email'];
    $haslo = htmlspecialchars($_POST['haslo']);

    $hashedPassword = hash("sha256",$haslo);

    $stmt = mysqli_prepare($db, "SELECT user_name, user_surname FROM project_user WHERE (user_login = ? OR user_email = ?) AND user_password = ?");
    mysqli_stmt_bind_param($stmt, 'sss', $login_email, $login_email, $hashedPassword);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_array($result);

    if($row) {
        session_start();
        $_SESSION['valid'] = true;
        $_SESSION['user_name'] = "user";
        $_SESSION['user_surname'] = "user";
    }else{
        echo "Błędne dane!";
    }
}

function wyloguj() {
    session_start();
    session_unset();
    session_destroy();
}

?>