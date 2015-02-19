<?php
use backend\assets\AdminAsset;
use yii\helpers\Html;

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <?= Html::csrfMetaTags() ?>
    <link href="/css/admin.css" rel="stylesheet">
    <title>Вход в админку</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="form-common">

        <div style="display: block; width: 260px; margin: 70px auto 120px auto; background: #f6f6f6; padding: 40px 40px 40px 70px; border: 1px solid #ddd;  border-radius: 10px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);">

            <?= $content; ?>        
    
            <div class="clearfix"></div> 
        </div>
    </div><!-- /orm-common  -->        

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
