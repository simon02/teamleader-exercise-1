<?php
/**
 * @author Marco Troisi
 * @created 03.04.15
 */

require 'vendor/autoload.php';

$f3 = Base::instance();


/**
 * Routes
 */

// Home
$f3->route('GET /',
    function() use ($translationService) {
        echo 'MicroTranslator';
    }
);
$f3->route('POST /',
    function() { 
        echo json_decode($fr->get('BODY'), true);
    }
);