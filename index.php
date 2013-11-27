<?php
require("Whois.class.php");
$whois = new Whois;
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
                <input type="submit" name="submit" value="GO FFS!" />
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $query = explode("\n",$_POST['query']);
                //var_dump($query);
                foreach($query as $key => $value)
                {
                    if(!empty($value))
                    {
                        ?>
                        <div class="target"><?= $value; ?></div>
                        <div class="whois">
                            <?= nl2br($whois->whoislookup($value)); ?>
                        </div>
                        <?php
                        sleep(2);
                    }
                }
            }
            ?>
        </div>
    </body>
</html>