<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evento".
 *
 * @property int $id
 * @property string $nombre
 * @property string $fecha
 * @property string $duracion
 * @property string $descripcion
 * @property int $Usuario_id
 * @property int $Categoria_id
 * @property string $usuariocrea
 * @property string $fechacreacion
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Categoria $categoria
 * @property Usuario $usuario
 * @property Informe[] $informes
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha', 'duracion', 'descripcion', 'Usuario_id', 'Categoria_id', 'usuariocrea', 'fechacreacion', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['Usuario_id', 'Categoria_id'], 'integer'],
            [['fechacreacion', 'fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['nombre', 'fecha', 'duracion'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
            [['Categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['Categoria_id' => 'id']],
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
            'nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'duracion' => 'Duracion',
            'descripcion' => 'Descripcion',
            'Usuario_id' => 'Usuario ID',
            'Categoria_id' => 'Categoria ID',
            'usuariocrea' => 'Usuariocrea',
            'fechacreacion' => 'Fechacreacion',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'Categoria_id']);
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
     * Gets query for [[Informes]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getInformes()
    {
        return $this->hasMany(Informe::className(), ['Evento_id' => 'id']);
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
