@extends('admin.layouts.master')

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">
          
        <h1 class="page-title">Categorie ({{count($categories)}})
            <!-- <span class="pull-right"><a href="/dashboard/articoli/scrivi"><i class="fa fa-plus-circle fw">Scrivi nuovo</i></a></span> -->
        </h1>
        <div class="row">
        </div>
        <div class="post-list">
  
          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Nome</th>
                <th data-search-type="text">Articoli</th>
                <th data-search-type="text">Payoff x 1000</th>
                <th data-search-type="text">Visite</th>
                <th data-search-type="text">Payoff Generato</th>
                <th data-search-type="none">Azioni</th>
              </tr>
            </thead>

            <tbody>
              @foreach($categories as $category)
              <tr class="article-list-row">
                <td><a href="/admin/categorie/{{$category->id}}/modifica">{{$category->name}}</a></td>
                <td class="article-list-category">{{count($category->articles)}}</td>
                <td class="article-list-category">€{{number_format($category->payoff, 2, ',', '.')}}</td>

                <td class="article-list-category">{{array_sum(array_pluck($category->articles, 'view_counter'))}}</td>
                <td class="article-list-category">€{{number_format(array_sum(array_pluck($category->articles, 'payoff_counter')), 2, ',', '.')}}</td>
                <td class="actions">
                  <a href="/admin/categorie/{{$category->id}}/modifica" class="action"><i class="fa fa-edit fa-fw"></i></a>
                  <a href="#" class="action"><i class="fa fa-bar-chart fa-fw"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          
          </table>
        </div>
      </div>
    </div>
  @stop
