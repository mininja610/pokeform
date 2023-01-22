<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="header">
        　パーティー管理
    </x-slot>
    <body>
        <h1>パーティ一覧</h1>
        <div class='create'>
            <a href='parties/create'>作成する</a>
        </div>
        
        <div class='parties'>
            @foreach ($parties as $party)
            @if(Auth::user()->can('view', $party))
            <div class='party'>
                <h2 class='title'>{{ $party->title }}</h2>
                <p class='body'>{{ $party->content }}</p>
                <a href="/parties/{{ $party->id }}">確認する</a>
            </div>
            @endif
            @endforeach
        </div>
        <div class='paginate'>
            {{ $parties->links() }}
        </div>
    </body>
    </x-app-layout>
</html>