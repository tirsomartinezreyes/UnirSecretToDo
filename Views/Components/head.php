<?php 
/*
    Ing. Tirso Martínez Reyes
    Universidad Internacional de la Rioja
    Programación en el servidor
    Enero 2022
*/
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive pricing table.">
    <title>Generador de secret To-Dos &ndash; UNIR</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css">
    <style>body{color:#526066}.subtitle{font-size:0.5em;}h2,h3{letter-spacing:.25em;text-transform:uppercase;font-weight:600}p{line-height:1.6em}.l-content{margin:0 auto}.l-box{padding:.5em 2em}.pure-menu{box-shadow:0 1px 1px rgba(0,0,0,.1)}.pure-menu-link{padding:.5em .7em}.banner{background-color:#000;text-align:center;background-size:cover;height:200px;width:100%;margin-bottom:3em;display:table}.banner-head{display:table-cell;vertical-align:middle;margin-bottom:0;font-size:2em;color:#fff;font-weight:500;text-shadow:0 1px 1px #000}.information,.pricing-tables{max-width:980px;margin:0 auto}.pricing-tables{margin-bottom:3.125em;text-align:center}.pricing-table{border:1px solid #ddd;margin:0 .5em 2em;padding:0 0 3em}.pricing-table-free .pricing-table-header{background:#519251}.pricing-table-biz .pricing-table-header{background:#2c4985}.pricing-table-header{background:#111;color:#fff}.pricing-table-header h2{margin:0;padding-top:2em;font-size:1em;font-weight:400}.pricing-table-price{font-size:2.5em;margin:.2em 0 0;font-weight:100}.pricing-table-price span{display:block;text-transform:uppercase;font-size:.2em;padding-bottom:2em;font-weight:400;color:rgba(255,255,255,.5)}.pricing-table-list{list-style-type:none;margin:0;padding:0;text-align:center}.pricing-table-list li{font-size:0.9em;font-family: 'Courier New', monospace;padding:.8em 0;background:#f7f7f7;border-bottom:1px solid #e7e7e7;overflow-wrap:anywhere;padding-left:2%;padding-right:2%;min-height:30px;vertical-align:middle}.button-choose{border:1px solid #ccc;background:#fff;color:#333;border-radius:2em;font-weight:700;position:relative;bottom:-1.5em}.information-head{color:#000;font-weight:500}.footer{background:#111;color:#888;text-align:center}.footer a{color:#ddd}@media (min-width:767px){.banner-head{font-size:4em}.pricing-table{margin-bottom:0}}@media (min-width:480px){.banner{height:200px}.banner-head{font-size:3em}}</style>
    <style>a, a:visited, a:hover, a:active {color: inherit;}</style>
    <style >
        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65);
            /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60);
            /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20);
            /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221);
            /* this is a light blue */
        }
    </style>
</head>