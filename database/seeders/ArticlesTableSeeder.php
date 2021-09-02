<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <30 ; $i++) { 
            $article=new Article;
            $article->title='baiviet'.$i;
            $article->content='noidung'.$i;
            $article->image='baiviet'.$i;
            $article->mota='noidung'.$i;
            $article->save();
        }
    }
}
