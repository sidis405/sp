<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             @if(strlen($currentUser->avatar) >2)<span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
                         <span class="profile-label">{{$currentUser->name}}</span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="/admin">Admin Dashboard</a></li>
              <li><a href="/admin/nuovi-articoli">Articoli in coda</a></li>
              <li><a href="/admin/articoli">Listato Articoli</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/admin/categorie">Gestione Categorie</a></li>
              <li><a href="/admin/utenti">Gestione Utenti</a></li>
              <li><a href="/admin/pagamenti">Gestione Pagamenti</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/admin/impostazioni">Impostazioni</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Esci</a></li>
            </ul>
          </div>