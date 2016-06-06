<header>
      <div class="container">
        <div class="l-header">
         <div class="btns-container">
          @if(@$currentUser && $currentUser->role !== 'admin')
              

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             @if(strlen($currentUser->avatar) >2)<span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
                         <span class="profile-label">{{$currentUser->name}}</span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="{{\Auth::user()->present()->user_url()}}">Il Mio Profilo</a></li>
              <li><a href="/dashboard">Dashboard</a></li>
              <li><a href="/impostazioni">Impostazioni</a></li>
              <li><a href="/dashboard/articoli/scrivi">Scrivi Un Articolo</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Esci</a></li>
            </ul>
          </div>
          @elseif(@$currentUser && $currentUser->role == 'admin')
              

          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             @if(strlen($currentUser->avatar) >2)<span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
                         <span class="profile-label">{{$currentUser->name}}</span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="/admin">Admin Dashboard</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Esci</a></li>
            </ul>
          </div>
          @else
          <a class="btn btn-primary" href="/auth/login">Accedi</a><a class="btn btn-primary" href="/auth/register">Registrati</a>
          @endif
        </div>

      

          
          <div class="search-container">
            <form role="search" class="navbar-form">
              <div class="form-group">
                <input type="text" placeholder="Cerca nel sito..." class="form-control">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="logo-container">
            <a href="/"><h1 class="logo">Sito Pubblico</h1></a>
          </div>
          <ul class="nav nav-pills nav-justified">
            <li><a href="/">Home</a></li>
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