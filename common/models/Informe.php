<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "informe".
 *
 * @property int $id
 * @property string $fecha
 * @property string $descripcion
 * @property string|null $anexos
 * @property int $Evento_id
 * @property string $fechacrea
 * @property string $usuariocrea
 * @property string $fechamodifica
 * @property string $usuariomodifica
 * @property string $estado
 *
 * @property Evento $evento
 */
class Informe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'descripcion', 'Evento_id', 'fechacrea', 'usuariocrea', 'fechamodifica', 'usuariomodifica', 'estado'], 'required'],
            [['fecha', 'fechacrea', 'fechamodifica'], 'safe'],
            [['Evento_id'], 'integer'],
            [['estado'], 'string'],
            [['descripcion', 'anexos'], 'string', 'max' => 100],
            [['usuariocrea', 'usuariomodifica'], 'string', 'max' => 20],
            [['Evento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Evento::className(), 'targetAttribute' => ['Evento_id' => 'id']],
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
            'anexos' => 'Anexos',
            'Evento_id' => 'Evento ID',
            'fechacrea' => 'Fechacrea',
            'usuariocrea' => 'Usuariocrea',
            'fechamodifica' => 'Fechamodifica',
            'usuariomodifica' => 'Usuariomodifica',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Evento]].
     *
     * @return \yii\db\ActiveQuery|EventoQuery
     */
    public function getEvento()
    {
        return $this->hasOne(Evento::className(), ['id' => 'Evento_id']);
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
