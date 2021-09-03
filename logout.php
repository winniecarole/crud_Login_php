<?php
/**
 *  erzeugt eine Session oder nimmt die aktuelle wieder auf
 */
session_start();
/**
 * löscht alle in Verbindung mit der aktuellen Session stehendeb Daten
 */
session_destroy();
header("location:index.php");

?>