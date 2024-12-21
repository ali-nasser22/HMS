<x-admin.layout>
    <x-slot:title>Edit User</x-slot:title>
    <x-slot:header>Edit User</x-slot:header>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring-[#219EBC]"
                               value="{{ old('first_name', $user->first_name) }}" required>
                        @error('first_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring-[#219EBC]"
                               value="{{ old('last_name', $user->last_name) }}" required>
                        @error('last_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring-[#219EBC]"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="gender"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring-[#219EBC]">
                            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" id="role"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring-[#219EBC]">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('admin.users.index') }}"
                           class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-[#219EBC] hover:bg-[#219EBC]/90 text-white px-4 py-2 rounded-lg">
                            Update User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
