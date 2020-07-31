<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ocupacion".
 *
 * @property int $id
 * @property string $nombre_ocupacion
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Usuario[] $usuarios
 */
class Ocupacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ocupacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nombre_ocupacion', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['id'], 'integer'],
            [['fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['nombre_ocupacion'], 'string', 'max' => 100],
            [['usuariocrea'], 'string', 'max' => 20],
            [['usuariomodifica'], 'string', 'max' => 6],
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
            'nombre_ocupacion' => 'Nombre Ocupacion',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['ocupacion_id' => 'id']);
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
