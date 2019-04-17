<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_persona".
 *
 * @property int $id
 * @property int $id_comunidad
 * @property string $cedula
 * @property string $apellido
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $email
 *
 * @property TblComunidad $comunidad
 * @property TblSocio[] $tblSocios
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_provincia', 'id_canton', 'id_parroquia', 'id_comunidad'], 'integer'],
            [['cedula', 'apellido', 'nombre'], 'required'],
            [['cedula'], 'string', 'max' => 20],
            [['apellido', 'nombre', 'direccion', 'email'], 'string', 'max' => 100],
            [['telefono', 'celular'], 'string', 'max' => 50],
            [['cedula'], 'unique'],
            [['id_comunidad'], 'exist', 'skipOnError' => true, 'targetClass' => Comunidad::className(), 'targetAttribute' => ['id_comunidad' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
	    'id_provincia' => 'Provincia',
	    'id_canton' => 'Cantón',
	    'id_parroquia' => 'Parroquia',
            'id_comunidad' => 'Comunidad',
            'cedula' => 'Cédula',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'id_provincia']);
    }

    public function getCanton()
    {
        return $this->hasOne(Canton::className(), ['id' => 'id_canton']);
    }

    public function getParroquia()
    {
        return $this->hasOne(Parroquia::className(), ['id' => 'id_parroquia']);
    }

    public function getComunidad()
    {
        return $this->hasOne(Comunidad::className(), ['id' => 'id_comunidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocio()
    {
        return $this->hasOne(Socio::className(), ['id_persona' => 'id']);
    }
}
