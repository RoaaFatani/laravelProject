@props(['category'])
<a href="/?category={{ $category->slug }}"
   class="px-3 py-1 border border-pink-300 rounded-full text-pink-400 text-xs uppercase font-semibold"
   style="font-size: 10px">{{$category->name}}</a>
