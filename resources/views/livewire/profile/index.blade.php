<div class="py-12">
    @livewire('succes-alert')
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-3">Informations du profile</h2>
            <div class="flex items-center space-x-6">
                <div class="flex-shrink-0">
                    @if($user->picture_path)
                        <img src="{{ asset($user->picture_path) }}" alt="Profile Picture"
                             class="w-24 h-24 rounded-full">
                    @else
                        <img src="{{ asset('images/default-user.jpg') }}" alt="Default Profile Picture"
                             class="w-24 h-24 rounded-full">
                    @endif
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">{{ $user->name }}</h3>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
            <div class="mt-6">
                <h4 class="text-lg font-medium text-gray-900">{{ __('Information du profile') }}</h4>
                <div class="mt-4 space-y-4">
                    <div>
                        <span class="font-medium text-gray-700">{{ __('Nom:') }}</span>
                        <p class="text-gray-900">{{ $user->name }}</p>
                    </div>
                    <div>
                        <span class="font-medium text-gray-700">{{ __('Email:') }}</span>
                        <p class="text-gray-900">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-cta-opener modalcontent="profile.edit">{{ __('Modifier le profile') }}</x-cta-opener>
            </div>
        </div>
    </div>
</div>
