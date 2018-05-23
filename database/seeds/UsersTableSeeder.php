<?php

use Illuminate\Database\Seeder;
use App\Domains\Access\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => '1111',
            'nome' => 'ANGELO NETO',
            'email' => 'angelo.neto@portovelho.ro.gov.br',
            'password' => bcrypt('123456')
        ]);
        factory(App\Domains\Access\Models\User::class, 50)->create();
    }
}
