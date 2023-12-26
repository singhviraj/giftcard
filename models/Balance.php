<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "balance".
 *
 * @property int $customer_number
 * @property string $card_number
 * @property int $balance
 */
class Balance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_number', 'balance'], 'required'],
            [['balance'], 'integer'],
            [['card_number'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_number' => 'Customer Number',
            'card_number' => 'Card Number',
            'balance' => 'Balance',
        ];
    }
}
