<?php

    include('config.inc.php');
    
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false)
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK))
                $kepek[$fajl] = filemtime($MAPPA.$fajl);            
        }
    closedir($olvaso);

    ?><!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Gallery | African Children's Fund</title>
        <style type="text/css">
            div#galeria {margin: 0 auto; width: 620px;}
            div.kep { display: inline-block; }
            div.kep img { width: 200px; }
        </style>
    </head>
    <body>
        <?php include("header.html"); ?>
            <div id="galeria">
            <h1>Gallery</h1>
            <?php
            arsort($kepek);
            foreach($kepek as $fajl => $datum)
            {
            ?>
            <div class="kep">
                <a href="<?php echo $MAPPA.$fajl ?>">
                    <img src="<?php echo $MAPPA.$fajl ?>">
                </a>            
                <p>Name:  <?php echo $fajl; ?></p>
                <p>Date:  <?php echo date($DATUMFORMA, $datum); ?></p>
            </div>
        <?php
        }
        ?>
        </div>
        <?php include("footer.html"); ?>
    </body>
    </html>
    