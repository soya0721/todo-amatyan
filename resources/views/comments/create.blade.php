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
     <div class="container mx-auto p-4">
        <div class="flex justify-center mt-5">
            <div class="w-full md:w-2/3 lg:w-1/2">
                <h2 class="text-2xl font-semibold mb-4">以下の記事にコメントします</h2>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="border-b pb-2 mb-2">
                        <h5 class="text-xl font-medium">タイトル：{{ $post->title }}</h5>
                    </div>
                    <div class="text-gray-700">
                        <p class="mb-2">内容：{{ $post->body }}</p>
                        <p class="text-sm text-gray-500">投稿日時：{{ $post->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-5">
            <div class="w-full md:w-2/3 lg:w-1/2">
                <form action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">コメント</label>
                        <textarea class="w-full border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="内容" rows="5" name="body"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">コメントする</button>
                </form>
            </div>
        </div>
    </div>
</html>