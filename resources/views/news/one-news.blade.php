@extends('master')

@section('title') Новости @endsection
@section('css')
    <link href="{{ asset('css/news.css?v=1') }}" rel="stylesheet">  
@endsection
@section('main')

    <div class="container min-h-screen py-20 relative overflow-hidden">
        <h6 class="text-gray-300 font-black uppercase -rotate-90 fixed bg-text">патриот</h6>
        <!-- <h3 class="uppercase font-medium text-3xl text-[var(--accent-color)] text-center lg:text-left">Новости</h3> -->
        <one-news-component></one-news-component>
    </div>

@endsection
