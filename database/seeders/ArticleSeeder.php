<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new Article();
        $item->title = "Nguyễn Danh Bảo Thắng";
        $item->content = "Nhân hát rất hay";
        $item->date ='2003/11/25';
        $item->category_id ='1';
        $item->author_id ='1';
        $item->status ='1';
        $item->save();
    }
}
