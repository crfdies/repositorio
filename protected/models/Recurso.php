<?php

/**
 * This is the model class for table "recurso".
 *
 * The followings are the available columns in table 'recurso':
 * @property integer $r_id
 * @property string $r_titulo
 * @property string $r_descripcion
 * @property string $r_grado
 * @property string $r_materia
 * @property string $r_nivel
 * @property string $r_entorno
 * @property string $r_tema
 * @property string $r_herramienta
 * @property string $r_enlace
 * @property string $r_archivo
 * @property string $r_fechaC
 * @property string $usr_id
 * @property string $r_tags
 * @property integer $r_estado
 *
 * The followings are the available model relations:
 * @property Usuario $usr
 */
class Recurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recurso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('r_titulo, r_descripcion, r_grado, r_materia, r_nivel, r_entorno', 'required'),
			array('r_estado', 'numerical', 'integerOnly'=>true),
			array('r_titulo', 'length', 'max'=>200),
			array('r_grado', 'length', 'max'=>100),
			array('r_materia, r_nivel, r_archivo', 'length', 'max'=>150),
			array('r_entorno, r_tags', 'length', 'max'=>240),
			array('r_tema, r_herramienta, r_enlace', 'length', 'max'=>245),
			array('usr_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('r_id, r_titulo, r_descripcion, r_grado, r_materia, r_nivel, r_entorno, r_tema, r_herramienta, r_enlace, r_archivo, r_fechaC, usr_id, r_tags, r_estado', 'safe', 'on'=>'search'),
			array('r_tags', 'match', 'pattern'=>'/^[\w\s,]+$/',
				'message'=>'Las palabras clave solo se permiten letras, números y comas.'),
			array('r_tags', 'normalizeTags'),

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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'r_id' => 'Folio',
			'r_titulo' => 'Título',
			'r_descripcion' => 'Descripción',
			'r_grado' => 'Grado',
			'r_materia' => 'Materia',
			'r_nivel' => 'Nivel',
			'r_entorno' => 'Entorno',
			'r_tema' => 'Tema',
			'r_herramienta' => 'Herramienta',
			'r_enlace' => 'Enlace',
			'r_archivo' => 'Archivo',
			'r_fechaC' => 'Fecha de creación',
			'usr_id' => 'Usuario',
			'r_tags' => 'Palabras clave',
			'r_estado' => 'Estado',
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

		$criteria->compare('r_id',$this->r_id);
		$criteria->compare('r_titulo',$this->r_titulo,true);
		$criteria->compare('r_descripcion',$this->r_descripcion,true);
		$criteria->compare('r_grado',$this->r_grado,true);
		$criteria->compare('r_materia',$this->r_materia,true);
		$criteria->compare('r_nivel',$this->r_nivel,true);
		$criteria->compare('r_entorno',$this->r_entorno,true);
		$criteria->compare('r_tema',$this->r_tema,true);
		$criteria->compare('r_herramienta',$this->r_herramienta,true);
		$criteria->compare('r_enlace',$this->r_enlace,true);
		$criteria->compare('r_archivo',$this->r_archivo,true);
		$criteria->compare('r_fechaC',$this->r_fechaC,true);
		$criteria->compare('usr_id',$this->usr_id,true);
		$criteria->compare('r_tags',$this->r_tags,true);
		$criteria->compare('r_estado',$this->r_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave(){
		
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->usr_id=Yii::app()->user->id;
			}
			return true;
		}
		else
			return false;
		

		}
		
	public function normalizeTags($attribute,$params)
	{
		$this->r_tags=Tag::array2string(array_unique(Tag::string2array($this->r_tags)));
	}

	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/',trim($tags),-1,PREG_SPLIT_NO_EMPTY);
	}
	
	public static function array2string($tags)
	{
		return implode(', ',$tags);
	}

		
	protected function afterSave()
	{
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags, $this->r_tags);
	}
	
	private $_oldTags;
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags=$this->r_tags;
	}
	
	protected function afterDelete()
	{
		parent::afterDelete();
		Tag::model()->updateFrequency($this->r_tags, '');
	}

}
