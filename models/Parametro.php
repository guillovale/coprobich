<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_parametro".
 *
 * @property int $id
 * @property int $id_criterio
 * @property string $detalle
 * @property int $ponderacion
 *
 * @property TblDetalleordenc[] $tblDetalleordencs
 * @property TblCriterio $criterio
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_parametro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_criterio', 'detalle'], 'required'],
            [['id_criterio', 'ponderacion'], 'integer'],
            [['detalle'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
            [['id_criterio'], 'exist', 'skipOnError' => true, 'targetClass' => Criterio::className(), 'targetAttribute' => ['id_criterio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_criterio' => 'Id Criterio',
            'detalle' => 'Detalle',
            'ponderacion' => 'Ponderación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordencs()
    {
        return $this->hasMany(Detalleordenc::className(), ['id_parametro' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriterio()
    {
        return $this->hasOne(Criterio::className(), ['id' => 'id_criterio']);
    }
}
