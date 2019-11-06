<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->name = "Món Việt";
        $tag->slug = Str::slug('Món Việt');
        $tag->save();
        $tag = new Tag();
        $tag->name = "Món Nhật";
        $tag->slug = Str::slug('Món Nhật');
        $tag->save();
        $tag = new Tag();
        $tag->name = "Món Mỹ";
        $tag->slug = Str::slug('Món Mỹ');
        $tag->save();
        $tag = new Tag();
        $tag->name = "Chia sẻ";
        $tag->slug = Str::slug('Chia sẻ');
        $tag->save();
    }
}
