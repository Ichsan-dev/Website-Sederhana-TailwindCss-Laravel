<?php

use App\Models\About;
use App\Models\Jumbotron;
use App\Models\Portofolio;
use App\Models\Service;

function get_jumbotron()
{
     return Jumbotron::all();
    
}
function get_service()
{
     return Service::all();
}
function get_portofolio()
{
     return Portofolio::all();
}
function get_about()
{
     return About::all();
}
?>