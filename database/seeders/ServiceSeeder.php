<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Lavagem Simples', 'default_price' => 60.00],
            ['name' => 'Lavagem Completa', 'default_price' => 100.00],
            ['name' => 'Higienização Interna', 'default_price' => 180.00],
            ['name' => 'Polimento Comercial', 'default_price' => 300.00],
            ['name' => 'Vitrificação de Pintura', 'default_price' => 800.00],
            ['name' => 'Hidratação de Couro', 'default_price' => 150.00],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['name' => $service['name']], $service);
        }
    }
}
