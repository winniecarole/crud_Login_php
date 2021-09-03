<?php
include "db_conn.php";

session_start();
//post request mit der angegebene username und password
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$email=$_POST["email"];
$usertype=$_POST["usertype"];
$password=$_POST["password"];

$sql="select * from user where email='".$email."' AND password='".$password."' AND usertype='".$usertype."'";
    /**
     * Um die Abfrage jetzt auch auszuführen und die dabei erhaltenen Daten in einer Variable
     * zu speichern verwenden wir den Befehl mysqli_query
     */
    $result=mysqli_query($conn,$sql); //envois une requete a une base de donnee
    $row=mysqli_fetch_array($result);//retourne une ligne de résultat sous la forme d’un tableau.

    /**
     * user
     */
    if($row["usertype"]=="user")
    {

        $_SESSION["email"]=$email;

        header("location:user.php");
    }
    /**
     * admin
     */

    elseif($row["usertype"]=="admin")
    {

        $_SESSION["email"]=$email;

        header("location:admin.php");
    }


    else
    {
        echo "username or password incorrect";
    }

}
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <!-- <title>Responsive Navbar with Searchbox</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<nav>
    <ul>
        <li class="logo">PHP</li>
        <li class="btn"><span class="fas fa-bars"></span></li>
        <div class="items">
            <li><a href="#">Login</a></li>
            <li><a href="registrieren.php">Registrieren</a></li>
        </div>
    </ul>
</nav>

<div class="container">
    <form action="#" method="post">
        <h4 class="display-4 text-center">Login</h4><hr><br>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="usertype">usertype</label></br>
            <select name="usertype" id="usertype">
                <option value="admin">admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password"
                   class="form-control"
                   id="password"
                   name="password"
                   placeholder="password eingeben"
            >
        </div>

        <button type="submit"
                class="btn btn-primary"
                name="login">submit</button>
    </form>
</div>

<script>
    $('nav ul li.btn span').click(function(){
        $('nav ul div.items').toggleClass("show");
        $('nav ul li.btn span').toggleClass("show");
    });
</script>
</body>
</html>