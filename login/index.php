<?php
require_once '../config/sessao.php';
$base_path = '../';
include_once '../header.php';

if (empty($_SERVER['QUERY_STRING'])) {
    $principal = 'form-login';
    include_once "$principal.php";
} else {
    $pg = $_GET['pg'];
    include_once "$pg.php";
}

include_once '../footer.php';
?>