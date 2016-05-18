<div class="col-sm-6">

@foreach($section['medium'] as $medium_item)

          <div class="post post-blue">
            <div class="post-img">
              <div class="category"><a href="/categorie/{{$category->slug}}">{{$category->name}}</a></div>
              <a href="/categorie/{{$category->slug}}/articolo/{{$medium_item->id}}/{{$medium_item->slug}}"><img class="img-responsive post-blue" src="{{$medium_item->image_path}}"/></a>
            </div>
            <h1 class="post-title"><a href="/categorie/{{$category->slug}}/articolo/{{$medium_item->id}}/{{$medium_item->slug}}">{{$medium_item->title}}</a></h1>
            <h2 class="post-desc">{{$medium_item->description}}</h2>
            <div class="post-toolbar"><span class="author"><a href="/utente/{{$medium_item->user->id}}">{{$medium_item->user->name}}</a></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
          </div>
@endforeach
        </div>


        <div class="col-sm-6">
          <div class="row smaller-titles">
          @foreach(array_chunk($section['small'], 3)as $row)
            <div class="col-sm-6">
            @foreach($row as $small_item)
              <div class="post post-blue">
                <div class="post-img">
                  <div class="category"><a href="/categorie/{{$category->slug}}">{{$category->name}}</a></div><a href="/categorie/{{$category->slug}}/articolo/{{$small_item->id}}/{{$small_item->slug}}"><img class="img-responsive post-blue" src="{{$small_item->image_path}}"/></a>
                </div>
                <h1 class="post-title"><a href="/categorie/{{$category->slug}}/articolo/{{$small_item->id}}/{{$small_item->slug}}">{{$small_item->title}}</a></h1>
                <div class="post-toolbar"><span class="author"><a href="/utente/{{$small_item->user->id}}">{{$small_item->user->name}}</a></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
              </div>
              @endforeach
            </div>
            @endforeach
            
          </div>
        </div>