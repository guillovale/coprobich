<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_provincia".
 *
 * @property int $id
 * @property string $detalle
 *
 * @property TblCanton[] $tblCantons
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_provincia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detalle'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCantons()
    {
        return $this->hasMany(TblCanton::className(), ['id_provincia' => 'id']);
    }
}
