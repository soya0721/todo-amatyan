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
                <li>Todo作成ページ</a></li>
            </ul>
        </div>
     </header>
     <main>
        <section class="welcome">
            <div class="contact-form">
                <h2>ToDo作成</h2>
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <span>タスク名</span>
                    <input type="text" name="title">
                    <br>
                    <span>タスク内容</span>
                    <input type="textarea" name="body">
                    <input type="submit" value="投稿">
                </form>
            </div>
        </section>
    </main>
</body>
</html>