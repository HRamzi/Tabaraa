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
        $messages = Message::all();
        return view('message.index', compact('messages'));
    }

public function markAllMessagesAsRead(Request $request)
{
    try {
        // Mettre à jour tous les messages comme lus
        Message::query()->update(['read' => true]);

        // Rediriger vers la route des messages
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Gérer l'erreur
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}

    public function broadcast(Request $request)
{
    // Créer un nouveau message
    $message = new Message();

    // Récupérer les données du formulaire
    $message->id_expediteur = $request->id_expediteur;
    $message->id_destinataire = $request->id_destinataire; // Ajout de id_destinataire
    $message->contenu = $request->message;
    $message->read = false; // Marquer le message comme non lu

    // Enregistrer le message dans la base de données
    $message->save();

    // Retourner le message
    return response()->json(['message' => $message]);
}


   public function receive(Request $request)
{
    return view('message.receive', ['message' => $request->get('message')]);
}


public function getUnreadMessageCount() {
    if (Auth::check()) {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = Auth::id();

        // Récupérer le nombre total de messages pour cet utilisateur
        $totalCount = Message::where('recipient_id', $userId)->count();

        return response()->json(['count' => $totalCount]);
    }
    // Si l'utilisateur n'est pas connecté, retourner un compte de message de 0
    return response()->json(['count' => 0]);
}

public function getMessageCount() {
    // Récupérer le nombre total de messages dans la base de données
    $totalCount = Message::count();

    return response()->json(['count' => $totalCount]);
}


   
}
