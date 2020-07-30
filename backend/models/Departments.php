<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $department_id
 * @property int|null $branches_branch_id
 * @property string|null $department_name
 * @property int|null $companies_company_id
 * @property string|null $department_created_date
 * @property string|null $department_status
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id'], 'required'],
            [['department_id', 'branches_branch_id', 'companies_company_id'], 'integer'],
            [['department_created_date'], 'safe'],
            [['department_status'], 'string'],
            [['department_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'branches_branch_id' => 'Branches Branch ID',
            'department_name' => 'Department Name',
            'companies_company_id' => 'Companies Company ID',
            'department_created_date' => 'Department Created Date',
            'department_status' => 'Department Status',
        ];
    }

    

   public function getcompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'companies_company_id']);
   } 
       

   public function getbranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'branches_branch_id']);
   } }
    