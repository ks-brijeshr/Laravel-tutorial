<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{ $job->title }}</h2>

    @can('edit', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
    @endcan

    <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>

</x-layout>
