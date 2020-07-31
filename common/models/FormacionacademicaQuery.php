<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Formacionacademica]].
 *
 * @see Formacionacademica
 */
class FormacionacademicaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Formacionacademica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Formacionacademica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
