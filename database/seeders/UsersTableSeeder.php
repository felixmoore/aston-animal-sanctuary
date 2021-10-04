<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //created an instance of Faker class to the variable $faker
        $faker = Faker::create('en_GB');

        //getting all existing User ids into a $users array
        $users = User::all()->pluck('id')->toArray();

        //generate 10 records for the accounts table
        foreach (range(1, 10) as $index) {
            $dateTime = $faker->dateTimeThisYear();
            $name = $faker->firstName() . ' ' . $faker->lastName();
            DB::table('users')->insert([
                'type' => $faker->randomElement($array = array(0, 1)),
                'name' => $name,
                'email' => $faker->safeEmail(),
                'password' => $faker->password(),
                'username' => $faker->userName(),
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        }
    }
}
