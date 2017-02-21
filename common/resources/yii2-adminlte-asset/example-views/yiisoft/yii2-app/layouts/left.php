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
                <img src="imagens/logo.png"  class="img-circle" alt="Logo image"/>
            </div>
            <?php if(!Yii::$app->user->isGuest):?>
            <div class="pull-left info">
                <p><?= wordwrap(Yii::$app->user->identity->nome, 20, "<br />\n"); ?></p>

            </div>
          <?php endif;?>
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

        <?php
        $menuItems[] = ['label' => 'Menu', 'options' => ['class' => 'header']];

        if (!Yii::$app->user->isGuest)
        {
          $menuItems[] = ['label' => 'Lista', 'url' => ['/site/']];
          $menuItems[] = ['label' => 'Despesas', 'url' => ['/despesa/']];
          $menuItems[] = ['label' => 'Receitas', 'url' => ['/receita/']];

        }

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

        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
