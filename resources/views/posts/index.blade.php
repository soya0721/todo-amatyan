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

    <header>
        <nav>
            <div  class="bg-blue-400">Amatyan</div>
            <div>
                <a href="">ToDo追加</a>
                <a href="">マイページ</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="welcome">
            <h1>新規投稿</h1>
            @foreach($posts as $post)
                <div> 
                    <h2>タスク:{{ $post->title }}</h2>    
                    <p>タスク内容:{{ $post->contents }}</p>
                    <img src="{{ asset($post->image_at) }}" >
                </div>
              @endforeach
        </section>
    </main>
</body>
</html>