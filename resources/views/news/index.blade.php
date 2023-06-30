@extends('master')

@section('title') Новости @endsection
@section('css')
    <link href="{{ asset('css/news.css?v=1') }}" rel="stylesheet">  
@endsection
@section('main')

    <div class="container min-h-screen py-20">
        <h3 class="uppercase font-medium text-3xl text-[var(--accent-color)] text-center lg:text-left">Новости</h3>
        <news-component :quantity="500"></news-component>
    </div>

@endsection
