<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    public function run()
    {
        Attribute::create([
            'title' => "size"
        ]);
        Attribute::create([
            'title' => "color"
        ]);
        Attribute::create([
            'title' => "material"
        ]);
    }
}
