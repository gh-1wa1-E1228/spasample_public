<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (app()->isLocal()) {

            //DB::statement("TRUNCATE TABLE `categories`");

            DB::table('users')->where('name','LIKE', '%[TEST]%')->delete();
            DB::table('articles')->where('title','LIKE', '%[TEST]%')->delete();
            DB::table('categories')->where('name','LIKE', '%[TEST]%')->delete();

            // ローカル環境のみ
            // test@example.com / WkWgpUVEhDweXU4 でログイン可能
            User::factory()->create([
                'name' => '[TEST]test user',
                'email' => 'test@example.com',
                'password' => 'WkWgpUVEhDweXU4',
            ]);

            $cate_ids = [];
            for ($n = 1; $n <= 10; $n++) {
                $cate = Category::factory()->create([
                    'name' => '[TEST]カテゴリ'.$n,
                    'sort_number' => $n,
                    'is_display' => 1,
                ]);
                $cate_ids[] = $cate->id;
            }

            $imgs = [
                'https://m.media-amazon.com/images/I/41Tssk1Qf8L.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/41dGTchL6+L._SX300_.jpg',
                'https://m.media-amazon.com/images/I/61ecuCf1NnL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91xFkWfwcjL._AC_SL1500_.jpg',
                'https://m.media-amazon.com/images/I/61RmDQUGIAL._AC_SX679_.jpg',
                'https://m.media-amazon.com/images/I/61JRWo8N60L.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71KdBa00kpL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/51NvBZYf8cL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71O8TwEHnHL._AC_SX679_.jpg',
                'https://m.media-amazon.com/images/I/61ylKuCU26L.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/811hP3hZByL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/619W8M-aHaL.__AC_SY445_SX342_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71+oRheeCvS._SY300_.jpg',
                'https://m.media-amazon.com/images/I/417+dPq3vRL._SX300_.jpg',
                'https://m.media-amazon.com/images/I/51AZK981XQL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/41bn0gNzReL._UX358_FMwebp_QL85_.jpg',
                'https://m.media-amazon.com/images/I/51bnDTGdM2L.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/61k7AG-D2GL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81D9t2wdqiL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81m509vvPbL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81d9vC9QWUL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/61b5+-ix2tL._SX300_.jpg',
                'https://m.media-amazon.com/images/I/71DC98YIe8L.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81ZGf4xcETL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91QNwRj56hL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71o2-DW9KrL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91iovh+GMKL._SX300_.jpg',
                'https://m.media-amazon.com/images/I/61KK8g8RVmL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91dTLHSQdkL._AC_SL1400_.jpg',
                'https://m.media-amazon.com/images/I/51zeyYKXFWL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/713fT9qE4WL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71Z5GvvEOVL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91LkuCutW2L.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91ym3sMcvRL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71aKGiY97sL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71XKkjEj-jL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/51xxelZiGGL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81LKBfvEopL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71ravrwq6dL._AC_SL1200_.jpg',
                'https://m.media-amazon.com/images/I/610pvbfG2NL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/610pvbfG2NL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81VqPDMr2dL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71URB4rJNML._AC_SX679_.jpg',
                'https://m.media-amazon.com/images/I/A1M3JyPv3pL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/A16ZXD9CTFL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/51eii-HQDJL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/617c2odHZML.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71QvntB9KJS.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71vgAknLImL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/61N1B4y39mL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91T75FeL01L.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71u2bg+Cb8L._SY300_.jpg',
                'https://m.media-amazon.com/images/I/81i+RkYykHL._SY300_.jpg',
                'https://m.media-amazon.com/images/I/51nKLGzvy8L.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/514XXPywKoL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/71HNaF39PYL.__AC_SX300_SY300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/81kH-BQDsAL.__AC_SY300_SX300_QL70_ML2_.jpg',
                'https://m.media-amazon.com/images/I/91r3f7RUobL.__AC_SX300_SY300_QL70_ML2_.jpg',
            ];
            $imgs_cnt = count($imgs) - 1;

            for ($n = 1; $n <= 1000; $n++) {
                Article::factory()->create([
                    'title' => '[TEST]記事'.$n,
                    'description' => '概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要概要',
                    'content' => '内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容',
                    'category_id' => $cate_ids[rand(0, 9)],
                    'thumbnail_image' => $imgs[rand(0, $imgs_cnt)],
                    'image' => $imgs[rand(0, $imgs_cnt)],
                    'is_display' => 1,
                    'sort_number' => $n,
                ]);
            }



    
        }
    }
}
