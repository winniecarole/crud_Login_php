<?php include 'php/update.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <form action="update.php" method="post">

        <h4 class="display-4 text-center">Update</h4><hr><br>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="name"
                   class="form-control"
                   id="name"
                   name="name"
                   value="<?=$row['name'] ?>" >
        </div>
        <div class="form-group">
            <label for="vorname">Vorname</label>
            <input type="name"
                   class="form-control"
                   id="vorname"
                   name="vorname"
                   value="<?=$row['vorname'] ?>">
        </div>


        <div class="form-group">
            <label for="usertype">usertype</label></br>
            <select name="usertype" id="usertype">
                <option value="<?=$row['vorname'] ?>">admin</option>
                <option value="<?=$row['vorname'] ?>">User</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   name="email"
                   value="<?=$row['email'] ?>"
            >
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password"
                   class="form-control"
                   id="password"
                   name="password"
                   value="<?=$row['password'] ?>"
            >
        </div>
        <input type="text"
               name="id"
               value="<?=$row['id']?>"
               hidden >

        <button type="submit"
                class="btn btn-primary"
                name="update">Update</button>
        <a href="../admin.php" class="link-primary">View</a>
    </form>
</div>
</body>
</html>
