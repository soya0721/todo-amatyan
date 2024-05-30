<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <button type="button" class="btn btn-primary"   onclick="window.location='{{ route('comments.create',$post->id) }}'">コメントする</button>
    </div>
    <div>コメント一覧</div>
    @foreach($post->comments as $comment)
    <div>
        <h5>投稿者:{{ $comment->user->name }}</h5>
        <div>
            <h5>投稿日時:{{ $comment->crteated_at }}</h5>
            <p>内容:{{ $comment->body }}</p>
        </div>
    </div>
    @endforeach
</body>
</html>