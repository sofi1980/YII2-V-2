<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $company_id
 * @property string|null $company_name
 * @property string|null $company_email
 * @property string|null $company_address
 * @property string|null $company_created_date
 * @property string|null $company_status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id'], 'integer'],
            [['company_created_date'], 'safe'],
            [['company_status'], 'string'],
            [['company_name', 'company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_created_date' => 'Company Created Date',
            'company_status' => 'Company Status',
        ];
    }
}
