
     
        <div class="post-list">
  
          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">&nbsp;</th>
                <th data-search-type="text">Nome</th>
                <th data-search-type="text">Cognome</th>
                <th data-search-type="text">Nickname</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($currentUser->ifollow()->get() as $user)

              <tr class="article-list-row" id="ifollow_{{$user->id}}">
                <td class="article-list-category"><a href="{{$user->present()->user_url()}}" class="action"><img src="{{$user->avatar}}" class="img-responsive"/></a></td>
                <td class="article-list-category">{{$user->name}}</td>
                <td class="article-list-category">{{$user->surname}}</td>
                <td class="article-list-category">{{$user->username}}</td>

                <td class="actions">
                  <a class="btn btn-primary unfollow-button" data-id="{{$user->id}}">Non Seguire</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          
          </table>
        </div>
      </div>
    </div>

