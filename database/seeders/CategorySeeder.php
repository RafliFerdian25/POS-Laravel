<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singkat = ['ABS', 'ATK', 'BBS', 'BMB', 'COS', 'LST', 'MKN', 'MNM', 'OBT', 'PRM'];
        $name = ['Alat Berat', 'Alat Tulis Kantor', 'Kebutuhan Rumah', 'Bahan Makanan', 'Cosmetic', 'Listrik', 'Makanan', 'Minuman', 'Obat-obatan', 'Perabotan'];
        foreach ($singkat as $key => $value) {
            $categories[] = [
                'id' => $singkat[$key],
                'name' => $name[$key],
            ];
        }
        print_r($categories);
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
