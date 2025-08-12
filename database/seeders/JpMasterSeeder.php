<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class JpMasterSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'uid' => (string) Str::uuid(),
            'username' => 'jp',
            'email' => 'jp@bitka.de',
            'first_name' => 'Jan',
            'last_name' => 'Behrens',
            'gender' => 'm',
            'role' => 'master',
            'password' => bcrypt('Lefibu&9631')
        ]);
    }
}
