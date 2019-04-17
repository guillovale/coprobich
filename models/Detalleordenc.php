<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_detalleordenc".
 *
 * @property int $id
 * @property int $id_orden
 * @property int $id_parametro
 * @property int $puntuacion
 *
 * @property TblOrdencompra $orden
 * @property TblParametro $parametro
 */
class Detalleordenc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_detalleordenc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_orden', 'id_parametro'], 'required'],
            [['id_orden', 'id_parametro', 'puntuacion'], 'integer'],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => Ordencompra::className(), 'targetAttribute' => ['id_orden' => 'id']],
            [['id_parametro'], 'exist', 'skipOnError' => true, 'targetClass' => Parametro::className(), 'targetAttribute' => ['id_parametro' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_orden' => 'Id Orden',
            'id_parametro' => 'Id Parametro',
            'puntuacion' => 'Puntuación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrden()
    {
        return $this->hasOne(Ordencompra::className(), ['id' => 'id_orden']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametro()
    {
        return $this->hasOne(Parametro::className(), ['id' => 'id_parametro']);
    }
}
