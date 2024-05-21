<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chat {
            display: flex;
            flex-direction: column;
            height: 100vh;
            width: 100vw;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            background-color: #0078FF;
            color: white;
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
            padding: 20px;
            background-color: #f9f9f9;
        }

        .message {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .message.right {
            justify-content: flex-end;
        }

        .message-content {
            display: flex;
            flex-direction: column;
            max-width: 60%;
            padding: 10px 15px;
            border-radius: 20px;
            position: relative;
        }

        .message.left .message-content {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }

        .message.right .message-content {
            background-color: #dcf8c6;
        }

        .message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .message.right img {
            margin-right: 0;
            margin-left: 10px;
        }

        .message-annonce {
            font-size: 0.85em;
            color: #888;
            margin-top: 5px;
        }

        .reply-button {
            display: none;
            background-color: #0078FF;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5px;
        }

        .reply-form {
            display: none;
            flex-direction: column;
            margin-top: 10px;
        }

        .reply-form input[type="text"] {
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
            width: calc(100% - 20px);
        }

        .reply-form button {
            background-color: #0078FF;
            color: white;
            border: none;
            padding: 7px 15px;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .back-button,
        .btn {
            background-color: #0078FF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn.blue {
            background-color: #2196F3;
        }

        .btn.lg {
            padding: 12px 24px;
            font-size: 16px;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
            background-color: #e0e0e0;
        }

        .filter-button {
            background-color: #0078FF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-button.other {
            background-color: #FF5722;
        }
        /* Style de la boîte de dialogue modale */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

    </style>
</head>

<body data-user-id="{{ Auth::id() }}">
<!-- Boîte de dialogue modale de bienvenue -->
<div id="welcomeModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Bienvenue sur notre application de chat ! .</p>
    <!-- Ajoutez vos instructions ici -->
  
  </div>
</div>

    <div class="chat">
        <div class="top">
            @php
            $utilisateur = auth()->user();
            @endphp
            <img src="{{ asset('storage/' . ($utilisateur->photo_profile ?? 'default-avatar.png')) }}" width="50px" height="50px" alt="Avatar">
            <div class="user-info">
                <p>{{ $utilisateur->Nom_Complet }}</p>
                <p>connecté</p>
            </div>
            <div class="action-buttons">
                <button type="button" class="btn blue lg submit-contact" onclick="getReceivedMessages()">Demandes par message</button>
                <button type="button" class="btn blue lg submit-contact" onclick="getSentMessages()">Messages envoyés</button>
            </div>
        </div>
        <div id="filter-buttons-container" class="filter-buttons"></div>
        <div class="messages"></div>
    </div>

    <script>
        function getReceivedMessages() {
            fetch("/get-received-messages", {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                displayMessages(data.messages, true, false);
            });
        }

        function getSentMessages() {
            fetch("/get-sent-messages", {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                displayFilterButtons(data.messages);
                displayMessages(data.messages, false, true);
            });
        }

function displayMessages(messages, showAnnonce, showFilterButtons) {
    // Trier les messages par date et heure
    messages.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

    let messagesContainer = document.querySelector('.messages');
    messagesContainer.innerHTML = ''; // Clear existing messages

    messages.forEach(message => {
        if (!message.utilisateur) return; // Skip if utilisateur is undefined

        let messageElement = document.createElement('div');
        messageElement.classList.add('message', message.id_expediteur === {{ Auth::id() }} ? 'right' : 'left');
        messageElement.setAttribute('data-id', message.id);

        let userPhoto = message.utilisateur.photo_profile ? `/storage/${message.utilisateur.photo_profile}` : 'default-avatar.png'; // Fallback to default avatar if photo_profile is missing

        let messageAnnonce = '';
        if (showAnnonce && message.id_annonce) {
            if (message.id_expediteur === {{ Auth::id() }}) {
                messageAnnonce = `Vous avez répondu à : ${message.destinataire ? message.destinataire.Nom_Complet : 'N/A'}`;
            } else {
                messageAnnonce = `Envoyé depuis annonce : ${message.annonce ? message.annonce.titre : 'N/A'}`;
            }
        }

        messageElement.innerHTML = `
            <img src="${userPhoto}" width="50px" height="50px" alt="Avatar">
            <div class="message-content">
                <p><strong>${message.utilisateur.Nom_Complet}</strong>: ${message.contenu}</p>
                ${messageAnnonce ? `<p class="message-annonce">${messageAnnonce}</p>` : ''}
            </div>
            <button class="reply-button">Répondre</button>
            <div class="reply-form">
                <input type="text" class="reply-message" placeholder="Écrire une réponse...">
                <button class="send-reply-button" data-destinataire="${message.id_expediteur}" data-annonce="${message.id_annonce}" data-nom-utilisateur="${message.utilisateur.Nom_Complet}">Envoyer</button>
            </div>
        `;

        messageElement.addEventListener('click', () => {
            let replyButton = messageElement.querySelector('.reply-button');
            replyButton.style.display = replyButton.style.display === 'none' || replyButton.style.display === '' ? 'block' : 'none';
        });

        messageElement.querySelector('.reply-button').addEventListener('click', function (event) {
            event.stopPropagation();
            let replyForm = messageElement.querySelector('.reply-form');
            replyForm.style.display = replyForm.style.display === 'none' || replyForm.style.display === '' ? 'flex' : 'none';
        });

        messageElement.querySelector('.send-reply-button').addEventListener('click', function (event) {
            event.stopPropagation();
            let form = messageElement.querySelector('.reply-form');
            let replyMessage = form.querySelector('.reply-message').value;
            let idDestinataire = this.getAttribute('data-destinataire');
            let idAnnonce = this.getAttribute('data-annonce');
            let nomUtilisateur = this.getAttribute('data-nom-utilisateur'); // Get the user's full name from the attribute

            if (replyMessage) {
                sendReply(replyMessage, idDestinataire, idAnnonce, nomUtilisateur, messageElement);
            }
        });

        messagesContainer.appendChild(messageElement);
    });

    // Hide filter buttons container if not needed
    let filterButtonsContainer = document.getElementById('filter-buttons-container');
    filterButtonsContainer.style.display = showFilterButtons ? 'flex' : 'none';
}

    function sendReply(contenu, idDestinataire, idAnnonce, nomUtilisateur, messageElement) {
        let formData = new FormData();
        formData.append('id_expediteur', '{{ Auth::id() }}');
        formData.append('id_destinataire', idDestinataire);
        formData.append('id_annonce', idAnnonce);
        formData.append('message', contenu);
        formData.append('is_reply', true);

        // Récupérer le nom complet de l'utilisateur connecté
        nomUtilisateur = document.querySelector('.user-info p:first-child').textContent;

        fetch("/broadcast", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message && messageElement && messageElement.parentNode) {
                let replyElement = document.createElement('div');
                replyElement.classList.add('message', 'right');

                // Afficher le nom complet de l'utilisateur connecté
                replyElement.innerHTML = `
                    <div class="message-content">
                        <p><strong>${nomUtilisateur}</strong>: ${data.message.contenu}</p>
                    </div>
                `;

                if (messageElement.nextSibling) {
                    messageElement.parentNode.insertBefore(replyElement, messageElement.nextSibling);
                } else {
                    messageElement.parentNode.appendChild(replyElement);
                }

                let replyForm = messageElement.querySelector('.reply-form');
                replyForm.style.display = 'none';
                replyForm.querySelector('.reply-message').value = '';
            }
        });
    }

    function displayFilterButtons(messages) {
        let filterButtonsContainer = document.getElementById('filter-buttons-container');
        filterButtonsContainer.innerHTML = ''; // Clear existing buttons

        let annonces = messages.map(m => m.annonce).filter(a => a);
        let uniqueAnnonces = Array.from(new Set(annonces.map(a => a.titre))).map(titre => annonces.find(a => a.titre === titre));

        uniqueAnnonces.forEach(annonce => {
            let button = document.createElement('button');
            button.classList.add('filter-button');
            button.innerText = annonce.titre;
            button.onclick = () => {
                let filteredMessages = messages.filter(m => m.id_annonce === annonce.id);
                displayMessages(filteredMessages, false, true); // Show filter buttons
            };
            filterButtonsContainer.appendChild(button);
        });

        let otherButton = document.createElement('button');
        otherButton.classList.add('filter-button', 'other');
        otherButton.innerText = 'Other';
        otherButton.onclick = () => {
            let otherMessages = messages.filter(m => m.id_annonce === null);
            displayMessages(otherMessages, false, true); // Show filter buttons
        };
        filterButtonsContainer.appendChild(otherButton);
    }
</script>
    <script>
        // Afficher la boîte de dialogue modale au chargement de la page
        window.onload = function () {
            var modal = document.getElementById('welcomeModal');
            modal.style.display = "block";
        };

        // Fermer la boîte de dialogue modale lorsqu'on clique sur le bouton de fermeture
        var closeBtn = document.getElementsByClassName("close")[0];
        closeBtn.onclick = function () {
            var modal = document.getElementById('welcomeModal');
            modal.style.display = "none";
        };

        // Fermer la boîte de dialogue modale si l'utilisateur clique en dehors de celle-ci
        window.onclick = function (event) {
            var modal = document.getElementById('welcomeModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
        // Afficher la boîte de dialogue modale au chargement de la page
window.onload = function () {
    var modal = document.getElementById('welcomeModal');
    modal.style.display = "block";
};

// Fermer la boîte de dialogue modale lorsqu'on clique sur le bouton de fermeture
var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function () {
    var modal = document.getElementById('welcomeModal');
    modal.style.display = "none";
};

// Fermer la boîte de dialogue modale si l'utilisateur clique en dehors de celle-ci
window.onclick = function (event) {
    var modal = document.getElementById('welcomeModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

    </script>

</body>

</html>

