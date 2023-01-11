<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cadastrar_lead(Request $request)
    {
        try {
            Lead::create($request->all());
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => 'erro',
                'mensagem' => $e->getMessage()
            ));
        }
        return response()->json(
            array(
                'status' => 'sucesso',
                'mensagem' => 'Criado com sucesso!'
            )
        );
    }

    public function gerar_leads()
    {
        try {
            for ($i=0; $i < 5; $i++) {
                $cep = rand(0, 1);

                Lead::create(array(
                    "telefone" => "(54) 33333-3333",
                    "nome" => rand(0, 1) == "1" ? $this->random_name() : null,
                    "email" => rand(0, 1) == "1" ? $this->random_email() : null,
                    "cpf" => rand(0, 1) == "1" ? "888.888.888-88" : null,
                    "cep" => $cep == "1" ? "96050-500" : null,
                    "rua" => $cep == "1" ? "Teste" : null,
                    "numero" => $cep == "1" ? 123 : null,
                    "complemento" => null,
                    "bairro" => $cep == "1" ? "Fragata" : null,
                    "cidade" => $cep == "1" ? "Pelotas" : null,
                    "viabilidade" => rand(0, 1) == "1" ? rand(0, 2) : null,
                    "observacao" => null,
                ));
            }
        } catch (\Exception $e) {
            return response()->json(
                array(
                    'status' => 'erro',
                    'mensagem' => $e->getMessage()
                )
            );
        }
        return response()->json(
            array(
                'status' => 'sucesso',
                'mensagem' => 'Criado com sucesso!',
            )
        );
    }

    public function pegar_leads()
    {
        try {
            $leads = Lead::where('status', 4)->limit(5)->orderBy('id', 'desc')->get();
            foreach ($leads as $lead) {
                Lead::where('id', $lead->id)->delete();
            }
        } catch (\Exception $e) {
            return response()->json(
                array(
                    'status' => 'erro',
                    'mensagem' => $e->getMessage()
                )
            );
        }
        return response()->json(
            array(
                'status' => 'sucesso',
                'data' => $leads
            )
        );
    }

    protected function random_name() {
        $firstname = array(
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'Georgianna',
            'Leigha',
            'Alejandro',
            'Marquis',
            'Joan',
            'Stephania',
            'Elroy',
            'Zonia',
            'Buffy',
            'Sharie',
            'Blythe',
            'Gaylene',
            'Elida',
            'Randy',
            'Margarete',
            'Margarett',
            'Dion',
            'Tomi',
            'Arden',
            'Clora',
            'Laine',
            'Becki',
            'Margherita',
            'Bong',
            'Jeanice',
            'Qiana',
            'Lawanda',
            'Rebecka',
            'Maribel',
            'Tami',
            'Yuri',
            'Michele',
            'Rubi',
            'Larisa',
            'Lloyd',
            'Tyisha',
            'Samatha',
        );

        $lastname = array(
            'Mischke',
            'Serna',
            'Pingree',
            'Mcnaught',
            'Pepper',
            'Schildgen',
            'Mongold',
            'Wrona',
            'Geddes',
            'Lanz',
            'Fetzer',
            'Schroeder',
            'Block',
            'Mayoral',
            'Fleishman',
            'Roberie',
            'Latson',
            'Lupo',
            'Motsinger',
            'Drews',
            'Coby',
            'Redner',
            'Culton',
            'Howe',
            'Stoval',
            'Michaud',
            'Mote',
            'Menjivar',
            'Wiers',
            'Paris',
            'Grisby',
            'Noren',
            'Damron',
            'Kazmierczak',
            'Haslett',
            'Guillemette',
            'Buresh',
            'Center',
            'Kucera',
            'Catt',
            'Badon',
            'Grumbles',
            'Antes',
            'Byron',
            'Volkman',
            'Klemp',
            'Pekar',
            'Pecora',
            'Schewe',
            'Ramage',
        );

        $name = $firstname[rand ( 0 , count($firstname) -1)];
        $name .= ' ';
        $name .= $lastname[rand ( 0 , count($lastname) -1)];

        return $name;
    }

    protected function random_email()
    {
        $emails = [
            'te' . rand(0, 50000) . '@gmail.com',
            'bigfe' . rand(0, 50000) . '@gmail.com',
            'tempo10' . rand(0, 50000) . '@gmail.com',
            'ilhaDg' . rand(0, 50000) . '@hotmail.com',
            'ilhaDg' . rand(0, 50000) . '@hotmail.com',
        ];

        return $emails[rand(0, count($emails) - 1)];
    }
}
