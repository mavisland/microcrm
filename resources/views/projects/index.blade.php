<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('projects.create') }}" class="underline">Add New Project</a>
                    <div class="flex flex-col mt-4">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light text-surface">
                                        <thead class="border-b border-neutral-200 font-medium">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Title</th>
                                            <th scope="col" class="px-6 py-4">Assigned To</th>
                                            <th scope="col" class="px-6 py-4">Client</th>
                                            <th scope="col" class="px-6 py-4">Deadline</th>
                                            <th scope="col" class="px-6 py-4">Status</th>
                                            <th scope="col" class="px-6 py-4">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($projects as $project)
                                            <tr class="border-b border-neutral-200">
                                                <td class="whitespace-nowrap px-6 py-4">{{ $project->title }}</td>
                                                <td class="whitespace-normal px-6 py-4">{{ $project->user->first_name }} {{ $project->user->last_name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $project->client->company_name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $project->deadline_at }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $project->status }}</td>
                                                <td class="whitespace-normal px-6 py-4">
                                                    <a href="{{ route('projects.edit', $project) }}" class="underline">Edit</a>
                                                    @can(\App\Enums\PermissionEnum::DELETE_PROJECTS->value)
                                                    |
                                                    <form class="inline-block"
                                                          action="{{ route('projects.destroy', $project) }}"
                                                          method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                                class="text-red-500 underline inline-block">Delete
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{ $projects->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
