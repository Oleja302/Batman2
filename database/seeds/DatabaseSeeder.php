<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*
\App\Product::create([
'name'=>"23423423423",
'description'=>"1111111111",
'img_url'=>"https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg",
'price'=>100,
]);

\App\Product::create([
'name'=>"Фигня",
'description'=>"Хз",
'img_url'=>"https://upload.wikimedia.org/wikipedia/ru/a/a2/Batman_Jim_Lee.jpg",
'price'=>110000,
]);

\App\Product::create([
'name'=>"Фигня 2",
'description'=>"Хз 2",
'img_url'=>"https://upload.wikimedia.org/wikipedia/ru/a/a2/Batman_Jim_Lee.jpg",
'price'=>11000000,
]);

\App\Product::create([
'name'=>"Фигня 3",
'description'=>"Хз 3",
'img_url'=>"https://upload.wikimedia.org/wikipedia/ru/a/a2/Batman_Jim_Lee.jpg",
'price'=>110,
]);

\App\Product::create([
'name'=>"Фигня 4",
'description'=>"Хз 4",
'img_url'=>"https://upload.wikimedia.org/wikipedia/ru/a/a2/Batman_Jim_Lee.jpg",
'price'=>10000,
]);

\App\Product::create([
'name'=>"Фигня 5",
'description'=>"Хз 5",
'img_url'=>"https://upload.wikimedia.org/wikipedia/ru/a/a2/Batman_Jim_Lee.jpg",
'price'=>10,
]);
\App\Product::create([
'name'=>"Фигня 6",
'description'=>"Хз 6",
'img_url'=>"https://i.pinimg.com/736x/ab/b6/a8/abb6a800ab2193fcedd9bda566b7402c.jpg",
'price'=>185858585,
]);
\App\Product::create([
'name'=>"Фигня 7",
'description'=>"Хз 7",
'img_url'=>"https://st.depositphotos.com/1757583/2169/i/450/depositphotos_21696885-stock-photo-yin-yang-symbol.jpg",
'price'=>785746,
]);

\App\Product::create([
'name'=>"Фигня 8",
'description'=>"Хз 8",
'img_url'=>"https://upload.wikimedia.org/wikipedia/commons/c/c9/Moon.jpg",
'price'=>64525143,
]);

\App\Product::create([
'name'=>"Фигня 8",
'description'=>"Хз 8",
'img_url'=>"https://upload.wikimedia.org/wikipedia/commons/0/0f/Papilio_Machaon_JPG1a.jpg",
'price'=>64525143,
]);
\App\Product::create([
'name'=>"Фигня 9",
'description'=>"Хз 9",
'img_url'=>"https://media.alienwarearena.com/media/tux-g.jpg",
'price'=>512313,
]);
\App\Product::create([
'name'=>"Фигня 10",
'description'=>"Хз 10",
'img_url'=>"http://goodimg.ru/img/kartinki-jpg4.jpg",
'price'=>035463,
]);                                                          */

        $arr = ["cat1", "cat2", "cat3"];
        foreach ($arr as $key => $value) {
            $cat = Category::create([
                'title' => 'Barell',
                'description' => 'Oil',
                'img_url' => "http://goodimg.ru/img/kartinki-jpg4.jpg",
            ]);
/*
          */

        }

        $categories = Category::all();

        foreach($categories as $category){
            for ($i = 0; $i <  10; $i++) {

                $prod = \App\Product::create([
                    'title' => "Фигня 10",
                    'description' => "Хз 10",
                    'img_url' => "http://goodimg.ru/img/kartinki-jpg4.jpg",
                    'price' => 035463,
                ]);
                $cat->products()->attach(
                    $prod->id

                );
            }
        }


    }
}
