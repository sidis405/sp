<header>
      <div class="container">
        <div class="l-header">
          @if(@$currentUser)
              
          <a class="btn btn-primary" href="/dashboard">
              @if(strlen($currentUser->avatar) >2)<span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
            <span class="profile-label">{{$currentUser->name}}</span></a>
          @else
          <a class="btn btn-primary" href="/auth/login">Accedi</a><a class="btn btn-primary" href="/auth/register">Registrati</a>
          @endif
          <div class="search-container">
            <form role="search" class="navbar-form">
              <div class="form-group">
                <input type="text" placeholder="Cerca nel sito..." class="form-control">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="logo-container">
            <h1 class="logo">Sito Pubblico</h1>
          </div>
          <ul class="nav nav-pills nav-justified">
            <li><a href="/news">Home</a></li>
            <li><a href="/categorie/controinformazione">Controinformazione</a></li>
            <li><a href="/categorie/politica">Politica</a></li>
            <li><a href="/categorie/salute">Salute</a></li>
            <li><a href="/categorie/alimentazione">Alimentazione</a></li>
            <li><a href="/categorie/expat">Expat</a></li>
            <li><a href="/categorie/cronaca">Cronaca</a></li>
            <li><a href="/categorie/economia">Economia</a></li>
            <li><a href="/categorie/societa">Società</a></li>
            <li><a href="/categorie/altro">Altro</a></li>
          </ul>
        </div>
      </div>
    </header>