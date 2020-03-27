<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1> my posts</h1>
    <table class="table">
  <thead>
  <a href="#" class="btn btn-primary">create post</a>
    <tr>
      <th scope="col">id</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th colspan="3" scope="col-3">actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      
      
      <td>{{$post->id}}</td>
      <td>{{$post->crated_at}}</td>
      <td>{{$post->updated_at}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td><a href="{{route('posts.show',['post'=> $post->id])}}" class="btn btn-primary">view</a></td>
      <td><a href="{{route('posts.show',['post'=> $post->id])}}" class="btn btn-primary">update</a></td>
      <td><a href="{{route('posts.show',['post'=> $post->id])}}" class="btn btn-primary">delete</a></td>
   @endforeach
    </tr>
   
  </tbody>
</table>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>