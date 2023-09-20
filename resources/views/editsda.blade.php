@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')

    <livewire:edit-s-d-a-component :id=$id />
@endsection
