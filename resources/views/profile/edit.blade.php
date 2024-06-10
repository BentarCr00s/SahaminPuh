<x-app-layout>
    <div class="py-12 mt-5 mb-5 rounded">
        <div class="container">
            <div class="p-4 m-3 p-md-5 m-md-4 bg-white shadow rounded mx-auto">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 m-3 p-md-5 m-md-4 bg-white shadow rounded mx-auto">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 m-3 p-md-5 m-md-4 bg-white shadow rounded mx-auto">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
