<?php
/**
 * /app/runtime/giiant/fcd70a9bfdf8de75128d795dfc948a74
 *
 * @package default
 */


use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var app\models\Migration $model
 */
$this->title = Yii::t('models', 'Migration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Migration'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->version, 'url' => ['view', 'version' => $model->version]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud migration-update">

    <h1>
                <?php echo Html::encode($model->version) ?>

        <small>
            <?php echo Yii::t('models', 'Migration') ?>        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'version' => $model->version], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
