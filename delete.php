<?php
/**
 * variable declaration wird geprüpft
 */
if(isset($_GET['id'])){
    include "db_conn.php";
    function validateuser($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $id = validateuser($_GET['id']);

    $sql = "DELETE FROM user
	        WHERE id=$id";

    $result = mysqli_query($conn, $sql);  //envois une requete a une base de donnee

    if ($result) {
        header("Location: admin.php?success=successfully deleted");
    }else {
        header("Location: admin.php?error=unknown error occurred&$user_data");
    }

}else {
    header("Location: admin.php");
}
?>