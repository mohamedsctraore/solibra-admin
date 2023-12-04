<?php

// app/Http/Controllers/CampagneController.php

namespace App\Http\Controllers;

use App\Models\Campagne;
use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;

use Yaza\LaravelGoogleDriveStorage\Gdrive;

use Filestack\FilestackClient;

use Twilio\Rest\Client as client2;

class CampagneController extends Controller
{

    private $drive;

    public function __construct(Gdrive $drive)
    {
        $this->drive = $drive;
    }

    public function index()
    {
        $campagnes = Campagne::all();
        return view('campagnes.index', compact('campagnes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('campagnes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'contenu' => 'required',
            'media' => 'required|mimes:jpeg,png,jpg,mp4,pdf|max:20480',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $file = $request->file('media');

        $client = new FilestackClient(env('FILESTACK_API_KEY'));
        $client->upload($file->getPathname());

        $contenu = substr($request->contenu, 3);
        $contenu = substr($contenu, 0, -4);

        $campagne = new Campagne();
        $campagne->nom = $request->nom;
        $campagne->contenu = $contenu;
        $campagne->categorie_id = $request->categorie_id;
        $campagne->statut = "EN_VALIDATION";
        $campagne->media = $file->getClientOriginalName() ." || ". $file->getPathname();
        $campagne->contentsid = '';

        $campagne->save();

        $this->sendValidationMessageWhatsapp($campagne->nom, 'whatsapp:+22508753594');

        return redirect()->route('campagnes.index')
            ->with('success', 'Campagne ajoutée avec succès.');
    }

    public function show(Campagne $campagne)
    {
        return view('campagnes.show', compact('campagne'));
    }

    public function edit(Request $request, $id = null)
    {
        $campagne = Campagne::where([['id', '=', $id]])->first();
        $categorie = Category::where([['id', '=', $campagne->categorie_id]])->first();
        $clients = Client::all();
        return view('campagnes.edit', compact('campagne', 'categorie', 'clients'));
    }

    public function update(Request $request, Campagne $campagne)
    {
        $request->validate([
            'nom' => 'required',
            'contenu' => 'required',
            'media' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $campagne->update($request->all());

        return redirect()->route('campagnes.index')
            ->with('success', 'Campagne mise à jour avec succès.');
    }

    public function destroy(Campagne $campagne)
    {
        $campagne->delete();

        return redirect()->route('campagnes.index')
            ->with('success', 'Campagne supprimée avec succès.');
    }

    public function sendValidationMessageWhatsapp($message) {
        $twilio = new client2(
            config('services.twilio.account_sid'),
            config('services.twilio.auth_token')
        );

        $twilio->messages
                  ->create("whatsapp:+22508753594",
                           [
                               "contentSid" => "HX66936b9a9e280d8274e0eafef06407d4",
                               "from" => "MG0722829ccf57235eaf12f8e3bdedcde5",
                               "contentVariables" => json_encode([
                                "1" => $message
                            ])
                           ]
                  );

    }

    public function send(Request $request) {
        $twilio = new client2(
            config('services.twilio.account_sid'),
            config('services.twilio.auth_token')
        );

        $campagne = $request->field1;
        $client = $request->field2;
        $campagne_id = $request->field3;

        $twilio->messages
                  ->create("whatsapp:".$client,
                           [
                               "contentSid" => $campagne,
                               "from" => "MG0722829ccf57235eaf12f8e3bdedcde5",
                           ]
                  );

        return redirect()->route('campagnes.edit', ['id' => $campagne_id])
            ->with('success', 'Message envoyé avec succès.');

    }
}

