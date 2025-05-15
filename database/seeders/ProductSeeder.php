<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Sofa Minimalis Modern',
                'description' => 'Sofa minimalis dengan desain modern, nyaman untuk ruang tamu Anda.',
                'price' => 2500000,
                'image' => 'products/sofaminimalis.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Meja Makan Kayu Jati',
                'description' => 'Meja makan terbuat dari kayu jati berkualitas tinggi, tahan lama dan elegan.',
                'price' => 3500000,
                'image' => 'products/meja-makan.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'Lemari Pakaian 3 Pintu',
                'description' => 'Lemari pakaian dengan 3 pintu, memiliki banyak ruang penyimpanan.',
                'price' => 2800000,
                'image' => 'products/lemari-pakaian.jpg',
                'stock' => 8,
            ],
            [
                'name' => 'Rak TV Minimalis',
                'description' => 'Rak TV dengan desain minimalis, cocok untuk ruang keluarga modern.',
                'price' => 1200000,
                'image' => 'products/rak-tv.jpg',
                'stock' => 15,
            ],
            [
                'name' => 'Kursi Kerja Ergonomis',
                'description' => 'Kursi kerja ergonomis untuk kenyamanan maksimal saat bekerja.',
                'price' => 1800000,
                'image' => 'products/kursi-kerja.jpg',
                'stock' => 12,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 