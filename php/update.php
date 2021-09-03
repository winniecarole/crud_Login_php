<?php
/**
 * variable declaration wird geprüpft
 */
if(isset($_GET['id'])) {
    include "db_conn.php";

    function validteuser($data)
    {
        $data = trim($data);
        $data = stripcslashes($data); //die zu entschlüsselnde Zeichenkette
        $data = htmlspecialchars($data); //die umzuwandelnde Zeichenkette
        return $data;
    }

    $id = validteuser($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=$id";//sql abfrage
    $result = mysqli_query($conn, $sql);// envois une requete a la base de donnee

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: admin.php");
    }
}else if(isset($_POST['update'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $vorname = validate($_POST['vorname']);
    $usertype = validate($_POST['usertype']);
    $password = validate($_POST['password']);
    $email = validate($_POST['email']);
    $id = validate($_POST['id']);

    if (empty($name)) {
        header("Location: ../update.php?id=$id&error=Name is required");
    }else if (empty($vorname)) {
        header("Location: ../update.php?id=$id&error=vorname is required");
    }else if (empty($email)) {
        header("Location: ../update.php?id=$id&error=Email is required");
    } else if (empty($password)) {
        header("Location: ../update.php?id=$id&error=password is required");
    }else {

        $sql = "UPDATE user
               SET name='$name',vorname='$vorname'usertype='$usertype', email='$email',password='$password'
               WHERE id=$id ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: admin.php?success=successfully updated");
        }else {
            header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
        }
    }
}else {
    header("Location: admin.php");
}
?>
