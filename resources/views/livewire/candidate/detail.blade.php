<div>
    <div class="mb-6 flex justify-start">
        <a href="{{route('index')}}" class="bg-white text-sm text-gray-700 focus:outline-none hover:bg-gray-100 px-4 py-2 rounded-lg shadow-sm">List Candidate</a>
    </div>
    <div class="block w-full dark:text-white text-gray-900 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
        <div class="space-y-4">
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Candidate ID</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['candidate_id'] ?? '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Full Name</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['full_name'] ?? '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Gender</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['gender'] == 'M' ? 'Male' : 'Female' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Email</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['full_name'] ?? '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Place of Birth</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['dob'] ?? '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Birthday</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['dob'] ?? '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Phone Number</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['phone_number'] ?? '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Year Experience</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['year_exp'] ? $candidate['year_exp'] . ' Years' : '-' }}</p>
                </div>
            </div>
            <div class="flex">
                <div class="lg:w-1/6 w-1/3">
                    <p>Last Salary</p>
                </div>
                <div class="flex-1">
                    <p>: {{ $candidate['last_salary'] ? 'Rp.' . number_format($candidate['last_salary'], 0, ',', '.') : '-' }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
