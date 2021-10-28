<?php
$toPDF = function ($url, $filename, $path, $params = []) {
    return \KirbyCloudlayer\App::toPDF($url, $filename, $path, $params);
};
$toImage = function ($url, $filename, $path, $params = []) {
    return \KirbyCloudlayer\App::toImage($url, $filename, $path, $params);
};
return array(
    'toPDF' => $toPDF,
    'toImage' => $toImage,
);
