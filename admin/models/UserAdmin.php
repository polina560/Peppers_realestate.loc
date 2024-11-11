<?php

namespace admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user_admin".
 *
 * @property int    $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int    $status
 * @property int    $created_at
 * @property int    $updated_at
 */
class UserAdmin extends AdminModel
{

    public const SCENARIO_SIGNUP = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%user_admin}}';
    }

    public function scenarios(): array
    {
        return [
            self::SCENARIO_SIGNUP => ['email', 'password'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'email'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    public function setPassword($password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(): void
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function beforeSave($insert): bool
    {
        $this->auth_key = generateAuthKey();
        $this->password_hash = setPassword($this->password_hash);

//        if ($this->imageFile instanceof UploadedFile) {
//            if (!$insert && !empty($this->image)) {
//                // удалить старую
//                $public = Yii::getAlias('@public');
//                $oldImagePath = $public . $this->image;
//                if (file_exists($oldImagePath)) {
//                    unlink($oldImagePath); // удаление файла
//                }
//            }
//            $randomName = Yii::$app->security->generateRandomString(8);
//            $public = Yii::getAlias('@public');
//            $path = '/uploads/' . $randomName . '.' . $this->imageFile->extension;
//            $this->imageFile->saveAs($public . $path);
//            $this->image = $path;
//        }
        return parent::beforeSave($insert);
    }
}
