@extends('layouts.master')

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('layouts.header')
    <div class="container">
      <div class="l-post-list-page">
        <h1 class="page-title">I miei articoli</h1>
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
              <div class="form-group">
                <label class="label">Stato</label>
                <select class="form-control" id="dashboard-state-filter">
                  <option value="all">Tutte</option>
                  <option value="Bozza">Bozza</option>
                  <option value="In Approvazione">In Approvazione</option>
                  <option value="Pubblicato">Pubblicato</option>
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
                <th>Stato</th>
                <th>Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user->articles as $article)
              <tr class="article-list-row">
                <td>{{$article->created_at->format('d-m-Y')}}</td>
                <td>{{$article->title}}</td>
                <td class="article-list-category">{{$article->category->name}}</td>
                <td class="article-list-state">In Approvazione</td>
                <td><a href="/dashboard/articoli/{{$article->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="/dashboard/articoli/{{$article->id}}/rimuovi" class="action"><i class="fa fa-trash-o fa-fw"></i></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @stop