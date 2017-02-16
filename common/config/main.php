<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'view' => [
          'theme' => [
              'pathMap' => [
                  '@app/views' => '@common/resources/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
              ],
          ],
        ],
    ],
];
