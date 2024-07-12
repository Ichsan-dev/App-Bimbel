<?php
use App\Models\Jumbotron;
use App\Models\Review;
use App\Models\section;
use App\Models\setting;

function get_setting_value($key)
{
    $data = setting::where('key', $key)->first();
    if(isset($data->value)){
        return $data->value;
    }else{
        return 'empty';
    }
}

function get_section()
{
    $data = section::all();
    return $data;
}

function get_jumbotron()
{
    $data = Jumbotron::all();
    return $data;
}

function get_reviews()
{
    $datareview = Review::all();
    return $datareview;
}