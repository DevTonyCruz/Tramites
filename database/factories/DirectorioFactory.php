<?php

use Faker\Generator as Faker;
use App\Models\Directorio;

$factory->define(Directorio::class, function (Faker $faker) {
    return [
        
        
        
        
        
        
        
        
        
  
        "nombre" => $faker->firstName($gender = null),
        "appaterno" => $faker->lastName,
        "apmaterno" => $faker->lastName,
        "direccion" => $faker->streetName,
        "interior" => strtoupper($faker->randomLetter),
        "exterior" => $faker->numberBetween($min = 1, $max = 9999),
        "sepomex_id" => $faker->numberBetween($min = 82634, $max = 84625),
        "telefono" => $faker->numberBetween($min = 0, $max = 9) .  
                    $faker->numberBetween($min = 0, $max = 9) . '-' .
                    $faker->numberBetween($min = 0, $max = 9) .
                    $faker->numberBetween($min = 0, $max = 9) . '-' .
                    $faker->numberBetween($min = 0, $max = 9) .
                    $faker->numberBetween($min = 0, $max = 9) . '-' .
                    $faker->numberBetween($min = 0, $max = 9) .
                    $faker->numberBetween($min = 0, $max = 9) . '-' .
                    $faker->numberBetween($min = 0, $max = 9) .
                    $faker->numberBetween($min = 0, $max = 9) ,
        "email" => $faker->email,

        "facebook" => $faker->url,
        "instagram" => $faker->url,
        "twitter" => $faker->url,

        "id_profesion" => $faker->numberBetween($min = 1, $max = 10),
        "id_grupos" => $faker->numberBetween($min = 1, $max = 10),

        "fecha_contacto" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "fecha_nacimiento" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "fecha_importante" => $faker->date($format = 'Y-m-d', $max = 'now'),
        "concepto_fecha_importante" => $faker->text($maxNbChars = 150),

        "observaciones" => $faker->text($maxNbChars = 150),
        "distrito" => $faker->text($maxNbChars = 10),
        "demarcacion" => $faker->text($maxNbChars = 5),
        "seccional" => $faker->text($maxNbChars = 5),
        
        "coordinador_zona" => $faker->text($maxNbChars = 15),
        "coordinador_demarcacion" => $faker->text($maxNbChars = 15),
        "distrito_politico" => $faker->text($maxNbChars = 10),
        "demarcacion_politico" => $faker->text($maxNbChars = 5),
        "seccional_politico" => $faker->text($maxNbChars = 5),
        "sepomex_id_politico" => $faker->numberBetween($min = 82634, $max = 84625),
    ];
});
