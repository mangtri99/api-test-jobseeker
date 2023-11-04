<div>
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ session('status') }}</span>
        </div>
    @endif
    <form wire:submit.prevent="submit">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <x-input label="Full Name" id="full_name" wire:model="candidate.full_name"/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['full_name']))
                        <span>{{ $errors['full_name'][0] }}</span>
                    @endif
                </div>
            </div>
            <div>
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Gender</label>
                <select wire:model="candidate.gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected>Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="space-y-2">
                <x-input label="Email" id="email" type="email" wire:model="candidate.email" required/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['email']))
                        <span>{{ $errors['email'][0] }}</span>
                    @endif
                </div>
            </div>
            <div>
                <x-input label="Phone Number" id="phone_number" type="text" wire:model="candidate.phone_number" oninput="onChangePhoneNumber(event)"/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['phone_number']))
                        <span>{{ $errors['phone_number'][0] }}</span>
                    @endif
                </div>
            </div>
            <div>
                <x-input label="Place of Birth" id="pob" type="text" wire:model="candidate.pob" required/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['pob']))
                        <span>{{ $errors['pob'][0] }}</span>
                    @endif
                </div>
            </div>
            <div>
                <x-input label="Birthday" id="dob" type="date" wire:model="candidate.dob" required/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['dob']))
                        <span>{{ $errors['dob'][0] }}</span>
                    @endif
                </div>
            </div>
            <div>
                <x-input label="Year Experience" id="year_exp" type="number" wire:model="candidate.year_exp" required/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['year_exp']))
                        <span>{{ $errors['pob'][0] }}</span>
                    @endif
                </div>
            </div>
            <div>
                <x-input label="Last Salary" id="salary" type="number" wire:model="candidate.last_salary"/>
                <div class="text-red-500 text-sm">
                    @if(count($errors) > 0 && isset($errors['last_salary']))
                        <span>{{ $errors['last_salary'][0] }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <x-button type="submit">Submit</x-button>
        </div>
    </form>
    @push('scripts')
        <script>
            function onChangePhoneNumber(event){
                // if input is alphabet and not +, replace with empty string
                event.target.value = event.target.value.replace(/[^0-9+]/g, '');

            }
        </script>
    @endpush
</div>
