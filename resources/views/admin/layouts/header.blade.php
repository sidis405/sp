<header>
      <div class="container">
        <div class="l-header">
         <div class="btns-container">
          @if(@$currentUser && $currentUser->role !== 'admin')

          @include('layouts.header_user')              

          @elseif(@$currentUser && $currentUser->role == 'admin')
              
            @include('admin.layouts.header_admin')
          
          @else
          <a class="btn btn-primary" href="/auth/login">Accedi</a><a class="btn btn-primary" href="/auth/register">Registrati</a>
          @endif
        </div>

      

          
          <div class="search-container">
            <form role="search" class="navbar-form" action="/ricerca" method="GET">
              <div class="form-group">
                <input type="text" name="q" placeholder="Cerca nel sito..." class="form-control">
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