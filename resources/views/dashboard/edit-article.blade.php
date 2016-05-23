@extends('layouts.master')

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')
    <div class="container">
      <div class="l-create-post-page">
        <h1 class="page-title">Modifica articolo: '{{$article->title}}'</h1>
        <div class="row">
          <div class="col-sm-8">
            <form action="" method="POST" role="form" action="/dashboard/articoli/{{$article->id}}">
               {{csrf_field()}}
               <input type="hidden" name="article_id" value="{{$article->id}}">
              <div class="form-group">
                <input type="text" placeholder="Titolo" name="title"  value="{{old('title', $article->title)}}" required="required" class="form-control">
              </div>
              <div class="form-group">
                <textarea name="description" placeholder="Breve descrizione" cols="30" rows="5" class="form-control" required>{{old('description', $article->description)}}</textarea>
              </div>
              <div class="form-group">
                <textarea name="body" placeholder="Scrivi Il tuo articolo" cols="30" rows="15" class="form-control" required>{{old('body', $article->body)}}</textarea>
              </div>
              <div class="form-group">
                <a type="asubmit" class="btn btn-primary btn-lg pull-right"><i class="fa fa-paper-plane"></i> Invia per approvazione</a>
                <div class="clearfix"></div>
              </div>
            </form>
          </div>
          <div class="col-sm-4">
            <p>Seleziona una categoria:</p>
            <div class="form-group">
              <input data-role="tagsinput" value="Category 1, Category2" class="form-control tagsinput">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xs-6"><a class="btn btn-default btn-lg btn-block btn-upload"><i class="fa fa-camera"></i> Carica foto</a></div>
                <div class="col-xs-6"><a class="btn btn-default btn-lg btn-block btn-upload"><i class="fa fa-play"></i> Carica video</a></div>
              </div>
            </div>
            <div class="social-share"><a type="submit" class="btn btn-default btn-block"><i class="fa fa-facebook"></i> Share on Facebook</a><a type="submit" class="btn btn-default btn-block"><i class="fa fa-twitter"></i> Share on Twitter</a><a type="submit" class="btn btn-default btn-block"><i class="fa fa-google"></i> Share on Google+</a></div>
            <div class="form-group">
              <div class="row">
                <div class="col-xs-6"><a type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-save"></i> Salva bozza</a></div>
                <div class="col-xs-6"><a type="submit" class="btn btn-default btn-lg btn-block"><i class="fa fa-eye"></i> Anteprima</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @stop