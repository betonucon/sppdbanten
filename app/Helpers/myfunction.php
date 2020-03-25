<?php

function on_php_id()
{
   return 'My Helper Ready';
}

function golongan()
{
   $golongan=App\Golongan::all();
   return $golongan;
}

function oon()
{
   return 'My Helper Ready';
}

function anti_injection($data){
    $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    
    return $filter;
    
}