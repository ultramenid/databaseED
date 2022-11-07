@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <livewire:edit-database-component :idDB=$id />
@endsection
