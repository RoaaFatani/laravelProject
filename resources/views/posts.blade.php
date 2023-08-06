@extends('components.layout')

{{--@section('banner')--}}
{{--    <h1> home</h1>--}}
{{--@endsection--}}
@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/my-first-post"{{$post->id}}>
                    {{$post->title}}
                </a>
            </h1>
            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach

@endsection

