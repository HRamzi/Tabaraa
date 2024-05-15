<?php

namespace App\Http\Controllers;
use App\Models\Notification; // N'oubliez pas d'importer la classe Notification
use Illuminate\Support\Facades\Auth; // Importer la classe Auth

class NotificationController extends Controller
{
    public function getNotifications()
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();
        
        // Si l'utilisateur est authentifié, récupérer ses notifications
        if ($user) {
            // Récupérer les notifications de l'utilisateur avec les relations
            $notifications = Notification::whereHas('annonce', function ($query) use ($user) {
                $query->where('id_utilisateur', $user->id);
            })->with('user', 'annonce')->get();
        } else {
            // Si l'utilisateur n'est pas authentifié, renvoyer un tableau vide
            $notifications = [];
        }

        // Retourner les notifications au format JSON
        return $notifications;
    }

    public function getNotificationCount()
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();
        
        // Si l'utilisateur est authentifié, compter ses notifications non lues
        if ($user) {
            // Récupérer le nombre de notifications non lues de l'utilisateur
            $count = Notification::whereHas('annonce', function ($query) use ($user) {
                $query->where('id_utilisateur', $user->id);
            })->where('read', false)->count();
        } else {
            // Si l'utilisateur n'est pas authentifié, retourner 0
            $count = 0;
        }

        // Retourner le nombre de notifications au format JSON
        return response()->json(['count' => $count]);
    }

    public function showNotificationsView()
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Si l'utilisateur est authentifié, récupérer ses notifications
        if ($user) {
            // Récupérer les notifications de l'utilisateur
            $notifications = Notification::whereHas('annonce', function ($query) use ($user) {
                $query->where('id_utilisateur', $user->id);
            })->get();
        } else {
            // Si l'utilisateur n'est pas authentifié, renvoyer un tableau vide
            $notifications = [];
        }
        
        // Charger la vue avec les notifications
        return view('notification', ['notifications' => $notifications]);
    }
}
