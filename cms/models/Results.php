<?php

namespace app\models;

class Results extends \yii\db\ActiveRecord{

    public static function tableName()
    {
        return 'results';
    }

    public static function getInfo()
    {
        return self::find()->orderBy(['calculation' => SORT_DESC])->limit(10)->all();
    }
}