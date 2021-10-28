<?php

namespace KirbyCloudlayer;

use \Dotenv\Dotenv;
use CloudLayerIO\Client as CloudLayer;
use CloudLayerIO\Resources\Url;

$dotenv = new \Dotenv\Dotenv(__DIR__ . str_repeat(DIRECTORY_SEPARATOR . '..', 1));
$dotenv->load();

class App
{

    private static $defaultParams  = [
        'format' => 'A4',
        "landscape" => true,
        'margin' => [
            'top' => '',
            'bottom' => '',
            'left' => '',
            'right' => ''
        ],
      ];
    private static $builder = null;

    public static function init()
    {

      CloudLayer::config([
        'api_key' => $_ENV['CLOUDLAYER_API_KEY'],
      ]);

      if (option('kirby-cloudlayer.defaultparams')) {
        self::$defaultParams = option('kirby-cloudlayer.defaultparams');
      }

    }

    public static function toPdf($url, $filename, $path, $params = [])
    {
      \KirbyCloudlayer\App::init();

      $params = array_merge($params, self::$defaultParams);

      try {
          //convert to pdf
          $url = new Url($url, $params);
          $file = $url->toPdf();
          $file->save($path . '/'. $filename .'.pdf');

      } catch (\CloudLayerIO\Exceptions\UnauthorizedUsage $exception) {
          echo $exception->getMessage();
      } catch (\GuzzleHttp\Exception\ServerException $e) {
          echo $e->getMessage();
      }

    }

    public static function toImage($url, $filename, $path, $params = [])
    {
      \KirbyCloudlayer\App::init();

      $params = array_merge($params, self::$defaultParams);

      try {
          //convert to image
          $url = new Url($url, $params);
          $file = $url->toImage();
          $file->save($path . '/'. $filename .'.png');

      } catch (\CloudLayerIO\Exceptions\UnauthorizedUsage $exception) {
          echo $exception->getMessage();
      } catch (\GuzzleHttp\Exception\ServerException $e) {
          echo $e->getMessage();
      }

    }

}
