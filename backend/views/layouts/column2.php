<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\widgets\SideNav;



/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl'   => Yii::$app->homeUrl,
                'options'    => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
            } else {
                $menuItems[] = [
                    'label'       => 'Logout ('.Yii::$app->user->identity->username.')',
                    'url'         => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
                $menuItems[] = [
                    'label' => 'Gii',
                    'url'   => ['/gii'],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items'   => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs']
                            : [],
                ])
                ?>
                <div class="row">
                    <div id="content" class="col-lg-9 col-lg-push-3">
                        <div class="site-index">
                            <div class="body-content">
                                <?php if (isset($this->blocks['content'])): ?>
                                    <?= $this->blocks['content'] ?>
                                <?php else: ?>
                                    <?= $content ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <div id="leftbar" class="col-lg-3 col-lg-pull-9">
                        <?php if (isset($this->blocks['sidebar'])): ?>
                            <?= $this->blocks['sidebar'] ?>
                        <?php else: ?>
                            <?php
                            $heading = '<i class="glyphicon glyphicon-cog"></i> เมนู';
                            $type    = SideNav::TYPE_DEFAULT;
                            $item    = Yii::$app->requestedRoute;
                            if (strlen($item) == 0) {
                                $item = "site/index";
                            }
                            echo SideNav::widget([
                                'type'         => $type,
                                'encodeLabels' => false,
                                'heading'      => $heading,
                                'items'        => [
                                //['label' => 'หน้าแรก', 'url' => ['/site/index'],'active' => ($item == 'site/index')],
                                //['label' => 'ภูมิภาค/จังหวัด/อำเภอ/ตำบล', 'url' => ['/location'],'active' => ($item == 'location')],
                                ],
                            ]);
                            ?>
                        <?php endif; ?>

                    </div> 
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>