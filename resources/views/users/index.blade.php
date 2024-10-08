<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('users.create') }}" class="underline">Add New User</a>


                    <div class="flex flex-col mt-4">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light text-surface">
                                        <thead class="border-b border-neutral-200 font-medium">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">First Name</th>
                                                <th scope="col" class="px-6 py-4">Last Name</th>
                                                <th scope="col" class="px-6 py-4">Email</th>
                                                <th scope="col" class="px-6 py-4">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr class="border-b border-neutral-200">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->first_name }}</td>
                                                    <td class="whitespace-normal px-6 py-4">{{ $user->last_name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                                    <td class="whitespace-normal px-6 py-4">
                                                        <a href="{{ route('users.edit', $user) }}" class="underline">Edit</a> |
                                                        <form class="inline-block" action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="text-red-500 underline inline-block">Delete</button>
                                                        </form>
                                                    </td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{ $users->links() }}
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
