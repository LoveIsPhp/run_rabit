<?php

namespace app\jobs;

use app\models\News;
use yii\base\BaseObject;
use yii\db\Exception;

class CreateNewsJob extends BaseObject implements \yii\queue\JobInterface
{
    public $title;
    public $content;

    public function execute($queue)
    {
        $news = new News();
        $news->title = $this->title;
        $news->content = $this->content;
        if (!$news->save()) {
            throw new Exception('Cannot save news!' . print_r($news->getErrors(),1));
        }
    }
}