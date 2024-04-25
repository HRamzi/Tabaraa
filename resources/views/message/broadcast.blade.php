<div class="right message">
  <p>{{$message}}</p>
  @if(Auth::check())
  @php
    $utilisateur = auth()->user();
  @endphp
    <img src="{{ asset('storage/' . $utilisateur->photo_profile) }}" width="180px" height="180px" alt="Avatar">
  @endif
</div>