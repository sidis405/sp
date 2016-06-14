
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-block" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             @if(strlen($currentUser->avatar) >2)<span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
                         <span class="profile-label">{{$currentUser->name}}</span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="{{\Auth::user()->present()->user_url()}}">Il Mio Profilo</a></li>
              <li><a href="/dashboard">Dashboard</a></li>
              <li><a href="/guadagni-pagamenti">Guadagni e Pagamenti</a></li>
              <li><a href="/impostazioni">Impostazioni</a></li>
              <li><a href="/dashboard/articoli/scrivi">Scrivi Un Articolo</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Esci</a></li>
            </ul>
          </div>