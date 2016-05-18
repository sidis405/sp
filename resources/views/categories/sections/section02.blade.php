@foreach($section['small'] as $small_item)

<div class="col-sm-3">
  <div class="post post-blue">
    <div class="post-img">
      <div class="category"><a href="/categorie/{{$category->slug}}">{{$category->name}}</a></div>
      <a href="/categorie/{{$category->slug}}/articolo/{{$small_item->id}}/{{$small_item->slug}}"><img class="img-responsive post-blue" src="{{$small_item->image_path}}"/></a>
    </div>
    <h1 class="post-title"><a href="/categorie/{{$category->slug}}/articolo/{{$small_item->id}}/{{$small_item->slug}}">{{$small_item->title}}</a></h1>
    <div class="post-toolbar"><span class="author"><a href="/utente/{{$small_item->user->id}}">{{$small_item->user->name}}</a></span><span class="controls"><a href="#"><span>32</span> Condivisioni </a><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i></a><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i></a></span></div>
  </div>
</div>

@endforeach