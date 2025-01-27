{{-- @ is the blade directives like @if @forloop @switch and  props menas properties we can use and change parent component properties in child comp --}}
@props(['active' => true, 'type'=> 'a'])

{{-- @if ($type === 'a')
<{{$type}} class="{{ $active ?  "bg-gray-100 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}}rounded-md px-3 py-2 text-sm font-medium" 
    aria-current="{{ $active ?  "page" : "false"}}"
    {{$attributes}}
    >{{ $slot }}</{{$type}}>
 @else 
 <button class="{{ $active ?  "bg-gray-100 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}}rounded-md px-3 py-2 text-sm font-medium" 
    aria-current="{{ $active ?  "page" : "false"}}"
    {{$attributes}}
    >{{ $slot }}</button>
@endif  --}}

<{{$type}} class="{{ $active ?  "bg-gray-100 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white"}}rounded-md px-3 py-2 text-sm font-medium" 
    aria-current="{{ $active ?  "page" : "false"}}"
    {{$attributes}}
    >{{ $slot }}</{{$type}}>
