<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    <header class="bg-blue-300 p-4">
        <nav class="flex justify-between mxauto container items-center">
            <div class="text-4xl font-serif"><a href="{{ route('posts.index') }}">Amatyan</a></div>
            <div class="space-x-12 font-bold">
                <a href="" class="hover:text-green-200 transition-all durtaion-300">マイページ</a>
                <a href="" class="hover:text-green-200 transition-all durtaion-300">ログイン＆ログアウト</a>

            </div>
        </nav>
     </header>
     <div class="p-4">
        <div class="mb-4">
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location='{{ route('comments.create',$post->id) }}'">コメントする</button>
        </div>
        <div class="text-lg font-semibold mb-4">コメント一覧</div>
        @foreach($post->comments as $comment)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h5 class="text-gray-700 font-medium">投稿者: {{ $comment->user->name }}</h5>
            <div class="text-gray-500 text-sm mt-2">
                <h5>投稿日時: {{ $comment->created_at }}</h5>
                <p class="mt-2">内容: {{ $comment->body }}</p>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>