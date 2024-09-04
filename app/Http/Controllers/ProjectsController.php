<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Equipaments;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::join('clients', 'projects.clientid', '=', 'clients.id')
            ->select('projects.*', 'clients.name', 'clients.uf')
            ->orderBy('projects.id', 'DESC')
            ->get();
        return view('Projects.home', ['projects' => $projects]);
    }

    public function newProject()
    {

        return view('Projects.new');
    }

    public function store(Request $request)
    {
        // Valida os dados do formulário
        $request->validate([
            'client' => 'required|string',
            'installation_type' => 'required|string',
            'equipment' => 'required|array',
            'quantity' => 'required|array',
        ]);

        // Encontra o cliente pelo nome
        $client = Clients::where('name', $request->input('client'))->first();

        if (!$client) {
            return back()->withErrors(['client' => 'Cliente não encontrado.']);
        }

        // Cria o projeto com o ID do cliente
        $project = Projects::create([
            'clientid' => $client->id,
            'instalationType' => $request->input('installation_type'),
        ]);

        // Salva os equipamentos e suas quantidades na tabela `equipaments`
        foreach ($request->input('equipment') as $equipament) {
            Equipaments::create([
                'project_id' => $project->id,
                'equipament' => $equipament,
                'quantity' => $request->input('quantity.' . $equipament, 1), // Definindo a quantidade padrão como 1
            ]);
        }

        return redirect()->route('homeProjects')->with('success', 'Projeto criado com sucesso!');
    }

    public function getProject($id)
    {

        $project = Projects::join('clients', 'projects.clientid', '=', 'clients.id')
            ->select(
                'projects.*',
                'clients.*',
                'projects.id as project_id',
                'clients.id as client_id'    
            )
            ->where('projects.id', $id)
            ->first();

        $equipaments = Equipaments::select()->where('project_id', $id)->get();

        return view('Projects.details', [
            'project' => $project,
            'equipaments' => $equipaments,
        ]);
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return redirect()->route('homeProjects')->with('success', 'Projeto excluído com sucesso!');
    }

    public function edit($id)
    {
        $project = Projects::join('clients', 'projects.clientid', '=', 'clients.id')
            ->select('projects.*', 'clients.*')
            ->where('projects.id', $id)
            ->first();
        $equipaments = Equipaments::where('project_id', $id)->get();

        return view('Projects.edit', [
            'project' => $project,
            'equipaments' => $equipaments,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Valida os dados do formulário
        $request->validate([
            'installation_type' => 'required|string',
        ]);

        // Encontra o projeto pelo ID
        $project = Projects::findOrFail($id);

        // Atualiza o tipo de instalação
        $project->instalationType = $request->input('installation_type');
        $project->save();

        // Remove os equipamentos antigos associados ao projeto
        Equipaments::where('project_id', $project->id)->delete();

        // Adiciona os novos equipamentos e suas quantidades na tabela `equipaments`
        foreach ($request->input('equipment') as $equipment) {
            // Verifica se o nome e a quantidade estão definidos
            if (!empty($equipment['name']) && !empty($equipment['quantity'])) {
                Equipaments::create([
                    'project_id' => $project->id,
                    'equipament' => $equipment['name'],
                    'quantity' => $equipment['quantity'],
                ]);
            }
        }

        return redirect()->route('homeProjects')->with('success', 'Projeto atualizado com sucesso!');
    }
}
