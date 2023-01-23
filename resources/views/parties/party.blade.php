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
            <form action="/parties/{{ $party->id }}" id="form_{{ $party->id }}" method="post">
             @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $party->id }})">削除する</button> 
            </form>
            @endif
            @endforeach
        </div>
        <div class='paginate'>
            {{ $parties->links() }}
        </div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>