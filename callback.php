<?php
    require_once('includes/instagram.php');
    require_once('includes/config.php');

    $code = $_GET['code'];
    $data = $instagram->getOAuthToken($code);

    $_SESSION['instagram'] = $data;

    $instagram->setAccessToken($data);