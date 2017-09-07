<?php

namespace yii2learning\chartbuilder\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%cb_connection}}".
 *
 * @property string $id
 * @property string $connection_name
 * @property string $driver
 * @property string $host
 * @property string $port
 * @property string $username
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Connection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cb_connection}}';
    }

    public function behaviors(){
        return [
            BlameableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'id',
                ],
                'value' => function ($event) {
                    return \thamtech\uuid\helpers\UuidHelper::uuid();
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'password',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'password',
                ],
                'value' => function ($event) {
                    return static::encryptValue($this->password);
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => 'password',
                ],
                'value' => function ($event) {
                    return static::decryptValue($this->password);
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['connection_name'], 'required'],
            [[ 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id'], 'string', 'max' => 36],
            [['connection_name','driver','database','charset'], 'string', 'max' => 255],
            [['host'], 'string', 'max' => 30],
            [['port'], 'string', 'max' => 10],
            [['username', 'password'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'connection_name' => Yii::t('app', 'Connection Name'),
            'driver' => Yii::t('app', 'Driver'),
            'host' => Yii::t('app', 'Host'),
            'port' => Yii::t('app', 'Port'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @inheritdoc
     * @return ConnectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConnectionQuery(get_called_class());
    }

    public static function getConnection($id){
        $connectDsnTemplate = '{driver}:host={host};dbname={database};port={port}';
        $con =   static::findOne($id);
        if($con !== null){
            $dsn =  strtr($connectDsnTemplate,[
              '{driver}'=>$con->driver,
              '{host}'=>$con->host,
              '{database}'=>$con->database,
              '{port}'=>!empty($con->port) ? $con->port : '3306'
            ]);
            return new \yii\db\Connection([
                'dsn'=> $dsn,
                'username'=>$con->username,
                'password'=>$con->password,
                'charset' => $con->charset
              ]);
        }else{
            if($id==='db'){
                return Yii::$app->db;
            }else{
                Yii::$app->session->setFlash('warning','The requested Connection name does not exist');
                return false;
            }
        }
    }

    public static function encryptValue($value){
      return utf8_encode(Yii::$app->getSecurity()->encryptByPassword($value ,  \Yii::$app->getModule('chartbuilder')->secretKey));
    }

    public static function decryptValue($value){
      return Yii::$app->getSecurity()->decryptByPassword(utf8_decode($value),  \Yii::$app->getModule('chartbuilder')->secretKey);
    }

    public function itemsAilas($key){
        $items = [
          'driver'=>[
            'mysql' => 'Mysql',
            'pgsql' => 'PostgreSQL',
            'sqlsrv' => 'MS SQL Server(via sqlsrv driver)',
            'dblib' => 'MS SQL Server (via dblib driver)',
            'mssql' => 'MS SQL Server (via mssql driver)',
            'oci' => 'Oracle'
          ]
        ];
        return array_key_exists($key, $items) ? $items[$key] : [];
      }
      public function getDriverItems(){
        return $this->itemsAilas('driver');
      }

      public function getCharacterSet(){
        $characters = Yii::$app->db->createCommand('SELECT * FROM information_schema.CHARACTER_SETS')
        ->queryAll();
        return ArrayHelper::map($characters, 'CHARACTER_SET_NAME', 'CHARACTER_SET_NAME');
      }
}
