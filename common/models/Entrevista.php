<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "entrevista".
 *
 * @property int $id
 * @property string $fecha
 * @property string $descripcion
 * @property int $Usuario_id
 * @property string $nombre_asesor
 * @property string $seleccionado
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Usuario $usuario
 */
class Entrevista extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entrevista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fecha', 'descripcion', 'Usuario_id', 'nombre_asesor', 'seleccionado', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['id', 'Usuario_id'], 'integer'],
            [['fecha', 'fechacrea', 'fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['descripcion'], 'string', 'max' => 200],
            [['nombre_asesor', 'seleccionado'], 'string', 'max' => 45],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['Usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'Usuario_id' => 'Usuario ID',
            'nombre_asesor' => 'Nombre Asesor',
            'seleccionado' => 'Seleccionado',
            'fechacrea' => 'Fechacrea',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'Usuario_id']);
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