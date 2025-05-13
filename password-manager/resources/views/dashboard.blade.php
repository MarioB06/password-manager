<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Passwords
            </h2>
            <x-primary-button x-data x-on:click="$dispatch('open-modal', '{{ 'add-password' }}')">
                + Add Password
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left text-sm">
                    <thead class="border-b font-medium text-gray-500">
                        <tr>
                            <th class="pb-2">Title</th>
                            <th class="pb-2">Username</th>
                            <th class="pb-2">URL</th>
                            <th class="pb-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passwords as $password)
                            <tr class="border-t">
                                <td class="py-2">{{ $password->title }}</td>
                                <td>{{ $password->username }}</td>
                                <td>{{ $password->url }}</td>
                                <td>
                                    <x-secondary-button x-data
                                        x-on:click="$dispatch('open-modal', '{{ 'edit-password-' . $password->id }}')">Edit</x-secondary-button>

                                    <form method="POST" action="{{ route('passwords.destroy', $password) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($passwords->isEmpty())
                    <p class="text-center text-gray-500 mt-4">No passwords saved yet.</p>
                @endif
            </div>
        </div>
    </div>

    <x-modal name="add-password">
        <form method="POST" action="{{ route('passwords.store') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">Add New Password</h2>

            <div class="mt-4">
                <x-input-label for="title" value="Title" />
                <x-text-input id="title" name="title" class="mt-1 block w-full" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="username" value="Username / Email" />
                <x-text-input id="username" name="username" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="url" value="Website / URL" />
                <x-text-input id="url" name="url" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" value="Password" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                <x-primary-button class="ml-3">Save</x-primary-button>
            </div>
        </form>
    </x-modal>

    @foreach ($passwords as $password)
        <x-modal name="edit-password-{{ $password->id }}">
            <form method="POST" action="{{ route('passwords.update', $password) }}" class="p-6">
                @csrf
                @method('PUT')

                <h2 class="text-lg font-medium text-gray-900">Edit Password</h2>

                <div class="mt-4">
                    <x-input-label for="title-{{ $password->id }}" value="Title" />
                    <x-text-input id="title-{{ $password->id }}" name="title" class="mt-1 block w-full"
                        value="{{ $password->title }}" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="username-{{ $password->id }}" value="Username / Email" />
                    <x-text-input id="username-{{ $password->id }}" name="username" class="mt-1 block w-full"
                        value="{{ $password->username }}" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="url-{{ $password->id }}" value="Website / URL" />
                    <x-text-input id="url-{{ $password->id }}" name="url" class="mt-1 block w-full"
                        value="{{ $password->url }}" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password-{{ $password->id }}" value="Password" />
                    <x-text-input id="password-{{ $password->id }}" name="password" class="mt-1 block w-full"
                        value="{{ $password->password }}" required />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                    <x-primary-button class="ml-3">Update</x-primary-button>
                </div>
            </form>
        </x-modal>
    @endforeach

</x-app-layout>