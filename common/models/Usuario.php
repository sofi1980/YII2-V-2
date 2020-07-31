<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $correoe
 * @property string $direccion
 * @property int $celular
 * @property string $contrasena
 * @property string $fecha_naci
 * @property int $Rol_id
 * @property int $formacion_academica_id
 * @property int $ocupacion_id
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Contrato[] $contratos
 * @property Entrevista[] $entrevistas
 * @property Evento[] $eventos
 * @property Rol $rol
 * @property FormacionAcademica $formacionAcademica
 * @property Ocupacion $ocupacion
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipodocumento','documento','nombres', 'apellidos', 'correoe', 'direccion', 'celular', 'contrasena', 'fecha_naci', 'Rol_id', 'formacion_academica_id', 'ocupacion_id', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['celular','documento', 'Rol_id', 'formacion_academica_id', 'ocupacion_id'], 'integer'],
            [['fecha_naci', 'fechacrea', 'fechamodifica'], 'safe'],
            [['estado'], 'string'],
            [['tipodocumento'], 'string'],
            [['nombres', 'apellidos', 'direccion'], 'string', 'max' => 80],
            [['correoe', 'contrasena'], 'string', 'max' => 45],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
            [['correoe'], 'unique'],
            [['Rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['Rol_id' => 'id']],
            [['formacion_academica_id'], 'exist', 'skipOnError' => true, 'targetClass' => Formacionacademica::className(), 'targetAttribute' => ['formacion_academica_id' => 'id']],
            [['ocupacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ocupacion::className(), 'targetAttribute' => ['ocupacion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'correoe' => 'Correo E',
            'direccion' => 'Direccion',
            'celular' => 'Celular',
            'contrasena' => 'Contrasena',
            'fecha_naci' => 'Fecha Naci',
            'Rol_id' => 'Rol ID',
            'formacion_academica_id' => 'Formacion Academica ID',
            'ocupacion_id' => 'Ocupacion ID',
            'fechacrea' => 'Fechacrea',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Contratos]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getContratos()
    {
        return $this->hasMany(Contrato::className(), ['Usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Entrevistas]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getEntrevistas()
    {
        return $this->hasMany(Entrevista::className(), ['Usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Eventos]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Evento::className(), ['Usuario_id' => 'id']);
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
     * Gets query for [[FormacionAcademica]].
     *
     * @return \yii\db\ActiveQuery|FormacionAcademicaQuery
     */
    public function getFormacionAcademica()
    {
        return $this->hasOne(Formacionacademica::className(), ['id' => 'formacion_academica_id']);
    }

    /**
     * Gets query for [[Ocupacion]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getOcupacion()
    {
        return $this->hasOne(Ocupacion::className(), ['id' => 'ocupacion_id']);
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
