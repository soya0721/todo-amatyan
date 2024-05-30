<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
      
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
              <h2>以下の記事にコメントします</h2>
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>タイトル：{{ $post->title }}</h5>
                    </div>
                    <div class="card-body">
                    <p class="card-text">内容：{{ $post->body }}</p>
                    <p>投稿日時：{{ $post->created_at }}</p>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-8">
              <form action="{{ route('comments.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <div class="form-group">
                      <label>コメント</label>
                      <textarea class="form-control" 
                      placeholder="内容" rows="5" name="body"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">コメントする</button>
              </form>
          </div>
        </div>
      </div>
</body>
</html>