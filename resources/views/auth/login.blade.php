@extends('layouts.master')

@section('content')

<div class="page-bg"></div>
    @include('layouts.header')
    
    <div class="l-main">
      <div class="container-fluid bleeding">
        <div class="intro">
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
              <div class="inner-intro">
                <h1>Partecipa a <i>Sito Pubblico</i></h1>
                <p><i>Sito Pubblico</i> è un portale di libera informazione che offre la possibilità a tutti i cittadini di esprimere le proprie idee ed opinioni, commentare avvenimenti di attualità e condividere conoscenze ed esperienze. C’è bisogno di voci nuove, INDIPENDENTI E LIBERE, che sappiano dire la loro al di fuori dei soliti cliché. Se anche tu senti il bisogno di comunicare le tue opinioni ad alta voce e condividerle col mondo intero, non esitare ed entra a far parte di <i>Sito Pubblico!</i></p>
                <h2>Accedi ora</h2>
                <div class="login-btns"><a href="/auth/facebook" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-fw"></i> Accedi tramite Facebook</a><span class="or">oppure</span><a href="/auth/register" class="btn btn-primary btn-lg">Registrati</a></div>
              </div>
            </div>
            <div class="col-sm-3"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid bleeding">
      <div class="intro-desc">
        <div class="row">
          <div class="col-sm-3">
            <div class="intro-img"><img src="images/intro1.jpg" class="img-responsive"></div>
          </div>
          <div class="col-sm-6">
            <p><i>Sito Pubblico</i> è una comunità di autori, blogger e cittadini che hanno voglia di comunicare attraverso un’unica piattaforma comune, ben più visibile dei piccoli blog personali, o dei profili social.</p>
            <p>Su <i>Sito Pubblico</i> puoi esprimere liberamente le tue idee, i tuoi punti di vista, condividere le tue conoscenze ed esperienze con le migliaia di persone che quotidianamente visitano il sito.  Puoi scrivere su qualsiasi tema, senza alcun tipo di censura, nel rispetto del regolamento del sito e delle normative vigenti.</p>
            <p><i>Sito Pubblico</i> distribuisce ai contributori dal 50% al 90% dei ricavi pubblicitari generati da ciascun articolo pubblicato sul sito, tramite una piattaforma utente dove puoi monitorare quante visite hanno ottenuto i tuoi contenuti e quanti ricavi hanno generato.</p>
          </div>
          <div class="col-sm-3">
            <div class="intro-img"><img src="images/intro1.jpg" class="img-responsive"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6"><a href="#" class="btn btn-primary btn-lg btn-block btn-rules"><i class="fa fa-book fa-fw"></i> Per maggiori dettagli, leggi il regolamento del sito <i class="fa fa-arrow-circle-o-right fa-fw"></i></a></div>
          <div class="col-sm-3"></div>
        </div>
      </div>
    </div>
    @include('auth.partials.registration')
    
@stop