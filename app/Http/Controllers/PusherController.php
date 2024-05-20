<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use App\Models\Annonce;
use App\Models\Message;
   use Illuminate\Support\Facades\DB;
class PusherController extends Controller
{
    public function MessageIndex()
    {
        // Load messages with associated users and announcements
        $messages = Message::with(['utilisateur', 'annonce'])->get();
        return view('message.index', compact('messages'));
    }

 

public function getReceivedMessages()
{
    $userId = Auth::id();

    // Récupérer tous les messages envoyés à l'utilisateur actuel où l'utilisateur a créé l'annonce associée
    $receivedMessages = Message::where('id_destinataire', $userId)
                               ->whereHas('annonce', function($query) use ($userId) {
                                   $query->where('id_utilisateur', $userId);
                               })
                               ->with(['utilisateur', 'destinataire', 'annonce']);

    // Récupérer les messages où l'expéditeur est l'utilisateur connecté, is_reply est égal à 1, et l'utilisateur a créé l'annonce associée
    $repliedMessages = Message::where('id_expediteur', $userId)
                               ->where('is_reply', 1)
                               ->whereHas('annonce', function($query) use ($userId) {
                                   $query->where('id_utilisateur', $userId);
                               })
                               ->with(['utilisateur', 'destinataire', 'annonce']);

    // Combiner les résultats des deux requêtes
    $allMessages = $receivedMessages->union($repliedMessages)->get();

    return response()->json(['messages' => $allMessages]);
}



 public function getSentMessages()
{
    $userId = Auth::id();

    // Récupérer tous les messages envoyés par l'utilisateur actuel qui ne sont pas des réponses
    // et où l'utilisateur n'a pas créé l'annonce associée
    $sentMessages = Message::where('id_expediteur', $userId)
                           ->where('is_reply', 0)
                           ->whereHas('annonce', function($query) use ($userId) {
                               $query->where('id_utilisateur', '!=', $userId);
                           })
                           ->with(['utilisateur', 'destinataire', 'annonce']);

    // Récupérer les messages où l'utilisateur est le destinataire et is_reply est 1
    // et où l'utilisateur n'a pas créé l'annonce associée
    $repliedToMessages = Message::where('id_destinataire', $userId)
                                ->where('is_reply', 1)
                                ->whereHas('annonce', function($query) use ($userId) {
                                   $query->where('id_utilisateur', '!=', $userId);
                                })
                                ->with(['utilisateur', 'destinataire', 'annonce']);

    // Récupérer les messages où l'utilisateur est l'expéditeur, is_reply est 1
    // et où l'utilisateur n'a pas créé l'annonce associée
    $repliedMessages = Message::where('id_expediteur', $userId)
                              ->where('is_reply', 1)
                              ->whereHas('annonce', function($query) use ($userId) {
                                  $query->where('id_utilisateur', '!=', $userId);
                              })
                              ->with(['utilisateur', 'destinataire', 'annonce']);

    // Combiner les résultats des trois requêtes
    $allSentMessages = $sentMessages->union($repliedToMessages)->union($repliedMessages)->get();

    return response()->json(['messages' => $allSentMessages]);
}





    public function markAllMessagesAsRead(Request $request)
    {
        try {
            // Mettre à jour tous les messages comme lus
            Message::query()->update(['read' => true]);

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
    $message->id_expediteur = auth()->id(); // Utilisateur connecté
    $message->id_destinataire = $request->id_destinataire;
    $message->id_annonce = $request->id_annonce; // Récupérer l'ID de l'annonce
    $message->contenu = $request->message;
    $message->read = false; // Marquer le message comme non lu
    $message->is_reply = true; // Marquer le message comme réponse

    // Enregistrer le message dans la base de données
    $message->save();

    // Charger les détails du destinataire
    $destinataire = Utilisateur::find($message->id_destinataire);

    return response()->json([
        'message' => $message,
        'destinataire' => $destinataire->Nom_Complet
    ]);
}


    public function receive(Request $request)
    {
        return view('message.receive', ['message' => $request->get('message')]);
    }

    public function getUnreadMessageCount()
    {
        if (Auth::check()) {
            // Récupérer l'ID de l'utilisateur connecté
            $userId = Auth::id();

            // Récupérer le nombre total de messages pour cet utilisateur
            $totalCount = Message::where('id_destinataire', $userId)->where('read', false)->count();

            return response()->json(['count' => $totalCount]);
        }
        // Si l'utilisateur n'est pas connecté, retourner un compte de message de 0
        return response()->json(['count' => 0]);
    }

    public function getMessageCount()
{
    // Récupérer l'ID de l'utilisateur connecté
    $userId = Auth::id();

    // Compter le nombre de messages où l'utilisateur est le destinataire
    $messageCount = Message::where('id_destinataire', $userId)->count();

    return response()->json(['count' => $messageCount]);
}

}
