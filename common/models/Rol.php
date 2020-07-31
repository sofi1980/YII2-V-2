<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Permiso[] $permisos
 * @property Usuario[] $usuarios
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['fechacrea', 'fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['descripcion'], 'string', 'max' => 45],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
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
            'fechacrea' => 'Fechacrea',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Permisos]].
     *
     * @return \yii\db\ActiveQuery|PermisoQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permiso::className(), ['Rol_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['Rol_id' => 'id']);
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
