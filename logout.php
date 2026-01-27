<?php
session_start();
session_destroy(); // Destrói a sessão (rasga o crachá)
header("Location: index.php"); // Manda de volta pra loja
?>