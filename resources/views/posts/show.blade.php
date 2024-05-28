{{-- <!DOCTYPE html>
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
                <a href="" class="hover:text-green-200 transition-all durtaion-300">ログアウト</a>

            </div>
        </nav>
     </header>
     <main>
        <section class="welcome">
            <div class="contact-form">
                <h2 class="block text-2xl font-medium text-gray-700">ToDo作成</h2>
                <form action="{{ route('posts.edit', $post->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <span class="block text-lg font-medium text-gray-700">タスク名</span>
                    <input type="text" name="title" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('title')
                        <div class="error">{{ $message }}</div>
                        @enderror
            
                    <br>
                    <span class="block text-lg font-medium text-gray-700">タスク内容</span>
                    <input type="textarea" name="body" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('body')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        <span class="block text-lg font-medium text-gray-700">写真投稿</span>
                        <input type="file" name="image">
                    <input type="submit" value="投稿" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-all duration-300">

                </form>
            </div>
        </section>
    </main>
</body>
</html> --}}