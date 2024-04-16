<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['motivoContato' => 'Dúvida']);
        MotivoContato::create(['motivoContato' => 'Elogio']);
        MotivoContato::create(['motivoContato' => 'Reclamação']);
    }
}
