<?php


namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id_operator;
    public $username;
    public $password;
	public $nama;
	public $authKey;
    public $accessToken;
    public $level;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id_operator)
    {
        $user = Operator::findOne($id_operator);
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = TblAkun::find()->where(['accessToken'=>$token])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = TblAkun::find()->where(['username'=>$username])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_operator;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
