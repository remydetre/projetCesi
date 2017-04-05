<?php

if (isset($_GET['tab']) && is_numeric($_GET['tab'])) {
    include 'traitement.php';
    $val = $_GET['tab'];
}

supprData($val);




?>