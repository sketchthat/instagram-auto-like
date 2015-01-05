<?php
    session_start();

    $instagram = new Instagram(array(
        'apiKey'      => 'APIKEY',
        'apiSecret'   => 'APISECRET',
        'apiCallback' => 'http://[YOUR URL]/callback.php'
    ));

    $tags = array(
        'tag1',
        'tag2',
        'tag3',
        '...'
    );

    if(isset($_SESSION['instagram'])) {
        $instagram->setAccessToken($_SESSION['instagram']);
    }