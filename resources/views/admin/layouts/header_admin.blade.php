<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             @if(strlen($currentUser->avatar) >2)<span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
                         <span class="profile-label">{{$currentUser->name}}</span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu  multi-level" aria-labelledby="dropdownMenu1">
              <li><a href="/admin">Admin Dashboard</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/admin/nuovi-articoli">Articoli in coda</a></li>
              <li><a href="/admin/articoli">Listato Articoli</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-submenu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestione Categorie</a>
                  <ul class="dropdown-menu">
                      <li><a href="/admin/categorie">Lista Categorie</a></li>
                      <li><a href="/admin/categorie/crea">Aggiungi Categoria</a></li>
                     <!--  <li class="dropdown-submenu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                          <ul class="dropdown-menu">
                              <li class="dropdown-submenu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                  <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">One more separated link</a></li>
                                  </ul>
                              </li>
                          </ul>
                      </li> -->
                  </ul>
              </li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-submenu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestione Utenti</a>
                  <ul class="dropdown-menu">
                      <li><a href="/admin/utenti">Lista Utenti</a></li>
                      <li><a href="/admin/utenti/crea"></a></li>
                      <li class="dropdown-submenu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Amministratori</a>
                          <ul class="dropdown-menu">
                             
                                      <li><a href="/admin/amministratori">Lista Amministratori</a></li>
                                      <li><a href="/admin/amministratori/crea">Aggiungi Amministratore</a></li>

                               
                          </ul>
                      </li>
                  </ul>
              </li>
              <li role="separator" class="divider"></li>
              <li><a href="/admin/pagamenti">Gestione Pagamenti</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/admin/impostazioni">Impostazioni</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Esci</a></li>
              
            </ul>
          </div>

              
