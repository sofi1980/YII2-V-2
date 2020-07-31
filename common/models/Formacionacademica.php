<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "formacionacademica".
 *
 * @property int $id
 * @property string $nombre_formacion
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Usuario[] $usuarios
 */
class Formacionacademica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formacionacademica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nombre_formacion', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['id'], 'integer'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['nombre_formacion'], 'string', 'max' => 100],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_formacion' => 'Nombre Formacion',
            'fechacrea' => 'Fechacrea',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['formacion_academica_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FormacionacademicaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FormacionacademicaQuery(get_called_class());
    }
}
