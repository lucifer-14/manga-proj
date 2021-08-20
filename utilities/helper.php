<?php

function get_genre($genre):string{
    $checker=false;
    if ($genre=="martialarts") {
        $genre="martial arts";
    }
    if ($genre=="sliceoflife") {
        $genre="slice of life";
    }
    $possible_genres=array("all","action","adventure","romance","fantasy","supernatural","horror","slice of life", "webtoon", "historical", "martial arts", "sports", "comedy");

     
    for ($x=0; $x<count($possible_genres); $x++) {
        if ($possible_genres[$x] == $genre) {
            $checker=true;
        }
    }
    if ($checker==false) {
        $genre="all";
    }
    return $genre;
}

function dateToStr($datestr):string{
    $date = new DateTime($datestr);
    return $date->format('d/m/Y');
}
function datetimeToStr($datestr):string{
    $date = new DateTime($datestr);
    return $date->format('d/m/Y H:i:s');
}
?>
