<nav class="navbar">
    <a href="/" class="navbar-logo">Magnan Immo</a>
    <ul class="navbar-links">
      <li><a href="/allpropertiesforsale">🏘️ Tous les biens en Vente</a></li>
      <li><a href="/allpropertiesforrent">🏷️ Tous les biens en Location</a></li>
      <li><a href="/allhouses">🏡 Tous les Maisons</a></li>
      <li><a href="/allappartments">🏢 Tous les Appartements</a></li>
      <li><a href="/allstudios">🏨 Tous les Studios</a></li>
      <li><a href="/allvillas">🏕️ Tous les Villas</a></li>
      <li><a href="/allparkings">🅿️ Tous les Parkings</a></li>
      <li>
        @auth
          <a href="/getaddanad">
            <button class="button button-login">➕ Créer une annonce</button>
          </a>
          <a href="/myads">
            <button class="button button-create-account">🗺️ Vos annonces</button>
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" role="button" class="button button-logout">🚪🚶 Se déconnecter</button>
          </form>
          @else
            <a href="/login">
              <button class="button button-login">Se connecter</button>
            </a>
            <a href="/register">
              <button class="button button-create-account">Créer un compte</button>
            </a>
        @endauth
      </li>
    </ul>
  </nav>
  <br>
  <br>
  <br>