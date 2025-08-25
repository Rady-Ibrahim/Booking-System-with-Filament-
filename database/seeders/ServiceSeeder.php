<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::insert([
            [
                'name' => 'طباعة كروت شخصية',
                'description' => 'تصميم وطباعة كروت شخصية عالية الجودة',
                'price' => 150.00,
            ],
            [
                'name' => 'طباعة بنرات',
                'description' => 'بنرات بمقاسات مختلفة للطباعة الإعلانية',
                'price' => 300.00,
            ],
            [
                'name' => 'طباعة كتب',
                'description' => 'طباعة كتب وكتيبات مع تجليد احترافي',
                'price' => 500.00,
            ],
            [
                'name' => 'تصميم جرافيك',
                'description' => 'خدمة التصميم الجرافيكي لجميع المطبوعات',
                'price' => 200.00,
            ],
        ]);
    }

}
