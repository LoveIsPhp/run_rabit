<?php
/**
 * /app/runtime/giiant/fccccf4deb34aed738291a9c38e87215
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
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Migrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud migration-create">

    <h1>
                <?php echo Html::encode($model->version) ?>
        <small>
            <?php echo Yii::t('models', 'Migration') ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?php echo             Html::a(
	Yii::t('cruds', 'Cancel'),
	\yii\helpers\Url::previous(),
	['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
