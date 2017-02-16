<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;


?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= wordwrap(Yii::$app->user->identity->nome, 20, "<br />\n"); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?
        $menuItems[] = ['label' => 'Menu', 'options' => ['class' => 'header']];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Entrar', 'url' => ['/site/login']];
            $menuItems[] = ['label' => 'Cadastre-se', 'url' => ['/site/signup']];

        } else {
            $menuItems[] = ['label' => 'Sair', 'url' => ['/site/logout'], ];
        }
        /*$menuItems[] = [
          'label' => 'Same tools',
          'icon' => 'fa fa-share',
          'url' => '#',
          'items' => [
              ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
              ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
              [
                  'label' => 'Level One',
                  'icon' => 'fa fa-circle-o',
                  'url' => '#',
                  'items' => [
                      ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                      [
                          'label' => 'Level Two',
                          'icon' => 'fa fa-circle-o',
                          'url' => '#',
                          'items' => [
                              ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                              ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                          ],
                      ],
                  ],
              ],
          ],
      ];*/
      $menuItems[] =[
          'label' => 'Categoria',
          'icon' => 'fa fa-share',
          'url' => '#',
          'visible' => !Yii::$app->user->isGuest,
          'items' => [
              ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/categoria/create'],],
              ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
              [
                  'label' => 'Level One',
                  'icon' => 'fa fa-circle-o',
                  'url' => '#',
                  'items' => [
                      ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                      [
                          'label' => 'Level Two',
                          'icon' => 'fa fa-circle-o',
                          'url' => '#',
                          'items' => [
                              ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                              ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                          ],
                      ],
                  ],
              ],
          ],
      ];


        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
