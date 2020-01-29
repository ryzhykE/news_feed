<?php


use App\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(User::class, 10)->create();
    }
}
