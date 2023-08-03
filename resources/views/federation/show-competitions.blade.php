@extends('master')

@section('title') Соревнования @endsection
@section('css')
    <link href="{{ asset('css/competitions.css?v=1') }}" rel="stylesheet">  
@endsection
@section('main')

    <div class="container min-h-screen py-20 pt-10 relative overflow-hidden">
        <img src="/img/logo-bg.svg" class="fixed top-[20%] lg:top-[-5%] left-[-80%] lg:left-[-50%] z-[-1] opacity-30 rotate-90 lg:rotate-0" style="pointer-events: none;" alt="">
        <show-competition-component></show-competition-component>
    </div>

@endsection
