<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;


class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 日本の県名リスト
        $prefectures = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', 
            '山形県', '福島県', '茨城県', '栃木県', '群馬県', 
            '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', 
            '富山県', '石川県', '福井県', '山梨県', '長野県', 
            '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', 
            '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', 
            '鳥取県', '島根県', '岡山県', '広島県', '山口県', 
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', 
            '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', 
            '鹿児島県', '沖縄県'
        ];

        // ランダムに県名を選択
        $prefecture = $this->faker->randomElement($prefectures);

        // categoriesテーブルからランダムなIDを取得
        $categoryId = Category::inRandomOrder()->first()->id;

        return [
            'category_id'  => $categoryId, // 取得したIDを指定
            'first_name' => $this->faker->firstName, // ランダムな名前
            'last_name' => $this->faker->lastName, // ランダムな名字
            'gender' => $this->faker->randomElement([0, 1, 2]), // 性別
            'email' => $this->faker->unique()->safeEmail, // 一意なメールアドレス
            'tell' => $this->faker->phoneNumber, // 電話番号
            'address' => $prefecture . ' ' . $this->faker->city . ' ' . $this->faker->streetName . ' ' . $this->faker->buildingNumber, // 県名を含む住所
            'building' => $this->faker->randomElement(['サンシャインハイツ', 'グリーンパーク', ' ']), // アパート名
            'detail' => '詳細未記入' // デフォルト値を設定
        ];
    }
}
