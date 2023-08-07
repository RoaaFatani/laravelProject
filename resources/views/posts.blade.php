{{--@extends('components.layout')--}}

{{--@section('banner')--}}
{{--    <h1> home</h1>--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    @foreach($posts as $post)--}}
{{--        <article>--}}
{{--            <h1>--}}
{{--                <a href="/posts/{{$post->slug}}">--}}
{{--                    {{$post->title}}--}}
{{--                </a>--}}
{{--            </h1>--}}

{{--            <p>--}}
{{--                By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a>in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>--}}
{{--            </p>--}}

{{--            <div>--}}
{{--                {{$post->excerpt}}--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                {{$post->body}}--}}
{{--            </div>--}}
{{--        </article>--}}
{{--    @endforeach--}}
<x-layout>
@include('_posts-header')
<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
{{--    @if($post->count())--}}
       <x-posts-grid :posts="$posts"/>
{{--    @else--}}
{{--        <p class = "text-center">--}}
{{--            No post yet. Please check back later--}}
{{--        </p>--}}
{{--    @endif--}}

{{--    <div class="lg:grid lg:grid-cols-3">--}}
{{--        <x-post-card/>--}}
{{--        <x-post-card/>--}}
{{--        <x-post-card/>--}}
{{--    </div>--}}
</main>

{{--@endsection--}}
</x-layout>

