<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preload" as="font" href="/fonts/fontawesome-webfont.woff2?v=4.7.0" type="font/woff2" crossorigin>
    <link rel="preload" as="font" href="/fonts/icomoon4.woff2" type="font/woff2" crossorigin>
    <scrip src="{{ asset('assets\js\App.js') }}">
        </script>
        <script src="{{ asset('assets\js\pusher.js') }}"></script>
        <script src="{{ asset('assets\js\jQuery.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/message-style.css') }}" />
        <link rel="icon" href="{{ asset('assets\images\logoT.svg') }}">
        <title>Messages</title>
</head>

<body>
    <div class="chat">

        <!-- Header -->
        <div class="top">
            @php
            $utilisateur = auth()->user();
            @endphp
            <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" width="180px" height="180px" alt="Avatar">
            <div>
                <p>{{ $utilisateur->Nom_Complet }}</p>
                @if(session()->has('id_utilisateur'))
                <p>connecté</p>
                @else
                <p>déconnecté</p>
                @endif
            </div>
        </div>
        <!-- End Header -->

        <!-- Chat -->
        <div class="messages">
            @foreach($messages as $message)
            <div class="left message">
                @if(Auth::check())
                @php
                $utilisateur = auth()->user();
                @endphp
                <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" width="150px" height="150px" alt="Avatar">
                @endif
                <p>{{ $message->contenu }}</p>
            </div>
            @endforeach
        </div>
        <!-- End Chat -->

        <!-- Footer -->
        <div class="bottom">
            <form>
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button type="submit"></button>
            </form>
        </div>
        <!-- End Footer -->

    </div>
</body>

<script>
    const pusher = new Pusher('{{config('
        broadcasting.connections.pusher.key ')}}', {
            cluster: 'eu'
        });
    const channel = pusher.subscribe('public');

    //Receive messages
    channel.bind('chat', function(data) {
        $.post("/receive", {
                _token: '{{csrf_token()}}',
                message: data.message,
            })
            .done(function(res) {
                $(".messages").append(res); // Change ici pour ajouter le nouveau message à la fin
                $(document).scrollTop($(document).height());
            });
    });

    //Broadcast messages
    $("form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "/broadcast",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{csrf_token()}}',
                message: $("form #message").val(),
            }
        }).done(function(res) {
            $(".messages").append(res); // Change ici pour ajouter le nouveau message à la fin
            $("form #message").val('');
            $(document).scrollTop($(document).height());
        });
    });
</script>

</html>