@extends('adminlte::page')

@section('title', 'Editar perfil')

@section('content')
    <div class="max-w-7xl space-y-6 pt-3">
        <div class="sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
