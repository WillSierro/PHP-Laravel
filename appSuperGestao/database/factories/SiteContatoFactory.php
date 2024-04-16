<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        //
        'nome'=>$faker->name,
        'telefone'=>$faker->tollFreePhoneNumber,
        'email'=>$faker->unique()->email,
        'motivoContato'=>$faker->numberBetween(1,3),
        'mensagem'=>$faker->text(200)
        //no lavavel 8 tem que ser
        // 'nome'=>$this->faker->name
    ];
});
