<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('tasks.create') }}" class="underline">Add New Task</a>
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
                                        @foreach ($tasks as $task)
                                            <tr class="border-b border-neutral-200">
                                                <td class="whitespace-nowrap px-6 py-4">{{ $task->title }}</td>
                                                <td class="whitespace-normal px-6 py-4">{{ $task->user->first_name }} {{ $task->user->last_name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $task->client->company_name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $task->deadline_at }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $task->status }}</td>
                                                <td class="whitespace-normal px-6 py-4">
                                                    <a href="{{ route('tasks.edit', $task) }}" class="underline">Edit</a>
                                                    @can(\App\Enums\PermissionEnum::DELETE_TASKS->value)
                                                    |
                                                    <form class="inline-block"
                                                          action="{{ route('tasks.destroy', $task) }}"
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
                                        {{ $tasks->links() }}
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
