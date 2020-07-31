<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "permiso".
 *
 * @property int $id
 * @property string $descripcion
 * @property int $Rol_id
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Rol $rol
 */
class Permiso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permiso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'Rol_id', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['Rol_id'], 'integer'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['descripcion'], 'string', 'max' => 80],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
            [['Rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['Rol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'Rol_id' => 'Rol ID',
            'fechacrea' => 'Fechacrea',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'Rol_id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriaQuery(get_called_class());
    }
}
