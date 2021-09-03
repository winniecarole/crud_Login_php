<?php
/**
 * varible declaration wird geprüpft
 */
if(isset($_POST['registrieren'])){ //püft ob create existiert
    include "db_conn.php";
    function validteuser($data){
        $data=trim($data);
        $data=stripcslashes($data); //die zu entschlüsselnde Zeichenkette
        $data=htmlspecialchars($data); //die umzuwandelnde Zeichenkette
        return $data;
    }
    $name=validteuser($_POST['name']);
    $vorName=validteuser($_POST['vorname']);
    $email=validteuser($_POST['email']);
    $usertype="user";
    $password=validteuser($_POST['password']);
    $user_data = 'name='.$name. '&vorname='.$vorName.'&usertype='.$usertype. '&email='.$email.'password='.$password;

    /**
     * prüft ob ein feld der Input leer ist
     */
    /*if (empty($name)) {
        header("Location: ../index.php?error=Name is required&$user_data");
    }else if (empty($vorName)) {
        header("Location: ../index.php?error=Vorname is required&$user_data");
    }else if (empty($password)) {
        header("Location: ../index.php?error=password is required&$user_data");
    }else if (empty($email)) {
        header("Location: ../index.php?error=Email is required&$user_data");
    }else{*/
        $sql = "INSERT INTO user(name, vorname,usertype, email ,password)VALUES('$name','$vorName' ,'$usertype','$email','$password')";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("location:index.php");
        }else{

        }

   // }

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
            <li><a href="registrieren.php">Registrieren</a></li>
        </div>
    </ul>
</nav>
<div class="container">
    <form action="#" method="post">
        <h4 class="display-4 text-center">Registrieren</h4><hr><br>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name"
                   class="form-control"
                   id="name"
                   name="name"
                   >
        </div>
        <div class="form-group">
            <label for="vorname">Vorname</label>
            <input type="name"
                   class="form-control"
                   id="vorname"
                   name="vorname"
                  >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   placeholder="Enter email">
        </div>
        <!--div class="form-group">
            <label for="usertype">usertype</label></br>
            <select name="usertype" id="usertype">
                <option value="user">User</option>
            </select>
        </div-->
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
                name="registrieren">submit</button>
    </form>
</div>
<footer>
    made by winnie
</footer>

<script>
    $('nav ul li.btn span').click(function(){
        $('nav ul div.items').toggleClass("show");
        $('nav ul li.btn span').toggleClass("show");
    });
</script>
</body>
</html>