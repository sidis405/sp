<!DOCTYPE html>
<!-- [if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!-- [if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!-- [if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!-- [if gt IE 8]><!-->
<html class="no-js">
  <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sito Pubblico</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- build:css css/vendor.css-->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!-- endbuild-->
    <!-- build:css css/main.css-->
    <link type="text/css" rel="stylesheet" href="/css/main.css">
    <!-- endbuild-->
    <!-- build:js js/modernizr.js-->
    <script src="/js/modernizr.js"></script>
    <!-- endbuild-->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div class="page-bg news-bg holderjs"></div>
    <header>
      <div class="container">
        <div class="l-header">
          <div class="btns-container"><a class="btn btn-primary">Accedi</a><a class="btn btn-primary">Registrati</a></div>
          <div class="search-container">
            <form role="search" class="navbar-form">
              <div class="form-group">
                <input type="text" placeholder="Cerca nel sito..." class="form-control">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="logo-container">
            <h1 class="logo">Sito Pubblico</h1>
          </div>
          <ul class="nav nav-pills nav-justified">
            <li><a href="#">Home</a></li>
            <li><a href="#">Controinformazione</a></li>
            <li><a href="#">Politica</a></li>
            <li><a href="#">Salute</a></li>
            <li><a href="#">Alimentazione</a></li>
            <li><a href="#">Expat</a></li>
            <li><a href="#">Cronaca</a></li>
            <li><a href="#">Economia</a></li>
            <li><a href="#">Società</a></li>
            <li><a href="#">Altro</a></li>
          </ul>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="l-profile-settings-page">
        <h1 class="page-title">Impostazioni</h1>
        <div role="tab-panel" class="profile-settings-panel">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Tab 1</a></li>
            <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Tab 2</a></li>
            <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Tab 3</a></li>
            <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Tab 4</a></li>
          </ul>
          <div class="tab-content">
            <div id="tab1" role="tabpanel" class="tab-pane active">
              <div class="row">
                <div class="col-sm-8">
                  <div class="input-block">
                    <h4>Dati Personali</h4>
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Nome" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nickname</label>
                      <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Nickname" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="" value="" required="required" pattern="" title="" placeholder="Email" class="form-control">
                    </div>
                  </div>
                  <div class="input-block">
                    <h4>Link Personali</h4>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Facebook</label>
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Facebook" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Google</label>
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Google" class="form-control">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Twitter</label>
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Twitter" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Website</label>
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Sito Personale" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="input-block">
                    <h4>Descrizione personale</h4>
                    <div class="row">
                      <div class="col-sm-12">
                        <textarea name="" rows="3" required="required" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="input-block">
                    <h4>Metodo di pagamento</h4>
                    <div class="payment-method-box">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="radio-inline">
                            <label for="paypal-method">
                              <input id="paypal-method" type="radio" name="pay-method" value="paypal"> Paypal
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="radio-inline">
                            <label for="iban-method">
                              <input id="iban-method" type="radio" name="pay-method" value="iban" checked="checked">IBAN
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="input-block">
                    <h4>Intestatario conto IBAN</h4>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Nome" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="Cognome" class="form-control">
                        </div>
                        <div class="form-group">
                          <input type="text" name="" value="" required="required" pattern="" title="" placeholder="IBAN" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Salva</div>
                    <div class="btn btn-default pull-right"><i class="fa fa-close"></i>&nbsp; Annulla</div><br>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="profile-pic-settings-box"><img data-src="holder.js/100px320" class="img-responsive"></div>
                </div>
              </div>
            </div>
            <div id="tab2" role="tabpanel" class="tab-pane">...</div>
            <div id="tab3" role="tabpanel" class="tab-pane">...</div>
            <div id="tab4" role="tabpanel" class="tab-pane">...</div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="logo-container">
          <h1 class="logo">Sito Pubblico</h1>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="footer-col">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi iusto, iste dignissimos, veritatis nam numquam, libero ullam illo saepe, distinctio repellat. Temporibus eligendi consequatur, consequuntur sequi officia, obcaecati doloribus animi!</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="footer-col">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi iusto, iste dignissimos, veritatis nam numquam, libero ullam illo saepe, distinctio repellat. Temporibus eligendi consequatur, consequuntur sequi officia, obcaecati doloribus animi!</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="footer-col">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi iusto, iste dignissimos, veritatis nam numquam, libero ullam illo saepe, distinctio repellat. Temporibus eligendi consequatur, consequuntur sequi officia, obcaecati doloribus animi!</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <!-- build:js js/vendor.js-->
  <script src="/bower_components/jquery/dist/jquery.js"></script>
  <script src="/bower_components/bootstrap/dist/js/bootstrap.js"></script>
  <script src="/bower_components/holderjs/holder.js"></script>
  <script src="/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
  <!-- endbuild-->
  <!-- build:js js/main.js-->
  <script src="/js/main.js"></script>
  <!-- endbuild-->
</html>