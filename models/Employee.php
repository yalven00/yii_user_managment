<?php
namespace app\models;
class Employee extends \yii\db\ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'employees';
	}

   public function fields()
    {
        return ['id', 'title', 'email'];
    }

	/**
	 * @return array primary key of the table
	 **/	 
	public static function primaryKey()
	{
		return array('id');
	}

	  public function rules()
    {
        return [
            [['title', 'email'], 'required'],
            [['title', 'email'], 'string', 'max' => 255],
            ['email', 'email']
        ];
    }

}