<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <div class=" bg-gray-200 dark:bg-gray-800">
        <div class="px-5 py-5 w-full bg-white shadow-lg transform duration-200 easy-in-out">
            <div class="h-72 overflow-y-hidden relative group">
                <img id="cover-img-path" class="w-full"
                    src="/storage/{{ $user->cover_path ? $user->cover_path : '/uploads/covers/image.jpg' }}"
                    alt="" />
                @if (Auth::user()->id === $user->id)
                    c
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
                            <input type="file" class="absolute top-0 right-0 left-0 bottom-0 opacity-0"
                                name="cover-img" id="cover-img">
                        </button>
                    </div>
                @endif

            </div>
            <input type="hidden" name="" id="user-id" value="{{ $user->id }}">
            <div class="flex justify-center px-5 -mt-12">
                <div class="relative">
                    <img id="avatar-img-path" class="h-32 w-32 bg-white p-2 rounded-full"
                        src="/storage/{{ $user->avatar_path ? $user->avatar_path : '/uploads/avatars/user-default.webp' }}"
                        alt="" />
                    @if (Auth::user()->id === $user->id)
                        <div class="absolute top-0 right-0 w-full h-full">
                            <input type="file" class="w-full h-full opacity-0 cursor-pointer" name="avatar-img"
                                id="avatar-img">
                        </div>
                    @endif
                </div>
            </div>
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
            </div>
            <div class="max-w-4xl mx-auto">
                <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                    <ul class="flex flex-wrap -mb-px items-center justify-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">

                        @if (Auth::user()->id === $user->id)
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active"
                                    id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                    aria-controls="about" aria-selected="true">About</button>
                            </li>
                        @endif

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
                                id="followings-tab" data-tabs-target="#followings" type="button" role="tab"
                                aria-controls="followings" aria-selected="false">Followings</button>
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
                    @if (Auth::user()->id === $user->id)
                        <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="about" role="tabpanel"
                            aria-labelledby="about-tab">
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
                    @endif
                    <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="post" role="tabpanel"
                        aria-labelledby="post-tab">
                        <div id="postsContainer">

                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="followes" role="tabpanel"
                        aria-labelledby="followes-tab">
                        <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                            content
                            the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's
                                associated content</strong>. Clicking another tab will toggle the visibility
                            of this one for the next. The tab JavaScript swaps classes to control the
                            content visibility and styling.</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="followings" role="tabpanel"
                        aria-labelledby="followings-tab">
                        <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                            content
                            the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's
                                associated content</strong>. Clicking another tab will toggle the visibility
                            of this one for the next. The tab JavaScript swaps classes to control the
                            content visibility and styling.</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="photos" role="tabpanel"
                        aria-labelledby="photos-tab">
                        <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder
                            content
                            the <strong class="font-medium text-gray-800 dark:text-white">dsafdsadsadas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script>
        function uploadCover(type) {
            var id = $('#user-id').val();
            var currentUserId = '{{ Auth::user()->id }}';

            if (id != currentUserId) {
                swal("Oops", "You do not have permission to update this profile.", "error");
                return;
            }

            var formData = new FormData();
            var fileInput_1 = $('#cover-img').get(0);
            var fileInput_2 = $('#avatar-img').get(0);

            if (type == 1) {
                formData.append('cover', fileInput_1.files[0]);
            } else {
                formData.append('avatar', fileInput_2.files[0]);
            }

            formData.append('type', type);

            if (fileInput_1.files.length > 0 || fileInput_2.files.length > 0) {
                $.ajax({
                    url: "{{ route('profile.edit.image', ['user' => ':id']) }}".replace(':id', id),
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

        function loadPosts() {
            var id = $('#user-id').val();
            $.ajax({
                url: "{{ route('profile.post', ['user' => ':id']) }}".replace(':id', id),
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var user_id = response.data.id
                    var name = response.data.name

                    const posts = response.data.posts;
                    const postsContainer = $('#postsContainer');
                    postsContainer.empty();
                    posts.forEach((post, index) => {
                        const isLongContent = post.body.length > 100; 
                        const postHtml = `
                            <div id="has-post" class="mx-5 rounded shadow mb-4 bg-white">
                                <div class="flex items-center gap-3 mb-1 px-3 py-3">
                                    <img src="https://tse4.mm.bing.net/th?id=OIP.JBpgUJhTt8cI2V05-Uf53AHaG1&pid=Api&P=0&h=220" class="w-[48px] h-[48px] rounded-full border border-2 cursor-pointer hover:border-blue-500" alt="">
                                    <div>
                                        <h3 class="font-bold text-lg hover:underline cursor-pointer"> <a href="/profile/${user_id}">${name}</a></h3>
                                        <p class="text-xs text-gray-500">${new Date(post.created_at).toLocaleString()}</p>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <p class="text-sm text-gray-500 overflow-hidden" style="max-height: ${isLongContent ? '2.5rem' : 'none'};" id="content-${index}" class="post-content">${post.body}</p>
                                    ${isLongContent ? `<button class="toggleBtn text-indigo-600 hover:text-indigo-500 font-semibold" data-index="${index}">Read more ...</button>` : ''}
                                </div>
                                <div class="grid grid-cols-2 gap-3 px-5 py-5">
                                    <img class="object-cover aspect-square" src="https://picsum.photos/1000" alt="">
                                    <img class="object-cover aspect-square" src="https://picsum.photos/1000" alt="">
                                    <div class="bg-blue-100 object-cover aspect-square flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-16">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <h1 class="text-slate-500 text-sm">Document.doc</h1>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 px-5 py-5">
                                    <button class="py-2 bg-gray-500 rounded-full flex-1 flex items-center justify-center gap-2 hover:bg-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                        </svg>
                                        <p class="text-sm text-slate-400">Like</p>
                                    </button>
                                    <button class="py-2 bg-gray-500 rounded-full flex-1 flex items-center justify-center gap-2 hover:bg-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                        </svg>
                                        <p class="text-sm text-slate-400">Comment</p>
                                    </button>
                                </div>
                            </div>
                        `;
                        postsContainer.append(postHtml);
                    })

                    $('.toggleBtn').on('click', function() {
                        const index = $(this).data('index');
                        const content = $('#content-' + index);
                        if (content.css('max-height') === 'none') {
                            content.css('max-height', '2.5rem');
                            $(this).text('Read more ...');
                        } else {
                            content.css('max-height', 'none');
                            $(this).text('Read less ...');
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });
        }

        $(document).ready(function() {

            loadPosts();

            const isOwnProfile = {{ Auth::user()->id === $user->id ? 'true' : 'false' }};
            const $tabs = $('[role="tab"]');
            const $tabPanels = $('[role="tabpanel"]');

            if (!isOwnProfile) {
                const $postTab = $('#post-tab');
                if ($postTab.length) {
                    $postTab.addClass('active')
                        .attr('aria-selected', 'true');

                    const $postPanel = $('#post');
                    if ($postPanel.length) {
                        $postPanel.removeClass('hidden')
                    }
                }
            }

            $tabs.on('click', function(e) {
                const $this = $(this);
                const target = $this.attr('data-tabs-target');
                const $panel = $(target);

                if (!$panel.length) return;

                $tabs.removeClass('active')
                    .attr('aria-selected', 'false');

                $tabPanels.addClass('hidden')
                    .removeClass('active');

                $this.addClass('active')
                    .attr('aria-selected', 'true');

                $panel.removeClass('hidden')
                    .addClass('active');
            });

            $('#cover-img').change(function() {
                uploadCover(1);
            });

            $('#avatar-img').change(function() {
                uploadCover(2);
            });

        });
    </script>
</x-app-layout>
