<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_inventario".
 *
 * @property int $id
 * @property int $id_producto
 * @property double $existencia
 *
 * @property TblProducto $producto
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto'], 'integer'],
            [['existencia'], 'required'],
            [['existencia'], 'number'],
            [['id_producto'], 'unique'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_producto' => 'Id Producto',
            'existencia' => 'Existencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'id_producto']);
    }
}
