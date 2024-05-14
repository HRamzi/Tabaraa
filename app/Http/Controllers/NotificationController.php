<?php

namespace App\Http\Controllers;
use App\Models\Notification; // N'oubliez pas d'importer la classe Notification

class NotificationController extends Controller
{
    public function getNotifications()
    {
        // Récupérer les notifications avec les relations
        $notifications = Notification::with('user', 'annonce')->get();

        // Retourner les notifications au format JSON
        return $notifications;
    }

    public function getNotificationCount()
    {
        // Récupérer le nombre de notifications non lues
        $count = Notification::where('read', false)->count();

        // Retourner le nombre de notifications au format JSON
        return response()->json(['count' => $count]);
    }

    public function showNotificationsView()
    {
        // Récupérer les notifications
        $notifications = Notification::all();
        
        // Charger la vue avec les notifications
        return view('notification', ['notifications' => $notifications]);
    }
}