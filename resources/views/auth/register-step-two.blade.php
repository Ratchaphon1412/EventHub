<x-app-layout>
    <div class="flex-col md:grid md:grid-cols-2">
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register-step-two.store') }}">
                @csrf

                <div>
                    <x-label for="first_name" value="{{ __('First Name') }}" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" autofocus  />
                </div>

                <div class="mt-4">
                    <x-label for="last_name" value="{{ __('Last Name') }}" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" />
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                </div>
                <div class="mt-4">
                    <x-label for="age" value="{{ __('Age') }}" />
                    <x-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" />
                </div>
                <div class="mt-4">
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    <select name="gender" class="block mt-1 w-full">
                        @foreach ($gender as $items)
                            <option >{{ $items }}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <x-label for="facebook" value="{{ __('Facebook') }}" />
                    <x-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook')" />
                </div>
                <div class="mt-4">
                    <x-label for="instagram" value="{{ __('Instagram') }}" />
                    <x-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="old('instagram')" />
                </div>

                <div class="mt-4">
                    <x-label for="line" value="{{ __('Line') }}" />
                    <x-input id="line" class="block mt-1 w-full" type="text" name="line" :value="old('line')" />
                </div>


        

                <div class="flex items-center justify-end mt-4">
            

                    <x-button class="ml-4">
                        {{ __('Finish Registeration') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>

        <section class="h-screen hidden md:block">
            <img src="https://images.unsplash.com/photo-1504851149312-7a075b496cc7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=705&q=80" class="image-fluid h-[65vh] md:h-screen  w-full md:order-first" alt="">
        </section>
    </div>
</x-app-layout>
