<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "migration".
 *
 * @property string $version
 * @property integer $apply_time
 * @property string $aliasModel
 */
abstract class Migration extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'migration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180],
            [['version'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'version' => Yii::t('models', 'Version'),
            'apply_time' => Yii::t('models', 'Apply Time'),
        ];
    }


    
    /**
     * @inheritdoc
     * @return \app\models\query\MigrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\MigrationQuery(get_called_class());
    }


}
