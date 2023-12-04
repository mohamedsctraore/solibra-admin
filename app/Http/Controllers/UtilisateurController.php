<?php

// dans le fichier UtilisateurController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('utilisateurs.index', compact('users'));
    }

    public function create()
    {
        return view('utilisateurs.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Création d'un nouvel utilisateur
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Mise à jour des données de l'utilisateur
        $utilisateur->update($request->all());

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(Utilisateur $utilisateur)
    {
        // Suppression de l'utilisateur
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}

