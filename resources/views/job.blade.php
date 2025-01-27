<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{ $job['title'] }}</h2>
    <p>
        this job pays{{ $job['salary'] }} peryear
    </p>

</x-layout>
