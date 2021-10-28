<?php
$toPDF = function ($filename, $path, $params = []) {
    return \KirbyCloudlayer\App::toPDF($this->url(), $filename, $path, $params);
};
$toImage = function ($filename, $path, $params = []) {
    return \KirbyCloudlayer\App::toImage($this->url(), $filename, $path, $params);
};
return array(
    'toPDF' => $toPDF,
    'toImage' => $toImage,
);
