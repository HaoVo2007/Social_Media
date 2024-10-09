<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <div class=" bg-gray-200 dark:bg-gray-800">
        <div class="px-5 py-5 w-full bg-white shadow-lg transform duration-200 easy-in-out">
            <div class="h-72 overflow-y-hidden relative group">
                <img id="cover-img-path" class="w-full"
                    src="/storage/{{ $user->cover_path ? $user->cover_path : '/uploads/covers/image.jpg' }}"
                    alt="" />
                <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button
                        class="relative top-0 right-0 bg-white text-gray-700 py-2 px-4 rounded-lg shadow-lg text-sm">
                        <div class="flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <p class="text-xs text-slate-600">Change</p>
                        </div>
                        <input type="file" class="absolute top-0 right-0 left-0 bottom-0 opacity-0" name="cover-img"
                            id="cover-img">
                    </button>
                </div>
            </div>
            <div class="flex justify-center px-5 -mt-12">
                <div class="relative">
                    <img id="avatar-img-path" class="h-32 w-32 bg-white p-2 rounded-full" 
                        src="/storage/{{ $user->avatar_path ? $user->avatar_path : '/uploads/avatars/user-default.webp' }}"
                        alt="" />
                        
                    <div class="absolute top-0 right-0 w-full h-full">
                        <input type="file" class="w-full h-full opacity-0 cursor-pointer" name="avatar-img"
                            id="avatar-img">
                    </div>
                </div>
            </div>
            <div class="">
                <div class="text-center px-14">
                    <h2 class="text-gray-800 text-3xl font-bold">{{ $user->name }}</h2>
                    <a class="text-gray-400 mt-2 hover:text-blue-500" href="https://www.instagram.com/immohitdhiman/"
                        target="BLANK()">{{ $user->email }}</a>
                    <div class="flex items-center justify-center">
                        <div class="text-center p-4 cursor-pointer">
                            <p><span class="font-semibold">2.5 k </span> Followers</p>
                        </div>
                        <div class="border"></div>
                        <div class="text-center p-4 cursor-pointer">
                            <p> <span class="font-semibold">2.0 k </span> Following</p>
                        </div>

                    </div>
                    <div>
                        <div class="max-w-4xl mx-auto">
                            <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                                <ul class="flex flex-wrap -mb-px items-center justify-center" id="myTab"
                                    data-tabs-toggle="#myTabContent" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active"
                                            id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                            aria-controls="about" aria-selected="true">About</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 "
                                            id="post-tab" data-tabs-target="#post" type="button" role="tab"
                                            aria-controls="post" aria-selected="false">Post</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="followes-tab" data-tabs-target="#followes" type="button" role="tab"
                                            aria-controls="followes" aria-selected="false">Followers</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="followings-tab" data-tabs-target="#followings" type="button"
                                            role="tab" aria-controls="followings"
                                            aria-selected="false">Followings</button>
                                    </li>

                                    <li role="presentation">
                                        <button
                                            class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                            id="photos-tab" data-tabs-target="#photos" type="button" role="tab"
                                            aria-controls="photos" aria-selected="false">Photos</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="myTabContent">
                                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="about"
                                    role="tabpanel" aria-labelledby="about-tab">
                                    <div class="py-12">
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                            <div
                                                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center items-center">
                                                <div class="max-w-xl">
                                                    @include('profile.partials.update-profile-information-form')
                                                </div>
                                            </div>

                                            <div
                                                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center items-center">
                                                <div class="max-w-xl">
                                                    @include('profile.partials.update-password-form')
                                                </div>
                                            </div>

                                            <div
                                                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-center items-center">
                                                <div class="max-w-xl">
                                                    @include('profile.partials.delete-user-form')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="post"
                                    role="tabpanel" aria-labelledby="post-tab">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                                        content
                                        the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's
                                            associated content</strong>. Clicking another tab will toggle the visibility
                                        of this one for the next. The tab JavaScript swaps classes to control the
                                        content visibility and styling.</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="followes"
                                    role="tabpanel" aria-labelledby="followes-tab">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                                        content
                                        the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's
                                            associated content</strong>. Clicking another tab will toggle the visibility
                                        of this one for the next. The tab JavaScript swaps classes to control the
                                        content visibility and styling.</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="followings"
                                    role="tabpanel" aria-labelledby="followings-tab">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                                        content
                                        the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's
                                            associated content</strong>. Clicking another tab will toggle the visibility
                                        of this one for the next. The tab JavaScript swaps classes to control the
                                        content visibility and styling.</p>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="photos"
                                    role="tabpanel" aria-labelledby="photos-tab">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                                        content
                                        the <strong class="font-medium text-gray-800 dark:text-white">dsafdsadsadas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script>
        function uploadCover(type) {
            var formData = new FormData();
            var fileInput_1 = $('#cover-img').get(0);
            var fileInput_2 = $('#avatar-img').get(0);

            if (type == 1 ){
                formData.append('cover', fileInput_1.files[0]);
            } else {
                formData.append('avatar', fileInput_2.files[0]);
            }

            formData.append('type', type);

            if (fileInput_1.files.length > 0 || fileInput_2.files.length > 0) {
                $.ajax({
                    url: "{{ route('profile.edit.cover') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.type == '1') {
                            var newImageUrl_1 = response.cover_path;
                            $('#cover-img-path').attr('src', newImageUrl_1);
                        } else {
                            var newImageUrl_2 = response.avatar_path;
                            $('#avatar-img-path').attr('src', newImageUrl_2);
                        }
                        swal("Good job!", response.message, response.status);
                    },
                    error: function(error) {
                        if (type == 1) {
                            swal("Oops", error.responseJSON.errors.cover[0], "error");
                        } else {
                            swal("Oops", error.responseJSON.errors.avatar[0], "error");
                        }
                    }
                });
            }
        }

        $(document).ready(function() {

            $('#cover-img').change(function() {
                uploadCover(1);
            });

            $('#avatar-img').change(function() {
                uploadCover(2);
            });

        });
    </script>
</x-app-layout>
