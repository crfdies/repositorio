<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $usr_id
 * @property string $usr_nombre
 * @property string $usr_apellidos
 * @property string $usr_usuario
 * @property string $usr_contrasenia
 * @property string $usr_fecha
 * @property string $usr_correo
 * @property string $usr_tipo
 *
 * The followings are the available model relations:
 * @property Recurso[] $recursos
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	 
	 
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usr_nombre, usr_apellidos, usr_usuario, usr_contrasenia, usr_correo', 'required'),
			array('usr_nombre, usr_apellidos', 'length', 'max'=>240),
			array('usr_correo', 'email'),
			array('usr_usuario', 'length', 'max'=>30),
			array('usr_contrasenia', 'length', 'max'=>200),
			array('usr_correo', 'length', 'max'=>150),
			array('usr_tipo', 'length', 'max'=>100),
			array('usr_fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usr_id, usr_nombre, usr_apellidos, usr_usuario, usr_correo, usr_tipo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'recursos' => array(self::HAS_MANY, 'Recurso', 'usr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usr_id' => 'Usr',
			'usr_nombre' => 'Nombre',
			'usr_apellidos' => 'Apellidos',
			'usr_usuario' => 'Usuario',
			'usr_contrasenia' => 'Contraseña',
			'usr_fecha' => 'Fecha de registro',
			'usr_correo' => 'Correo',
			'usr_tipo' => 'Tipo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('usr_id',$this->usr_id,true);
		$criteria->compare('usr_nombre',$this->usr_nombre,true);
		$criteria->compare('usr_apellidos',$this->usr_apellidos,true);
		$criteria->compare('usr_usuario',$this->usr_usuario,true);
		$criteria->compare('usr_contrasenia',$this->usr_contrasenia,true);
		$criteria->compare('usr_fecha',$this->usr_fecha,true);
		$criteria->compare('usr_correo',$this->usr_correo,true);
		$criteria->compare('usr_tipo',$this->usr_tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->usr_contrasenia);
	}
	
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}
	
	protected function beforeSave(){
		parent::beforeSave();
		if($this->_oldPass!='' && $this->usr_contrasenia==$this->_oldPass){
		
		}
		else{
			//Encriptar contraseña
			$this->usr_contrasenia=$this->hashPassword($this->usr_contrasenia);
		}
		return true;
		}
		
	private $_oldPass='';
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldPass=$this->usr_contrasenia;
	}



}
