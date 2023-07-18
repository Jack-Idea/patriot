@extends('master')

@section('title') Контакты @endsection
@section('css')
    <link href="{{ asset('css/contacts.css?v=1') }}" rel="stylesheet">  
@endsection
@section('main')

    <div class="container min-h-screen py-20 pt-10 relative overflow-hidden">
        <img src="/img/logo-bg.svg" class="fixed top-[20%] lg:top-[-5%] left-[-80%] lg:left-[-50%] z-[-1] opacity-30 rotate-90 lg:rotate-0" style="pointer-events: none;" alt="">
        <h6 class="text-gray-300 font-black uppercase -rotate-90 fixed bg-text">патриот</h6>
        <contacts-component></contacts-component>
    </div>

@endsection
