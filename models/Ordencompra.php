<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_ordencompra".
 *
 * @property int $id
 * @property int $id_socio
 * @property int $id_producto
 * @property string $fecha
 * @property double $existencia
 * @property double $cantidad
 *
 * @property TblDetalleordenc[] $tblDetalleordencs
 * @property TblProducto $producto
 * @property TblSocio $socio
 */
class Ordencompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

	public $codigo_socio;

    public static function tableName()
    {
        return 'tbl_ordencompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_socio', 'id_producto'], 'required'],
            [['id_socio', 'id_producto'], 'integer'],
            [['fecha'], 'safe'],
            [['existencia', 'cantidad'], 'number'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id']],
            [['id_socio'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::className(), 'targetAttribute' => ['id_socio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_socio' => 'Socio',
            'id_producto' => 'Producto',
            'fecha' => 'Fecha',
            'existencia' => 'Existencia',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleordenc()
    {
        return $this->hasMany(Detalleordenc::className(), ['id_orden' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocio()
    {
        return $this->hasOne(Socio::className(), ['id' => 'id_socio']);
    }
}
