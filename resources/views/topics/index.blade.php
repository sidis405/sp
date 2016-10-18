@extends('layouts.master')

@section('header_scripts')

<link rel="stylesheet" href="/css/sweetalert.css">

<meta name="_token" content="{{ csrf_token() }}" />


@stop

@section('content')

    <div class="page-bg news-bg holderjs"></div>
    @include('admin.layouts.header')
    <div class="container">
      <div class="l-post-list-page">
          
        <h1 class="page-title">Argomenti del giorno 
        </h1>
        <div class="row">
        </div>
        <div class="post-list">
  
          <table class="table table-bordered article-list-table" id="datatable">
            <thead>
              <tr>
                <th data-search-type="text">Nome</th>
                <th data-search-type="text">Descrizione</th>
              </tr>
            </thead>

            <tbody>
              @foreach($topics as $topic)
              <tr class="article-list-row">
                <td>{{$topic->name}}</td>
                <td class="article-list-topic">{{$topic->description}}</td>
       
              </tr>
              @endforeach
            </tbody>
          
          </table>
        </div>
      </div>
    </div>
  @stop


@section('footer_scripts')
  <script src="/js/sweetalert.min.js"></script>



@stop