<x-app-layout>
    <x-slot name="header">
        headername</x-slot>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
       
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       
    </head>
    <body class="antialiased">
        <h1>Blog Name</h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach($posts as $post)
             <div class='post'>
                <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>

                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
             <p class='body'>{{ $post->body }}</p>
<!-- 以下を追記 -->
<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
    @csrf
    @method('DELETE')
    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 

             </div>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links()}}</div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }

</script>
{{ Auth::user()->name }}
</form>

    </body>
</html>

</x-app-layout>