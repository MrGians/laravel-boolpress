<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>
<style>
  body {background-color: tan}
  h1, h2 {text-align: center}
  h2 {margin: 1.5rem auto}

  div {
    display: flex;
    width: 100%;
  }
  div div {
    display: block;
    padding: 0 1rem;
    border-top: 1px solid black;
    border-bottom: 1px solid black;
  }
  figure {
    height: 250px;
    width: 100%;
    max-width: fit-content;
    margin: 0;
  }

  img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    }

    p {display: flex}
    p > span {
      padding: 0.3rem 0.5rem;
      background-color: #6c757d;
      margin-left: 0.5rem;
      color: white;
      border-radius: 10px
    }
  a {
    text-decoration: none;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    line-height: 1.6;
    border-radius: 0.25rem;
    cursor: pointer;
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
    margin: 1.5rem auto;
  }
</style>
</head>
<body>
  <h1>E' stato pubblicato un nuovo post!</h1>
  <hr>
  <h2>{{ $post->title }}</h2>
  <div>
    <figure>
      <img src="{{ asset('storage/'.$post->thumb) }}" alt="{{ $post->title }}">
    </figure>
    <div>
      <p>Categoria: <span>{{ $post->category->label ?? "Nessuna" }}</span></p>
      <p>Tags: 
        @forelse ($post->tags as $tag)
        <span style="background-color: {{ $tag->color }}">{{ $tag->label }}</span>
        @empty
        <span>N/D</span>
        @endforelse
      </p>
      <p>Pubblicato da: <em> {{ $post->author->name }}</em></p>
      <hr>
      <a href="{{ url('posts/'.$post->slug) }}">Vai al Post</a>
    </div>
  </div>



</body>
</html>