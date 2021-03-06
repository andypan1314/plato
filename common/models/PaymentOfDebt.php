<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "payment_of_debt".
 *
 * @property int $id
 * @property int $reader_id 读者姓名
 * @property int $violation_type_id 违章类型
 * @property int $payment_status 缴费状态
 * @property string $penalty 罚金(元)
 * @property string $description 描述
 * @property int $library_id 图书馆ID
 * @property int $user_id 操作员ID
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property int $status 状态
 */
class PaymentOfDebt extends \yii\db\ActiveRecord
{
    function attributes()
    {
        return array_merge(parent::attributes(), ['reader_name', 'card_number']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_of_debt';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['violation_type_id', 'payment_status',  'library_id', 'reader_id'], 'required'],
            [['violation_type_id', 'payment_status', 'reader_id', 'library_id', 'user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['penalty'], 'number'],
            [['description'], 'string', 'max' => 256],
            [['description', 'reader_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'card_number' => '卡号',
            'reader_name' => '姓名',
            'reader_id' => '读者ID',
            'violation_type_id' => '违章类型',
            'payment_status' => '缴费状态',
            'penalty' => '罚金(元)',
            'description' => '描述',
            'library_id' => '图书馆ID',
            'user_id' => '操作员ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'status' => '状态',
        ];
    }

    public function getReader()
    {
        return $this->hasOne(Reader::className(), ['id' => 'reader_id' ]);
    }

    public function getViolationType()
    {
        return $this->hasOne(ViolationType::className(), ['id' => 'violation_type_id' ]);
    }

    static function getPaymentStatusOption($key=null)
    {
        $arr = array(
            1 => '已缴费',
            0 => '未缴费',
        );
        return $key === null ? $arr : (isset($arr[$key]) ? $arr[$key] : '');
    }

    static function getPaymentStatus($model)
    {
        return self::getPaymentStatusOption($model->payment_status);
    }


    static function getViolationTypeOption($key=null)
    {
        $violationtypes = ViolationType::find()->asArray()->all();
        foreach ($violationtypes as $violationtype) {
            $value = $violationtype['id'];
            $arr[$value] = "{$violationtype['title']}";
        }

        return $key === null ? $arr : (isset($arr[$key]) ? $arr[$key] : '');
    }


}
