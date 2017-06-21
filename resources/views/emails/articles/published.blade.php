<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <!-- This is a simple example template that you can edit to create your own custom templates -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Facebook sharing information tags -->
        <meta property="og:title" content="*|MC:SUBJECT|*">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Il tuo articolo è stato pubblicato</title>
        
    <style type="text/css">
        #outlook a{
            padding:0;
        }
        body{
            width:100% !important;
        }
        body{
            -webkit-text-size-adjust:none;
        }
        body{
            margin:0;
            padding:0;
        }
        img{
            border:none;
            font-size:14px;
            font-weight:bold;
            height:auto;
            line-height:100%;
            outline:none;
            text-decoration:none;
            text-transform:capitalize;
        }
        #backgroundTable{
            height:100% !important;
            margin:0;
            padding:0;
            width:100% !important;
        }
  
        body,.backgroundTable{
          background-color:#FAFAFA;
        }

        #templateContainer{
           border:1px solid #DDDDDD;
        }

        h1,.h1{
            color:#202020;
            display:block;
            font-family:Arial;
            font-size:34px;
            font-weight:bold;
            line-height:100%;
            margin-bottom:10px;
            text-align:left;
        }

        h2,.h2{
            color:#202020;
            display:block;
            font-family:Arial;
            font-size:30px;
            font-weight:bold;
            line-height:100%;
            margin-bottom:10px;
            text-align:left;
        }

        h3,.h3{
            color:#202020;
            display:block;
            font-family:Arial;
            font-size:26px;
            font-weight:bold;
            line-height:100%;
            margin-bottom:10px;
            text-align:left;
        }

        h4,.h4{
            color:#202020;
            display:block;
            font-family:Arial;
            font-size:22px;
            font-weight:bold;
            line-height:100%;
            margin-bottom:10px;
            text-align:left;
        }

        #templatePreheader{
            background-color:#FAFAFA;
        }

        .preheaderContent div{
            color:#505050;
            font-family:Arial;
            font-size:10px;
            line-height:100%;
            text-align:left;
        }
 
        .preheaderContent div a:link,.preheaderContent div a:visited{
            color:#336699;
            font-weight:normal;
            text-decoration:underline;
        }
        .preheaderContent div img{
            height:auto;
            max-width:600px;
        }

        #templateHeader{
            background-color:#FFFFFF;
            border-bottom:0;
        }

        .headerContent{
            color:#202020;
            font-family:Arial;
            font-size:34px;
            font-weight:bold;
            line-height:100%;
            padding:0;
            text-align:center;
            vertical-align:middle;
        }

        .headerContent a:link,.headerContent a:visited{
            color:#336699;
            font-weight:normal;
            text-decoration:underline;
        }
        #headerImage{
            height:auto;
            max-width:600px !important;
        }

        #templateContainer,.bodyContent{
            background-color:#FDFDFD;
        }

        .bodyContent div{
            color:#505050;
            font-family:Arial;
            font-size:14px;
            line-height:150%;
            text-align:left;
        }

        .bodyContent div a:link,.bodyContent div a:visited{
            color:#336699;
            font-weight:normal;
            text-decoration:underline;
        }
        .bodyContent img{
            display:inline;
            margin-bottom:10px;
        }

        #templateFooter{
            background-color:#FDFDFD;
            border-top:0;
        }

        .footerContent div{
            color:#707070;
            font-family:Arial;
            font-size:12px;
            line-height:125%;
            text-align:left;
        }

        .footerContent div a:link,.footerContent div a:visited{
            color:#336699;
            font-weight:normal;
            text-decoration:underline;
        }
        .footerContent img{
            display:inline;
        }

        #social{
            background-color:#FAFAFA;
            border:1px solid #F5F5F5;
        }

        #social div{
            text-align:center;
        }
 
        #utility{
            background-color:#FDFDFD;
            border-top:1px solid #F5F5F5;
        }

        #utility div{
            text-align:center;
        }
        #monkeyRewards img{
            max-width:160px;
        }
</style></head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <center>
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
                <tr>
                    <td align="center" valign="top">
                        <!-- // Begin Template Preheader \\ -->
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">
                            <tr>
                                <td valign="top" class="preheaderContent">
                                
                                  
                                    <p>Il tuo articolo {{$article->title}} è stato approvato.</p>
                                    <p><a href="{{env('APP_URL'). $article->present()->article_url}}">Vedi Articolo</a></p>
                                
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
