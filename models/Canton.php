<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_canton".
 *
 * @property int $id
 * @property int $id_provincia
 * @property string $detalle
 *
 * @property TblProvincia $provincia
 * @property TblParroquia[] $tblParroquias
 */
class Canton extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_canton';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_provincia', 'detalle'], 'required'],
            [['id_provincia'], 'integer'],
            [['detalle'], 'string', 'max' => 100],
            [['detalle'], 'unique'],
            [['id_provincia'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['id_provincia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_provincia' => 'Id Provincia',
            'detalle' => 'Detalle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'id_provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquia::className(), ['id_canton' => 'id']);
    }
}
