<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class News extends ActiveRecord 
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [["name", "url", "image", "annotation", "content"], "safe"],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    public static function findByUrl($url)
    {
        return static::findOne(['url' => $url]);
    }
    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
}
