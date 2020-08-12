<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProdutoTableSeeder::class);
    }
}

class ProdutoTableSeeder extends Seeder {
    public function run()
    {
        DB::insert('INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
        VALUES (?,?,?,?,?,?,?,?)',
        array('2', 'Empresa', 'empresa@empresa.com', '2020-08-12 12:18:31', '12345', '12345', '2020-08-12 12:18:31', '2020-08-12 12:18:31'));

        DB::insert('INSERT INTO users (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
        VALUES (?,?,?,?,?,?,?,?)',
        array('3', 'Amizade', 'empresa@empresa.com', '2020-08-12 12:18:31', '12345', '12345', '2020-08-12 12:18:31', '2020-08-12 12:18:31'));
    }
}
