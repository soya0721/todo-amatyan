<!DOCTYPE html>
<html lang="ja">
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
    <main>
        <section class="welcome">
            <div class="block text-4xl font-medium text-gray-700"><a href="{{ route('posts.create') }}">新規投稿</a></div>
            <div>
                <a href="{{ route('posts.index', ['order' => 'asc']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                    昇順
                </a>
                <a href="{{ route('posts.index', ['order' => 'desc']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                    降順
                </a>
            </div>
                <div class="grid grid-cols-5 gap-4 place-items-center h-56 "> 
                    @foreach($posts as $post)
                    <div class="border-2 border-gray-300 p-4">
                        <img src="{{ Storage::url($post->image_at) }}" >
                        <h2 class="block text-2xl font-medium text-gray-700">タスク:{{ $post->title }}</h2>    
                        <p class="block text-2xl font-medium text-gray-700">タスク内容:{{ $post->contents }}</p>
                        <a href="{{ route('posts.edit',$post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                            編集
                          </a>
                        {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                            削除
                          </a> --}}
                          
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">
                                削除
                            </button>
                        </form>

                    </div>
                    @endforeach
                </div>
        </section>
    </main>
</body>
</html>