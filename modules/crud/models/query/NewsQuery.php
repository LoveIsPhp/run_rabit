<?php

namespace app\modules\crud\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\crud\models\News]].
 *
 * @see \app\modules\crud\models\News
 */
class NewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\crud\models\News[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\crud\models\News|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
