<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <!-- Content of the jobs page that was moved to layout.blade.php -->

    {{-- Dynamic data access using key value pair in multidimensonal array --}}
    {{-- <ul>

        @foreach ($jobs as $key => $job)
            <li>

                {{ $key + 1 }} . <br>
                @foreach ($job as $key1 => $value)
                    <strong>{{ $key1 }}</strong>{{ $value }} . <br>
                @endforeach


            </li>
        @endforeach
    </ul> --}}


    <ul>
        @foreach ($jobs as $key => $value)
            <li>
                <a href="/jobs/{{ $value['id'] }}" class="text-blue-500 hover:underline">
                    {{ $key + 1 }} . <br> {{ 'title :-' . $value['title'] }} :Pays . <br>
                    {{ 'salary :-' . $value['salary'] }}
                    Peryear . <br>
                </a>
            </li>
        @endforeach

    </ul>

</x-layout>
