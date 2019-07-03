<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "akun".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property int $authKey
 * @property int $accessToken
 */
class TblAkun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken'], 'required'],
            [['authKey', 'accessToken'], 'integer'],
            [['username'], 'string', 'max' => 12],
            [['password'], 'string', 'max' => 16],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
}
