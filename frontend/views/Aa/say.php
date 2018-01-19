<?php use yii\helpers\Html;?>
<?php use yii\widgets\Linkpager;?>
<?php foreach ($countries as $key => $val) { ?>
	

<?= Html::encode($val->name)?>
<?= Html::encode($val->code)?>
<?= Html::encode($val->population)?>

<?php }?>
<?= Linkpager::widget(['pagination'=>$pagination])?>