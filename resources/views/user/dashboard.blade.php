@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Добро пожаловать, {{ Auth::user()->name }}!</h2>
            <p>Это ваш личный кабинет. Здесь вы можете просматривать доступную информацию.</p>

            @if(Auth::user()->isAdmin())
            <div class="mt-4 p-4 bg-yellow-50 border-l-4 border-yellow-400">
                <p>Вы имеете права администратора. <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Перейти в админ-панель</a></p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection