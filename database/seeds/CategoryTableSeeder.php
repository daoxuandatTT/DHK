<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Canh,bún,ph";
        $category->image = "image1";
        $category->save();

        $category = new Category();
        $category->name = "Chiên,rán,nướng";
        $category->image = "image2";
        $category->save();

        $category = new Category();
        $category->name = "Món hầm,ninh,om";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Món nộm,gỏi";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Món ăn chay";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Món tráng miệng";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Kho,rang,xào";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Món luộc,hấp";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Món lẩu";
        $category->image = "image3";
        $category->save();

        $category = new Category();
        $category->name = "Món ngon khác";
        $category->image = "image3";
        $category->save();
    }
}
