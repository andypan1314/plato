<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reader".
 *
 * @property int $id
 * @property string $card_number 卡号
 * @property int $card_status 证件状态
 * @property string $reader_name 姓名
 * @property int $validity 有效期限
 * @property string $id_card 身份证
 * @property int $reader_type_id 读者类型
 * @property int $gender 性别
 * @property string $deposit 押金(元)
 * @property string $mobile 电话
 * @property string $address 地址
 * @property int $library_id 图书馆ID
 * @property int $user_id 操作员ID
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property int $status 状态
 */
class Reader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reader';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_number', 'reader_name', 'validity', 'id_card', 'reader_type_id', 'gender', 'library_id'], 'required'],
            [['card_status', 'validity', 'reader_type_id', 'gender', 'library_id', 'user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['deposit'], 'number'],
            [['card_number', 'reader_name', 'id_card'], 'string', 'max' => 64],
            [['mobile', 'address'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_number' => '卡号',
            'card_status' => '证件状态',
            'reader_name' => '姓名',
            'validity' => '有效期限',
            'id_card' => '身份证',
            'reader_type_id' => '读者类型',
            'gender' => '性别',
            'deposit' => '押金(元)',
            'mobile' => '电话',
            'address' => '地址',
            'library_id' => '图书馆ID',
            'user_id' => '操作员ID',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'status' => '状态',
        ];
    }
}
