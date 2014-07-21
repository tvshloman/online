<?php

/**
 * This is the model class for table "phrase".
 *
 * The followings are the available columns in table 'phrase':
 * @property integer $phrase_id
 * @property string $text
 * @property string $time
 * @property integer $admin_user
 */
class Phrase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phrase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, time, admin_user', 'required'),
			array('admin_user', 'numerical', 'integerOnly'=>true),
			array('text', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('phrase_id, text, time, admin_user', 'safe', 'on'=>'search'),
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
			'phrase_id' => 'Phrase',
			'text' => 'Text',
			'time' => 'Time',
			'admin_user' => 'Admin User',
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

		$criteria->compare('phrase_id',$this->phrase_id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('admin_user',$this->admin_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phrase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeValidate(){
        if($this->isNewRecord && empty($this->time)){
            $this->time = new CDbExpression('NOW()');
        }
        $this->admin_user = 1;
        return true;
    }
}
