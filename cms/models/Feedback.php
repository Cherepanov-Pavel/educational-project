<?php

namespace app\models;

class Feedback extends \yii\db\ActiveRecord{

    public static function tableName()
    {
        return 'feedback';
    }

    public static function getInfo()
    {
        return self::find()->orderBy(['date' => SORT_DESC])->all();
    }
}
