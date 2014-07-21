<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <?php
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/underscore-min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/backbone.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/script.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap.min.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/bootstrap-theme.min.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/style.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle) ?></title>
</head>

<body>
    <div class="container">
        <?php echo $content ?>
    </div>
</body>
</html>
