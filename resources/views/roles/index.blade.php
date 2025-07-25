@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-white p-6 rounded-lg shadow-xl w-full max-w-3xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Roles</h1>
        <a href="{{ route('roles.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
            Create New Role
        </a>
    </div>

    <!-- Success/Error Message Display -->
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 border-b border-gray-200">ID</th>
                    <th class="py-3 px-6 border-b border-gray-200">Role Name</th>
                    <th class="py-3 px-6 border-b border-gray-200">Description</th>
                    <th class="py-3 px-6 border-b border-gray-200 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @forelse ($roles as $role)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="py-3 px-6 whitespace-nowrap">{{ $role->id }}</td>
                    <td class="py-3 px-6">{{ $role->role_name }}</td>
                    <td class="py-3 px-6">{{ $role->description }}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-2">
                            <!-- Show Button -->
                            <a href="{{ route('roles.show', $role->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-lg text-xs transition duration-150 ease-in-out">
                                Show
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('roles.edit', $role->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-lg text-xs transition duration-150 ease-in-out">
                                Edit
                            </a>

                            <!-- Delete Button (using a form for POST request) -->
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this role?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-lg text-xs transition duration-150 ease-in-out">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-3 px-6 text-center text-gray-500">No roles found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $roles->links() }}
    </div>
</div>
@endsection