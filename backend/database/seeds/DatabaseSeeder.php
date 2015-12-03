<?php

use App\Pessoa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use JansenFelipe\FakerBR\FakerBR;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Faker\Factory::create();
        $faker->addProvider(new FakerBR($faker));


        for($i=1; $i<=300; $i++){

            Pessoa::insert([
                'nome' => $faker->name,
                'documento' => $faker->cpf,
                'genero' => $faker->randomElement(['M','F']),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime
            ]);

        }

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
