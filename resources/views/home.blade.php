<!-- now i want a raference to a layout file so we need to intrect with custom html tag -->
<!-- custome html tag must be layout file name  -->
<x-layout>
    {{-- heading is an variable in to layout.blade.php --}}
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <h1>hello from home</h1>

</x-layout>
