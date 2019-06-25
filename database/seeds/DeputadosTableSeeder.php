<?php

use Illuminate\Database\Seeder;
use App\Deputado;

class DeputadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json');
        $deputados = json_decode($json);
        
        foreach($deputados as $deputado){
            Deputado::create($deputado);    
        }
        
    }
}
