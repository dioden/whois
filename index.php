<?php
require_once("Whois.class.php");
require_once("Functions.class.php");
$whois = new Whois;
$function = new Functions;

//derp
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Whois 1.0</title>
        <script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $().ready(function(){
                $('div.target').click(function(){
                    $(this).next().slideToggle();
                });
                
                $('form button#submit').click(function(event){
                    event.preventDefault();                    
                    console.log($('form textarea[name=query]').serialize());
        
                    $.post('Whois.ajax.php',$('form textarea[name=query]').serialize(),function(data){
                       console.log(data); 
                    });
                });
            });
        </script>
        <style>
            html {
                font: normal 12px verdana;
            }
            div.whois {
                float:left;
                display:none;
                margin-top:10px;
                margin-bottom:10px;
                padding-left:10px;
            }
            
            div.target {
                font-size:16px;
                clear:both;
            }
            
            div.target:hover {
                cursor: pointer;
            }
            
            div#wrapper {
                margin:0 auto;
                width:900px;
            }
            textarea {
                min-width:900px;
                min-height: 150px;
                max-width:900px;
                max-height: 150px;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <form action="" method="post">
                <textarea name="query"></textarea><br /><br />
                <button id="submit">Look Up</button>
            </form>
            
            <table>
                <thead>
                    <th>Domain</th><th>State</th><th>Created</th><th>Expires</th><th>Registrar</th><th>Name Servers</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>