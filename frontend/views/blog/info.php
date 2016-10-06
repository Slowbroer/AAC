<?php
/**
 * Created by PhpStorm.
 * User: linpeiyu
 * Date: 2016-09-08
 * Time: 17:14
 */
use \yii\widgets\ActiveForm;
use \ijackua\lepture\Markdowneditor;
use \yii\helpers\Html;

?>


<div class="archives-form">

        <?php $form = ActiveForm::begin([
    'action'=>\yii\helpers\Url::toRoute('blog/save'),
]); ?>
<?php echo $form->field($model,'title');?>
<!--        这里的$model必须是一个model类的实例，attribute指的是这个model类的一个字段，这个字段用来保存数据-->
<?= \yii\helpers\Markdown::process($model['content']) ?>
<?php //echo Markdowneditor::widget(['model' => $model, 'attribute' => 'content']) ?>
<?php $form->field($model,'title');?>

<div class="form-group">
    <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>

</div>
<?php echo $form->field($model,'id')->hiddenInput()->label(false);?>
<?php ActiveForm::end(); ?>

</div>