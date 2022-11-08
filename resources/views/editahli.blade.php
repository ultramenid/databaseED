@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <livewire:edit-ahli-component :id=$id />
@endsection
