<?php
require_once("Whois.class.php");
require_once("Functions.class.php");
$whois = new Whois;
$function = new Functions;

$debug = true;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Whois 2.0</title>
        <script src="http://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $().ready(function(){
                
                $('div.target').click(function(){
                    $(this).next().slideToggle();
                });
                
                $('form button#submit').click(function(event){
                    $('table tbody').empty();
                    event.preventDefault();                    
                    var domains = $('form textarea[name=query]').val().split("\n");
                    
                    for(key in domains)
                    {
                        if(domains[key].length > 0)
                        {
                            $.getJSON("Whois.ajax.php?query="+domains[key], function( data ) {
                                var tr;
                                var nservers = '';
                                for(key in data.nserver)
                                {
                                    nservers += data.nserver[key] + "<br />";
                                }
                                tr = $('<tr/>');
                                tr.append("<td>" + data.domain + "</td>");
                                tr.append("<td>" + data.status + "</td>");
                                tr.append("<td>" + data.state + "</td>");
                                tr.append("<td>" + data.created + "</td>");
                                tr.append("<td>" + data.modified + "</td>");
                                tr.append("<td>" + data.expires + "</td>");
                                tr.append("<td>" + data.registrar + "</td>");
                                tr.append("<td>" + nservers + "</td>");
                                $('tbody').append(tr);
                            });
                        }
                    }
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
            
            table {
                width:900px;
            }
            
            table th {
                text-align: left;
            }
            
            table td {
                vertical-align: top;
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
                    <th>Domain</th><th>Status</th><th>State</th><th>Created</th><th>Modified</th><th>Expires</th><th>Registrar</th><th>Name Servers</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <?php
            if(isset($debug))
            {
                echo "<pre>";
                ?>
        <div id="debug"></dv>
                <?php
            }
        ?>
    </body>
</html>