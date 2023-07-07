<?php
/**
 * /app/runtime/giiant/d4b4964a63cc95065fa0ae19074007ee
 *
 * @package default
 */


use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 *
 * @var yii\web\View $this
 * @var app\models\Migration $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Migration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models.plural', 'Migration'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->version, 'url' => ['view', 'version' => $model->version]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
?>
<div class="giiant-crud migration-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?php echo Html::encode($model->version) ?>
        <small>
            <?php echo Yii::t('models', 'Migration') ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?php
echo Html::a(
	'<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('cruds', 'Edit'),
	[ 'update', 'version' => $model->version],
	['class' => 'btn btn-info'])
?>

            <?php
echo Html::a(
	'<span class="glyphicon glyphicon-copy"></span> ' . Yii::t('cruds', 'Copy'),
	['create', 'version' => $model->version, 'Migration'=>$copyParams],
	['class' => 'btn btn-success'])
?>

            <?php
echo Html::a(
	'<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('cruds', 'New'),
	['create'],
	['class' => 'btn btn-success'])
?>
        </div>

        <div class="pull-right">
            <?php echo Html::a('<span class="glyphicon glyphicon-list"></span> '
	. Yii::t('cruds', 'Full list'), ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('app\models\Migration'); ?>


    <?php
echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'version',
			'apply_time:datetime',
		],
	]);
?>


    <hr/>

    <?php
echo Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'version' => $model->version],
	[
		'class' => 'btn btn-danger',
		'data-confirm' => '' . Yii::t('cruds', 'Are you sure to delete this item?') . '',
		'data-method' => 'post',
	]);
?>
    <?php $this->endBlock(); ?>



    <?php
echo Tabs::widget(
	[
		'id' => 'relation-tabs',
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => '<b class=""># '.Html::encode($model->version).'</b>',
				'content' => $this->blocks['app\models\Migration'],
				'active'  => true,
			],
		]
	]
);
?>
</div>
