<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contrato".
 *
 * @property int $id
 * @property string $fecha
 * @property string $descripcion
 * @property string $anexo
 * @property int $Usuario_id
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Usuario $usuario
 */
class Contrato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contrato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'descripcion', 'anexo', 'Usuario_id', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['fecha', 'fechacrea', 'fechamodifica'], 'safe'],
            [['Usuario_id'], 'integer'],
            [['estado'], 'string'],
            [['descripcion'], 'string', 'max' => 200],
            [['anexo'], 'string', 'max' => 45],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
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
            'anexo' => 'Anexo',
            'Usuario_id' => 'Usuario ID',
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
