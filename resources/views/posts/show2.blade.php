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