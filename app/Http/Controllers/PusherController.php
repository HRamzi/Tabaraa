<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Utilisateur;
use App\Models\Annonce;
use App\Models\Message;

class PusherController extends Controller
{
    public function MessageIndex()
    {
        return view('message.index');
    }

    public function broadcast(Request $request)
{
    if (Auth::check()) {
        // Récupérer l'ID de l'émetteur à partir de la session
        $id_expediteur = Session::get('id_expediteur');

        // Récupérer les données du message depuis la requête HTTP
        $messageContent = $request->input('message');

        // Récupérer l'ID de l'annonce à partir de la requête
        $annonceId = $request->input('id');

        // Récupérer l'annonce correspondante à partir de l'ID
        $annonce = Annonce::findOrFail($annonceId);

        // Récupérer l'ID du destinataire à partir de l'annonce
        $id_destinataire = $annonce->id_utilisateur;

        // Enregistrer le message dans la base de données
        $message = new Message();
        $message->content = $messageContent;
        $message->id_expediteur = $id_expediteur;
        $message->recipient_id = $id_destinataire;
        $message->save();

        // Diffuser le message via Pusher
        broadcast(new PusherBroadcast($messageContent))->toOthers();

        // Retourner la vue de diffusion
        return view('message.broadcast', ['message' => $messageContent]);
    } else {
        return redirect('afficherFormulaireConnexion')->with('error', 'Vous devez être connecté pour envoyer un message.');
    }
}

    public function receive(Request $request)
    {
        return view('message.receive', ['message' => $request->get('message')]);
    }
}
