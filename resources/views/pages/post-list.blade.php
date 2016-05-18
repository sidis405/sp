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
                <label class="label">Categoria</label>
                <select class="form-control">
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="label">Stato</label>
                <select class="form-control">
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <label class="label">Reset</label><a href="#" class="btn btn-default btn-md btn-block"><i class="fa fa-close"></i> Azzera filtri</a>
            </div>
          </div>
          <table class="table table-bordered">
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
              <tr>
                <td>25-12-2015</td>
                <td>Istanbul, diverse esplosioni in città: 10 morti e molti...</td>
                <td>Cronaca</td>
                <td>In Approvazione</td>
                <td><a href="#" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="#" class="action"><i class="fa fa-trash-o fa-fw"></i></a></td>
              </tr>
              <tr>
                <td>25-12-2015</td>
                <td>Istanbul, diverse esplosioni in città: 10 morti e molti...</td>
                <td>Cronaca</td>
                <td>In Approvazione</td>
                <td><a href="#" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="#" class="action"><i class="fa fa-trash-o fa-fw"></i></a></td>
              </tr>
              <tr>
                <td>25-12-2015</td>
                <td>Istanbul, diverse esplosioni in città: 10 morti e molti...</td>
                <td>Cronaca</td>
                <td>In Approvazione</td>
                <td><a href="#" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="#" class="action"><i class="fa fa-trash-o fa-fw"></i></a></td>
              </tr>
              <tr>
                <td>25-12-2015</td>
                <td>Istanbul, diverse esplosioni in città: 10 morti e molti...</td>
                <td>Cronaca</td>
                <td>In Approvazione</td>
                <td><a href="#" class="action"><i class="fa fa-edit fa-fw"></i></a><a href="#" class="action"><i class="fa fa-trash-o fa-fw"></i></a></td>
              </tr>
              <tr>
                <td>25-12-2015</td>
                <td>Istanbul, diverse esplosioni in città: 10 morti e molti...</td>
                <td>Cronaca</td>
                <td>In Approvazione</td>
                <td><a href="#" class="action"><i class="fa fa-trash-o fa-fw"></i></a>
                </td>
              </tr>
              <tr>
                <td>25-12-2015</td>
                <td>Istanbul, diverse esplosioni in città: 10 morti e molti...</td>
                <td>Cronaca</td>
                <td>In Approvazione</td>
                <td><a href="#" class="action"><i class="fa fa-trash-o fa-fw"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @stop