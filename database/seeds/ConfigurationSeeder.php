<?php

use App\Models\Configurations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //se trunca la tabla
        Configurations::truncate();
        $configurations = [
            ["key" => "Color del sistema", "alias" => "color_system", "value" => "#2c304d", "type" => "color", "required" => "1", "visible" => "1", "text_lenght" => "0"],
            ["key" => "Imagen de fondo", "alias" => "img_system", "value" => asset('assets/img/logo.png'), "type" => "file", "required" => "1", "visible" => "1", "text_lenght" => "0"],
            ["key" => "Nombre del sistema", "alias" => "name_system", "value" => "Nombre del sistema", "type" => "text", "required" => "1", "visible" => "1", "text_lenght" => "0"],
            ["key" => "Logo del sistema", "alias" => "logo_system", "value" => asset('assets/img/logo.png'), "type" => "file", "required" => "1", "visible" => "1", "text_lenght" => "0"],
        ];

        foreach ($configurations as $configuration) {
            Configurations::create([
                'key' => $configuration['key'],
                'alias' => $configuration['alias'],
                'value' => $configuration['value'],
                'type' => $configuration['type'],
                'required' => $configuration['required'],
                'visible' => $configuration['visible'],
                'text_lenght' => $configuration['text_lenght'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
