<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            [
                'nama' => 'UMKM - Blaksus Ceu Mpot',
                'harga' => 15000,
                'image' => 'blaksus_ceu_m_pot.png',
                'merchant_id' => 1,
                'kategori_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'UMKM - Charipik Batagor',
                'harga' => 13000,
                'image' => 'charipik_batagor.png',
                'merchant_id' => 1,
                'kategori_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'UMKM - Kerupuk Kulit',
                'harga' => 17000,
                'merchant_id' => 1,
                'kategori_id' => 4,
                'image' => 'kerupuk_kulit.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'UMKM - Makaroni Rujak',
                'harga' => 11000,
                'image' => 'makaroni_rujak.png',
                'merchant_id' => 1,
                'kategori_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'UMKM - Pangsit Keju Tibra',
                'harga' => 11000,
                'image' => 'pangsit_keju_tibra.png',
                'merchant_id' => 1,
                'kategori_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'UMKM - Sale Pisang',
                'harga' => 15000,
                'image' => 'sale_pisang.png',
                'merchant_id' => 1,
                'kategori_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'UMKM - Sumpia',
                'harga' => 15000,
                'image' => 'sumpia.png',
                'merchant_id' => 1,
                'kategori_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Bento 9',
                'harga' => 21000,
                'image' => 'bento9_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Bakso Cuanki',
                'harga' => 22500,
                'image' => 'cuanki_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Kwetiau Goreng',
                'harga' => 17000,
                'image' => 'kwetiau_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Matcha Tea',
                'harga' => 8000,
                'image' => 'matcha_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Mojito',
                'harga' => 8000,
                'image' => 'mojito_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Bento Spesial Chicken',
                'harga' => 27000,
                'image' => 'spesial_chicken_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Mie Tektek',
                'harga' => 17000,
                'image' => 'tektek_warmingup.png',
                'merchant_id' => 2,
                'kategori_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Waku Waku - MangoLoop',
                'harga' => 5000,
                'image' => 'Waku Waku - MangoLoop.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Haku Monaka - Strawberry Crispy Choco',
                'harga' => 5000,
                'image' => 'Haku Monaka - Strawberry Crispy Choco.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Haku Monaka - Matcha',
                'harga' => 15000,
                'image' => 'Haku Monaka - Matcha.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Frostbite Mochi - Cookies & Cream',
                'harga' => 4000,
                'image' => 'Frostbite Mochi - Cookies _ Cream.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Frostbite Jcone - Cookies & Cream',
                'harga' => 6000,
                'image' => 'Frostbite Jcone - Cookies _ Cream.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Frostbite - Cookies Cream',
                'harga' => 5500,
                'image' => 'Frostbite - Cookies Cream.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Frostbite - Choconut & Cashew',
                'harga' => 5500,
                'image' => 'Frostbite - Choconut _ Cashew.png',
                'merchant_id' => 1,
                'kategori_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Aqua',
                'harga' => 4000,
                'image' => 'Aqua.png',
                'merchant_id' => 1,
                'kategori_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Beng-beng',
                'harga' => 2500,
                'image' => 'Beng - beng.png',
                'merchant_id' => 1,
                'kategori_id' => 8,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Coca-cola',
                'harga' => 5000,
                'image' => 'Coca-cola.png',
                'merchant_id' => 1,
                'kategori_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Frisian Flag',
                'harga' => 8000,
                'image' => 'Frisianflag.png',
                'merchant_id' => 1,
                'kategori_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Nextar Nastar',
                'harga' => 2500,
                'image' => 'Nextar Nastar.png',
                'merchant_id' => 1,
                'kategori_id' => 8,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Popmie',
                'harga' => 10000,
                'image' => 'Popmie.png',
                'merchant_id' => 1,
                'kategori_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Cap Pandan',
                'harga' => 10000,
                'image' => 'Cap Panda.png',
                'merchant_id' => 1,
                'kategori_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            
        ];

        Produk::insert($produk);
    }
}
