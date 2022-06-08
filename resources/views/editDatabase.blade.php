@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')

    <livewire:edit-database-component :idDB=$id />
@endsection
