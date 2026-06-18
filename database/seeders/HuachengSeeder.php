<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HuachengSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Clean Board', 'icon' => '▤', 'description' => 'Papan bangunan bersih untuk kebutuhan dinding, plafon, dan panel proyek.'],
            ['name' => 'Aksesoris', 'icon' => '⚙', 'description' => 'Komponen pendukung instalasi material bangunan modular.'],
            ['name' => 'Ubin Baja Warna', 'icon' => '▦', 'description' => 'Material atap dan panel baja warna untuk kebutuhan bangunan.'],
            ['name' => 'Ubin Resin', 'icon' => '◆', 'description' => 'Produk ubin resin yang ringan dan praktis untuk berbagai kebutuhan.'],
            ['name' => 'Ubin PVC', 'icon' => '◈', 'description' => 'Ubin PVC untuk solusi bangunan yang efisien dan mudah diaplikasikan.'],
            ['name' => 'Rumah Panel Portabel', 'icon' => '⌂', 'description' => 'Solusi bangunan portabel untuk kebutuhan proyek dan fasilitas sementara.'],
            ['name' => 'Rumah Kontainer', 'icon' => '▣', 'description' => 'Rumah kontainer bongkar pasang cepat untuk kebutuhan modular.'],
        ];

        foreach ($categories as $index => $item) {
            ProductCategory::query()->updateOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'name' => $item['name'],
                    'icon' => $item['icon'],
                    'description' => $item['description'],
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }

        $products = [
            ['Clean Board Premium', 'Clean Board', 'Papan clean board untuk kebutuhan proyek bangunan yang rapi dan efisien.'],
            ['Aksesoris Panel Modular', 'Aksesoris', 'Aksesoris pendukung untuk pemasangan panel dan material modular.'],
            ['Ubin Baja Warna', 'Ubin Baja Warna', 'Ubin baja warna untuk kebutuhan atap dan konstruksi ringan.'],
            ['Ubin Resin Proyek', 'Ubin Resin', 'Material ubin resin dengan karakter ringan dan mudah dipasang.'],
            ['Ubin PVC Modular', 'Ubin PVC', 'Ubin PVC untuk kebutuhan bangunan modular dan fasilitas proyek.'],
            ['Rumah Panel Portabel', 'Rumah Panel Portabel', 'Bangunan panel portabel untuk kantor proyek, mess, atau fasilitas sementara.'],
            ['Rumah Kontainer Bongkar Pasang Cepat', 'Rumah Kontainer', 'Solusi rumah kontainer modular yang cepat dipasang dan fleksibel.'],
        ];

        foreach ($products as $index => [$name, $categoryName, $short]) {
            $category = ProductCategory::query()->where('name', $categoryName)->first();

            Product::query()->updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'product_category_id' => $category?->id,
                    'name' => $name,
                    'short_description' => $short,
                    'description' => $short . "\n\nProduk dapat digunakan untuk berbagai kebutuhan proyek bangunan. Hubungi tim sales untuk informasi ketersediaan, ukuran, dan penawaran harga.",
                    'specification' => "Material: Sesuai tipe produk\nKebutuhan: Project supply / konstruksi modular\nInformasi detail: Hubungi sales Huacheng",
                    'price' => null,
                    'image' => null,
                    'is_featured' => $index < 6,
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}
