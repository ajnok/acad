<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "applicant".
 *
 * @property string $id
 * @property string $firstname
 * @property string $lastname
 * @property string $school_name
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Applicant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applicant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'firstname', 'school_name', 'created_at', 'updated_at'], 'required'],
            [['id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 60],
            [['school_name', 'position', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 10],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'school_name' => 'School Name',
            'position' => 'Position',
            'phone' => 'Phone',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
