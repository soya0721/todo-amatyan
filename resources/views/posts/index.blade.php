<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/application.css') }}">
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="{{ asset('assets/images/logo_st.png') }}" alt="">
        </div>
        <div class="header-right">
            <ul class="nav">
                {{-- <li>作成後コメントアウトしてください<a href="{{ route('post.create') }}">記事作成</a></li> --}}
            </ul>
        </div>
    </header>
    <main>
        <section class="welcome">
            <h1>ToDo</h1>
            @foreach($posts as $post)
                <div> 
                    <h2>タスク:{{ $post->title }}</h2>    
                    <p>タスク内容:{{ $post->contents }}</p>
                </div>
              @endforeach
        </section>
    </main>
</body>
</html>