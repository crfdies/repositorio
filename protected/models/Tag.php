<?php

/**
 * This is the model class for table "tag".
 *
 * The followings are the available columns in table 'tag':
 * @property string $t_id
 * @property string $t_tag
 * @property string $t_frecuencia
 */
class Tag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('t_tag, t_frecuencia', 'required'),
			array('t_tag', 'length', 'max'=>100),
			array('t_frecuencia', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('t_id, t_tag, t_frecuencia', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			't_id' => 'T',
			't_tag' => 'T Tag',
			't_frecuencia' => 'T Frecuencia',
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

		$criteria->compare('t_id',$this->t_id,true);
		$criteria->compare('t_tag',$this->t_tag,true);
		$criteria->compare('t_frecuencia',$this->t_frecuencia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function findTagWeights($limit=20)
	{
		$models=$this->findAll(array(
			'order'=>'t_frecuencia DESC',
			'limit'=>$limit,
		));

		$total=0;
		foreach($models as $model)
			$total+=$model->t_frecuencia;

		$tags=array();
		if($total>0)
		{
			foreach($models as $model)
				$tags[$model->t_tag]=8+(int)(16*$model->t_frecuencia/($total+10));
			ksort($tags);
		}
		return $tags;
	}
	
	public function suggestTags($keyword,$limit=20)
	{
		$tags=$this->findAll(array(
			'condition'=>'r_tag LIKE :keyword',
			'order'=>'t_frecuencia DESC, Name',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($tags as $tag)
			$names[]=$tag->t_tag;
		return $names;
	}

	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/',trim($tags),-1,PREG_SPLIT_NO_EMPTY);
	}

	public static function array2string($tags)
	{
		return implode(', ',$tags);
	}

	public function updateFrequency($oldTags, $newTags)
	{
		$oldTags=self::string2array($oldTags);
		$newTags=self::string2array($newTags);
		$this->addTags(array_values(array_diff($newTags,$oldTags)));
		$this->removeTags(array_values(array_diff($oldTags,$newTags)));
	}

	public function addTags($tags)
	{
		$criteria=new CDbCriteria;
		$criteria->addInCondition('t_tag',$tags);
		$this->updateCounters(array('t_frecuencia'=>1),$criteria);
		foreach($tags as $name)
		{
			if(!$this->exists('t_tag=:t_tag',array(':t_tag'=>$name)))
			{
				$tag=new Tag;
				$tag->t_tag=$name;
				$tag->t_frecuencia=1;
				$tag->save();
			}
		}
	}

	public function removeTags($tags)
	{
		if(empty($tags))
			return;
		$criteria=new CDbCriteria;
		$criteria->addInCondition('t_tag',$tags);
		$this->updateCounters(array('t_frecuencia'=>-1),$criteria);
		$this->deleteAll('t_frecuencia<=0');
	}
}
