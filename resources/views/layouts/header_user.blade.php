
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
              <li class="dropdown-submenu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-euro"></i> Visualizzazioni e Guadagni</a>
                  <ul class="dropdown-menu">
                      <li><a href="/guadagni-pagamenti">Dettaglio Per Mese</a></li>
                      <li><a href="/riepilogo-pagamenti">Riepilogo / Richiedi Pagamento</a></li>
                  </ul>
              </li>
              <li><a href="/impostazioni"><i class="fa fa-fw fa-cog"></i> Impostazioni</a></li>
              <!-- <li role="separator" class="divider"></li> -->
              <li><a href="/logout"><i class="fa fa-fw fa-power-off"></i> Esci</a></li>
            </ul>


            <div class="dropdown" style="float: right;">
              <button class="btn btn-primary dropdown-toggle btn-notify" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                <span class="badge" id="notification-count">@if(count($day_topics) >0) {{count($day_topics) }}@endif</span>
              </button>
              <ul id="notify-dropdown" class="dropdown-menu" aria-labelledby="dropdownMenu2"">
              @if(count($day_topics) > 0)
                @foreach($day_topics as $single_topic)
                  <li><a href="/dashboard/argomenti-del-giorno">{!!$single_topic->name!!}</a></li>
                @endforeach

              <li class="viewed"><a href="/dashboard/argomenti-del-giorno">Vedi lista</a></li>
              @else
                  <li class="viewed"><a href="#">Non ci argomenti suggeriti</a></li>
              @endif
              </ul>
            </div>

            <div class="dropdown" style="float: right;">
              <button class="btn btn-primary dropdown-toggle btn-notify" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-bell-o"></i>
                <span class="badge" id="notification-count">@if(count($currentUser->newnotifications) >0) {{count($currentUser->newnotifications) }}@endif</span>
              </button>
              <ul id="notify-dropdown" class="dropdown-menu" aria-labelledby="dropdownMenu2"">
              @if(count($currentUser->notifications) > 0)
                @foreach($currentUser->notifications as $notification)
                  <li class="{{$notification->type}} @if($notification->seen == '1') viewed @endif" data-id="{{$notification->id}}">{!!$notification->text!!}</li>
                @endforeach
              @else
                  <li class="viewed"><a href="#">Non ci sono nuove notifiche</a></li>
              @endif
              </ul>
            </div>


          </div>

          
          