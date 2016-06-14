@extends('admin.layouts.master')

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">
          
        <h1 class="page-title">Articoli in coda ({{count($new)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        <div class="row">
        </div>
        <div class="post-list">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label class="label">Categorie</label>
                 <select class="form-control" id="dashboard-category-filter">
                     <option class="dashboard-category-filter-option" value="all">Tutte</option>
                  @foreach($categories as $category)
                     <option class="dashboard-category-filter-option" value="{{$category}}">{{$category}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <label class="label">Reset</label><a class="btn btn-default btn-md btn-block article-list-reset-filter"><i class="fa fa-close"></i> Azzera filtri</a>
            </div>
          </div>
          <table class="table table-bordered article-list-table">
            <thead>
              <tr>
                <th>Data</th>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Utente</th>
                <th>Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach($new as $article)
              <tr class="article-list-row">
                <td>{{$article->updated_at->format('d-m-Y H:i')}}</td>
                <td><a href="/admin/articoli/{{$article->id}}">{{$article->title}}</a></td>
                <td class="article-list-category">{{$article->category->name}}</td>
                <td class="article-list-category"><a href="{{$article->user->present()->user_url()}}" class="author">
                            <i class="fa fa-user fa-fw"></i>{{$article->user->present()->user_name()}}</a></td>
                <td>
                  <a href="/admin/articoli/{{$article->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="/dashboard/articoli/{{$article->id}}/rimuovi" class="action"><i class="fa fa-trash-o fa-fw"></i></a>
                    <a href="/admin/articoli/{{$article->id}}/anteprima" class="action"><i class="fa fa-eye fa-fw"></i></a>
                    <!-- <a href="{{$article->present()->article_url()}}" target="_blank" class="action"><i class="fa fa-check fa-fw"></i></a> -->
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @stop