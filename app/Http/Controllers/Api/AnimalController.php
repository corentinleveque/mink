<?php
namespace App\Http\Controllers\Api;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnimalController extends Controller
{
    // Récupérer tous les animaux
    public function index()
    {
        $animals = Animal::all();
        return response()->json($animals);
    }

    // Récupérer un animal par ID
    public function show($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }

        return response()->json($animal);
    }

    // Créer un nouvel animal
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|int',
            'type' => 'required|string',
            'race' => 'required|string',
            'prixHt' => 'required|numeric',
            'description' => 'nullable|string',
            'isSaled' => 'required|int',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $animal = new Animal();
        $animal->name = $request['name'];
        $animal->age = $request['age'];
        $animal->race = $request['race'];
        $animal->prixHt = $request['prixHt'];
        $animal->description = $request['description'];
        $animal->isSaled = $request['isSaled'];

        // Gestion des images
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('animals', 'public'); // 'animals' est le dossier où l'image sera stockée
            $animal->image1 = $image1Path; // Enregistrer le chemin de l'image dans la base de données
        }

        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('animals', 'public');
            $animal->image2 = $image2Path;
        }

        $animal->save();

        return response()->json($animal, 201);  // 201 Created
    }

    // Mettre à jour un animal existant
    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }

        $request->validate([
            'name' => 'nullable|string|max:255',
            'type' => 'nullable|string',
            'race' => 'nullable|string',
            'prixHt' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        $animal->update($request->all());

        return response()->json($animal);
    }

    // Supprimer un animal
    public function destroy($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }

        $animal->delete();

        return response()->json(['message' => 'Animal deleted successfully']);
    }
}
