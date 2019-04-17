<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_criterio".
 *
 * @property int $id
 * @property string $detalle
 * @property int $ponderacion
 *
 * @property TblParametro[] $tblParametros
 */
class Criterio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_criterio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detalle'], 'required'],
            [['ponderacion'], 'integer'],
            [['detalle'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'detalle' => 'Detalle',
            'ponderacion' => 'Ponderación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametros()
    {
        return $this->hasMany(Parametro::className(), ['id_criterio' => 'id']);
    }
}
