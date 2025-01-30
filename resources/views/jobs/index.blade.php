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


    <div class="space-y-4">
        @foreach ($jobs as $key => $value)
            <a href="/jobs/{{ $value['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                {{-- {{ $key + 1 }} . <br> --}}
                <div class="font-bold text-blue-500">{{ $value->employer->name }}</div>
                <div>
                    {{ 'title :-' . $value['title'] }}. <br> Pays
                    {{ 'salary :-' . $value['salary'] }}
                    Peryear . <br>
                </div>
            </a>
        @endforeach

        <div>
            {{-- links() is use for pagination --}}
            {{ $jobs->links() }}
        </div>

    </div>

</x-layout>
