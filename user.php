
<?php
include "db_conn.php";
$sql="SELECT * FROM user ORDER BY id DESC "; //sql abfrage
$result = mysqli_query($conn, $sql);//envois une requete a la base de donnee
?>


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
            <li><a href="logout.php">Logout</a></li>
        </div>
    </ul>
</nav>

<div class="container">
    <div class="box">
        <h4 class="display-4 text-center">Read</h4><br>
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <?php if (mysqli_num_rows($result)) { ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Vorname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Usertype</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                /*
                 * Die Funktion mysqli_fetch_assoc () akzeptiert ein Ergebnisobjekt als Parameter, ruft den Inhalt
                 * der aktuellen Zeile im angegebenen Ergebnisobjekt ab und gibt ihn als
                 *  assoziatives Array zurück. */

                while($rows = mysqli_fetch_assoc($result)){
                    $i++;
                    ?>

                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$rows['name']?></td>
                        <td><?php echo $rows['vorname']; ?></td>
                        <td><?=$rows['email']?></td>
                        <td><?php echo $rows['usertype']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
</body>
</html>
?>