@extends('master')

@section('title') Админка @endsection
@section('css')
    <link href="{{ asset('css/admin.css?v=1') }}" rel="stylesheet">
@endsection

@section('main')

    <admin-component></admin-component> 

@endsection
