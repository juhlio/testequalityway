<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Rules\CpfOuCnpj;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {

        $clientes = Clients::select()
            ->orderByRaw('id DESC')
            ->get();
        return view('Clients.home', ['clientes' => $clientes]);
    }

    public function newClient()
    {
        return view('Clients.new');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:clients,email',
                'phone' => 'required|string|max:20',
                'doc' => ['required', new CpfOuCnpj],
                'uf' => 'required|string|size:2|in:AC,AL,AP,AM,BA,CE,DF,ES,GO,MA,MT,MS,MG,PA,PB,PR,PE,PI,RJ,RN,RS,RO,RR,SC,SP,SE,TO',
            ]);

            $client = new Clients();
            $client->name = $validatedData['name'];
            $client->email = $validatedData['email'];
            $client->phone = $validatedData['phone'];
            $client->doc = $validatedData['doc'];
            $client->uf = $validatedData['uf'];
            $client->save();

            return redirect()->route('homeClients')->with('success', 'Cliente cadastrado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getClient($id){
        $client = Clients::find($id);

        return view('Clients.details', ['client' => $client]);

    }


    public function destroy($id)
    {
        $client = Clients::findOrFail($id);
        $client->delete();

        return redirect()->route('homeClients')->with('success', 'Cliente excluído com sucesso.');
    }

    public function edit($id)
    {
        $client = Clients::findOrFail($id);
        return view('Clients.edit', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'doc' => 'required|string|max:18',
            'uf' => 'required|string|size:2',
        ]);

        $client = Clients::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('homeClients')->with('success', 'Cliente atualizado com sucesso.');
    }


    public function getApiClients(){
        $clientes = Clients::select()
            ->orderByRaw('id DESC')
            ->get();

             // Array para armazenar todas as respostas
        $allClients = [];

        foreach ($clientes as $answer) {
            // Converte cada resposta para array e adiciona ao array principal
            $allAnswers[] = $answer->toArray();
        }

        // Converte o array de respostas para JSON
        $jsonAnswers = json_encode($allAnswers);

        // Imprime o JSON na tela
        echo $jsonAnswers;

    }
}
