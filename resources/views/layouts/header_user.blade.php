
          <div class="dropdown" style="float: left;"">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             @if(strlen($currentUser->avatar) >2)
              <span class="profile-thumb-holder" style="background: url({{$currentUser->avatar}});"></span>@endif
              <span class="profile-label">{{$currentUser->name}}</span> &nbsp;
              <span class="caret"></span>
            </button>
            <ul id="user-dropdown" class="dropdown-menu" aria-labelledby="dropdownMenu1"">
              <li><a href="{{\Auth::user()->present()->user_url()}}"><i class="fa fa-fw fa-user"></i> Il Mio Profilo</a></li>
              <li><a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
              <li><a href="/dashboard/articoli/scrivi"><i class="fa fa-fw fa-edit"></i> Scrivi Un Articolo</a></li>
              <li><a href="/guadagni-pagamenti"><i class="fa fa-fw fa-euro"></i> Guadagni e Pagamenti</a></li>
              <li><a href="/impostazioni"><i class="fa fa-fw fa-cog"></i> Impostazioni</a></li>
              <!-- <li role="separator" class="divider"></li> -->
              <li><a href="/logout"><i class="fa fa-fw fa-power-off"></i> Esci</a></li>
            </ul>

            <div class="dropdown" style="float: right;">
              <button class="btn btn-primary dropdown-toggle btn-notify" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-bell-o"></i>
                <span class="badge">3</span>
              </button>
              <ul id="notify-dropdown" class="dropdown-menu" aria-labelledby="dropdownMenu2"">
                <li><a href="#">Il tuo articolo è stato approvato</a></li>
                <li><a href="#">Il tuo articolo è stato rifiutato</a></li>
                <li><a href="#"><b>Mario Rossi</b> ha iniziato a seguirti</a></li>
                <li class="viewed"><a href="#">Il tuo articolo è stato approvato</a></li>
                <li class="viewed"><a href="#">Il tuo articolo è stato rifiutato</a></li>
                <li class="viewed"><a href="#"><b>Mario Rossi</b> ha iniziato a seguirti</a></li>
              </ul>
            </div>

          </div>

          
          