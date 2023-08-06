@extends('master')

@section('title') Фото @endsection
@section('css')
    <link href="{{ asset('css/gallery.css?v=1') }}" rel="stylesheet">  
@endsection
@section('main')

    <div class="container min-h-screen py-20 relative overflow-hidden">
        <img src="/img/logo-bg.svg" class="fixed top-[20%] lg:top-[-5%] left-[-80%] lg:left-[-50%] z-[-1] opacity-30 rotate-90 lg:rotate-0" style="pointer-events: none;" alt="">
        <div class="">
            <div>
                <h5 class="text-xl mt-5">Большое количество фотографий публикуется в нашей группе ВКонтакте</h5>
                <a href="https://vk.com/patriot_nvr" target="_blank" class="main-btn mt-4 bg-[#447bba]" style="min-width: 150px; max-width: 200px;">
                    в VK
                    <span uk-icon="icon: youtube; ratio: 1.5" class="ml-2"></span>
                </a>
            </div>
        </div>
    </div>

@endsection
