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


               
                    {{-- <a class="dropdown-item hover:text-green-200 transition-all durtaion-300" href="{{ route('logout') }}
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        ログアウト
                    </a> --}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                
                {{-- <a href="" class="hover:text-green-200 transition-all durtaion-300">ログイン＆ログアウト</a> --}}
                <a href="" class="hover:text-green-200 transition-all durtaion-300">




                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}でログイン中
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="hover:text-green-200 transition-all durtaion-300" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <a href="{{ route('profile.myPage') }}" class="hover:text-green-200 transition-all durtaion-300">マイページ</a>
                    </ul>
                </a>
            </div>
        </nav>
     </header>
    <section class="welcome">
        <div class="block text-4xl font-medium text-gray-700"><a href="{{ route('posts.create') }}">新規投稿</a></div>

        <div>
        <form action="/products/search" method="GET">
            <input type="text" name="query" placeholder="検索キーワードを入力">
            <button type="submit">検索</button>
        </form>
        <ul>
            @foreach($products as $post)
                <li>{{ $post->name }}</li>
            @endforeach
        </ul>
     </div>

    <div class="grid grid-cols-5 gap-4 place-items-center h-56 "> 
        @foreach($products as $post)
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
    @if($products->isEmpty())
    <p>No results found</p>
@else
    <ul>
        @foreach($products as $product)
            {{-- <li>{{ $product->title }}</li> --}}
        @endforeach
    </ul>
@endif
</body>
</html>