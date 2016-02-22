<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $cakeDescription ?>:<?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Element('Builder.constructor/default-layout-css') ?>
        <?= $this->Element('Builder.constructor/default-layout-js') ?>
        <script>
            $(document).ready(function () {
                $('.dataTable').dataTable();
            });
        </script>
        <style>
            body{
                padding-top: 70px;
            }
        </style>
    </head>
    <body>
        <?= $this->element('navbar') ?>
        <div class="container clearfix">
            <h1 class="page-header"><?= $this->fetch('title') ?></h1>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>