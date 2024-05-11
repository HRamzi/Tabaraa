<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preload" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="/fonts/icomoon4.woff2" type="font/woff2" crossorigin>
<<<<<<< HEAD
    <script src="{{ asset('assets\js\App.js') }}"></script>
    <script src="{{ asset('assets\js\pusher.js') }}"></script>
    <script src="{{ asset('assets\js\jQuery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/message-style.css') }}" />
    <link rel="icon" href="{{ asset('assets\images\logoT.png') }}">
    <title>Messages</title>
    <style>
        /* Ajout de styles CSS pour la mise en page */
        .chat {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Pour aligner les éléments sur les côtés */
            padding: 10px;
        }

        .top img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
        }

        .message {
            display: flex;
            margin-bottom: 10px;
        }

        .message img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .message-content {
            max-width: 70%;
            background-color: #f1f0f0;
            padding: 10px;
            border-radius: 10px;
        }

        .message.right .message-content {
            background-color: #dcf8c6; /* couleur de fond pour les messages de l'utilisateur actuel */
        }

        .bottom {
            padding: 10px;
        }

        form {
            display: flex;
        }

        input[type="text"] {
            flex: 1;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 7px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Style pour le bouton de retour */
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
=======
    <scrip src="{{ asset('assets\js\App.js') }}">
        </script>
        <script src="{{ asset('assets\js\pusher.js') }}"></script>
        <script src="{{ asset('assets\js\jQuery.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/message-style.css') }}" />
        <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
        <title>Messages</title>
>>>>>>> bbe768e2ec596c1cbb6580afc78ab6d68c0c2b44
</head>

<body>
    <div class="chat">

        <div class="top">
            @php
            $utilisateur = auth()->user();
            @endphp
            <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" width="50px" height="50px" alt="Avatar">
            <div class="user-info">
                <p>{{ $utilisateur->Nom_Complet }}</p>
                <p>connecté</p>
            </div>
        </div>

        <div class="messages">
            @foreach($messages as $message)
            <div class="message {{ $message->id_expediteur === Auth::id() ? 'right' : 'left' }}">
                <img src="{{ asset('storage/' . $message->utilisateur->photo_profile) }}" width="50px" height="50px" alt="Avatar">
                <div class="message-content">
                    <p><strong>{{ $message->utilisateur->Nom_Complet }}</strong>: {{ $message->contenu }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="bottom">
            <form id="message-form">
                @csrf
                <input type="hidden" id="id_expediteur" name="id_expediteur" value="{{ Auth::id() }}">
                <input type="hidden" id="id_destinataire" name="id_destinataire" value="2"> <!-- Champ id_destinataire avec valeur par défaut -->
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button id="send-button" type="button"></button>
            </form>
        </div>
    </div>

    <!-- Bouton de retour -->
    <button class="back-button" onclick="window.history.back()">Retour</button>

    <script>
        //Broadcast messages
        document.getElementById("send-button").addEventListener("click", function(event) {
            event.preventDefault();

            // Récupérer les données du formulaire
            var formData = new FormData(document.getElementById("message-form"));

            // Envoyer une requête AJAX
            fetch("/broadcast", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}' // Ajout du jeton CSRF
                }
            })
            .then(response => response.json())
            .then(data => {
                // Afficher le nouveau message dans la discussion
                var messageHtml = `
                    <div class="message right">
                        <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" width="50px" height="50px" alt="Avatar">
                        <div class="message-content">
                            <p><strong>{{ $utilisateur->Nom_Complet }}</strong>: ${data.message.contenu}</p>
                        </div>
                    </div>`;
                document.querySelector(".messages").insertAdjacentHTML("beforeend", messageHtml);
                // Faites défiler vers le bas pour afficher le nouveau message
                document.querySelector('.messages').scrollTop = document.querySelector('.messages').scrollHeight;
            })
            .catch(error => console.error('Error:', error));
        });

        // Activer le clic du bouton Send lorsque la touche Entrée est pressée dans le champ de message
        document.getElementById("message").addEventListener("keypress", function(event) {
            if (event.which == 13) {
                event.preventDefault();
                document.getElementById("send-button").click();
            }
        });
    </script>
</body>

</html>
