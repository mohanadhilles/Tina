<?php

$factory->define(App\ManageLive::class, function (Faker\Generator $faker) {
    return [
        "url" => $faker->name,
        "validate" => collect(["1","0",])->random(),
    ];
});
