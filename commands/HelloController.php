<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\jobs\CreateNewsJob;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    /**
     * See how rabit works
     * @return int
     */
    public function actionTestRabit()
    {
        $id = Yii::$app->queue->delay(60)->push(new CreateNewsJob([
            'title' => 'news_tetst-title',
            'content' => 'news_content_test',
        ]));

// Check whether the job is waiting for execution.
        Yii::$app->queue->isWaiting($id);

// Check whether a worker got the job from the queue and executes it.
        Yii::$app->queue->isReserved($id);

// Check whether a worker has executed the job.
        Yii::$app->queue->isDone($id);
        $dffdg = 234;
        return ExitCode::OK;
    }

    public function actionTestRedis()
    {
        Yii::$app->redis->set('mykey', 'some value');
        echo Yii::$app->redis->get('mykey');
    }
}
