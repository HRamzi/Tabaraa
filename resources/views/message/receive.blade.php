<div class="left message">
  @if(Auth::check())
  @php
    $utilisateur = auth()->user();
  @endphp
  <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" width="150px" height="150px" alt="Avatar">
  @endif
  <p>{{$message}}</p>
</div>