<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 25/09/2018
 * Time: 14:00
 */
?>

@extends('master')
{{--section: phần--}}
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row banner">
            <div class="col-md-12">
                <h1 class="text-center margin-top-100 editContent">
                    Learning Laravel 5
                </h1>
                <h3 class="text-center margin-top-100 editContent">
                    {!! trans('main.subtitle') !!}
                </h3>
                <div class="text-center">
                    <img src="https://learninglaravel.net/img/LearningLaravel5_cover0.png" width="302" height="391"
                         alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
