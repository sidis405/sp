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
    <meta name="_token" content="{{ csrf_token() }}" />
    @yield('header_scripts')
    <!-- endbuild-->
    <!-- build:css css/main.css-->
    <link type="text/css" rel="stylesheet" href="/css/main.css">
    <link type="text/css" rel="stylesheet" href="/css/custom.css">


    <!-- endbuild-->
    <!-- build:js js/modernizr.js-->
    <script src="/js/modernizr.js"></script>
    <!-- endbuild-->
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet" type="text/css">

  </head>
  <body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    

    @yield('content')

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
  @yield('footer_scripts')
  <script src="/js/main.js"></script>
  <script src="/js/custom.js"></script>

  @if(@$currentUser && $currentUser->role !== 'admin')
    
    <script src="{{ asset('/js/socket.io.js') }}"></script>
    
    <script> var userid = {{$currentUser->id}}; </script>
    <script src="/js/sub_user.js"></script>          
    
  @elseif(@$currentUser && $currentUser->role == 'admin')
  

    <script src="{{ asset('/js/socket.io.js') }}"></script>
      
    <script src="/js/sub_admin.js"></script>          
    
  
  @endif

  <script>
        $(document).ready(function() {
         var docHeight = $(window).height();
         var footerHeight = $('footer').height();
         var footerTop = $('footer').position().top + footerHeight;
         if (footerTop < docHeight) {
          $('footer').css('margin-top', (docHeight - footerTop) + 'px');
         }
        });
      </script>

      <script type="text/javascript">
          var adblock = true;
      </script>
      <script type="text/javascript" src="/js/adframe.js"></script>
      <script type="text/javascript">
          if(adblock) {
                //adblock is installed and enabled on this site :-D
                console.log('block');
                adBlockIsEnabled()
          }else{
            console.log('good');
          }
      </script>


  <!-- endbuild-->
</html>