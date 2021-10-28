<?php

require_once __DIR__ . '/lib/cloudlayerio-php/vendor/autoload.php';
require_once __DIR__ . '/lib/KirbyCloudlayer.php';

Kirby::plugin('tristantbg/kirby-cloudlayer', [
    'siteMethods' => require_once __DIR__ . '/lib/siteMethods.php',
    'pageMethods' => require_once __DIR__ . '/lib/pageMethods.php'
]);
