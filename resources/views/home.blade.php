<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Styles -->
    <style>
        h1.ck-content {
            font-size: 28px;
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        h2.ck-content {
            font-size: 24px;
            color: #444;
            font-weight: bold;
            margin-bottom: 12px;
        }

        h3.ck-content {
            font-size: 20px;
            color: #555;
            font-weight: bold;
            margin-bottom: 10px;
        }

        ul.ck-content {
            list-style-type: disc;
            margin-left: 20px;
            padding-left: 20px;
        }

        ol.ck-content {
            list-style-type: decimal;
            margin-left: 20px;
            padding-left: 20px;
        }

        li.ck-content {
            margin-bottom: 5px;
        }

        a.ck-content {
            color: #007bff;
            text-decoration: underline;
        }

        .ck-content h1 {
            font-size: 28px;
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .ck-content h2 {
            font-size: 24px;
            color: #444;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .ck-content h3 {
            font-size: 20px;
            color: #555;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .ck-content ul {
            list-style-type: disc;
            margin-left: 20px;
            padding-left: 20px;
        }

        .ck-content ol {
            list-style-type: decimal;
            margin-left: 20px;
            padding-left: 20px;
        }

        .ck-content li {
            margin-bottom: 5px;
        }

        .ck-content a {
            color: #007bff;
            text-decoration: underline;
        }

        .comment-list {
            max-height: 500px;
            overflow-y: auto;
        }

        .comment-text {
            max-width: 100%;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .comment-container {
            width: 100%;
        }

        .comment-content {
            width: 100%;
        }

        .edit-comment-textarea {
            resize: vertical;
            min-height: 60px;
            line-height: 1.5;
            vertical-align: top;
        }
    </style>
</head>
<x-app-layout>

    <body class="font-sans antialiased">
        <div class="grid grid-cols-12 space-x-3 px-5 py-5">
            <div class="col-span-12 md:col-span-3 md:sticky md:top-0 md:self-start">
                <div class="py-5 bg-white rounded">
                    <div class="py-8">
                        <h2 class="text-2xl font-bold text-center">My Group</h2>
                    </div>

                    <div class="px-5 py-1 mb-4">
                        <input
                            class="w-full border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            type="text" placeholder="Find your group" name="" id="search-group">
                    </div>

                    {{-- <div id="no-group" class="text-gray-400 flex justify-center px-2">
                            Your are no joined to any group
                        </div> --}}

                    <div id="has-group" class="max-h-[500px] overflow-y-auto">
                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full" alt="">
                            <div>
                                <h3 class="font-bold text-lg">Conversation</h3>
                                <p class="text-xs text-gray-500">Get the same random image every time based on a seed,
                                    by adding /seed/{seed} to the start of the url.</p>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-span-12 md:col-span-6 pb-40">
                <div class="mb-3">
                    <div class="py-8">
                        <h2 class="text-2xl font-bold text-center">List Post</h2>
                    </div>

                    <div class="px-5 py-1 mb-4">
                        <div class="mt-2 mb-2">
                            <textarea id="new-post" name="about" rows="3" placeholder="Create new post" id="focus-post"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                        <div id="file-preview" class="mt-2 grid-cols-2 grid"></div>
                        <div class="btn-group flex gap-3 justify-end" style="display: none;">
                            <div class="relative">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Attechment</button>
                                <input data-type="1"
                                    class="btn-attechment w-[100px] pointer opacity-0 top-0 left-0 right-0 absolute px-2 py-1 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    type="file" multiple name="">
                            </div>
                            <button id="btn-save"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </div>

                    {{-- <div id="no-group" class="text-gray-400 flex justify-center px-2">
                            Your are no joined to any group
                        </div> --}}

                    <div id="postsContainer"></div>

                </div>
            </div>
            <div class="col-span-12 md:col-span-3 md:sticky md:top-0 md:self-start">
                <div class="py-5 bg-white rounded">
                    <div class="py-8">
                        <h2 class="text-2xl font-bold text-center">Following</h2>
                    </div>

                    <div class="px-5 py-1 mb-4">
                        <input
                            class="w-full border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            type="text" placeholder="Find your following" name="" id="search-following">
                    </div>

                    {{-- <div id="no-group" class="text-gray-400 flex justify-center px-2">
                            You don't have friend yet !
                        </div> --}}

                    <div id="has-group" class="max-h-[500px] overflow-y-auto">
                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mb-3 px-3 py-3 hover:bg-slate-600">
                            <img src="https://picsum.photos/100" class="w-[48px] h-[48px] rounded-full"
                                alt="">
                            <div>
                                <h3 class="font-bold text-md">Conversation</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="" id="post-id">
            <div id="modal-edit" style="display: none"
                class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Edit Post
                            </h3>
                            <button id="close-modal" type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="p-4 md:p-5 space-y-4">
                                <div class ="flex gap-3">
                                    <img src="" id="img-user"
                                        class="w-[48px] h-[48px] rounded-full border border-2 cursor-pointer hover:border-blue-500"
                                        alt="">
                                    <div>
                                        <h3 class="font-bold text-lg hover:underline cursor-pointer" id="name-user"><a
                                                href=""></a></h3>
                                        <p class="text-xs text-gray-500" id="created-post"></p>
                                    </div>
                                </div>
                                <textarea id="edit-post" rows="3" placeholder="Edit post"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex gap-3 justify-end mr-5">
                            <div class="relative">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Attechment</button>
                                <input data-type="2"
                                    class="btn-attechment w-[100px] pointer opacity-0 top-0 left-0 right-0 absolute px-2 py-1 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    type="file" multiple name="">
                            </div>
                            <button type="button" id="btn-edit-post"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
                        </div>
                        <div id="attachments-container" class="grid-cols-2 grid p-5 gap-5"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="image-modal"
            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
            <div class="relative w-2/3 h-4/5 flex items-center justify-center gap-5 bg-white p-5">
                <button id="prev-image"
                    class="bg-white rounded-full p-2 shadow-lg hover:bg-gray-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                </button>
                <div class="w-full h-full flex items-center justify-center overflow-hidden">
                    <img id="modal-image" class="max-w-full max-h-full object-contain" src=""
                        alt="">
                </div>
                <button id="close-modal-image"
                    class="absolute top-2 right-2 bg-gray-800 text-white px-3 py-1 rounded-full">X</button>
                <button id="next-image"
                    class="bg-white rounded-full p-2 shadow-lg hover:bg-gray-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>
        </div>
    </body>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    let editPost;
    let newPost;
    let images = [];
    let filesArray = [];

    function loadPosts() {
        $.ajax({
            url: '/post',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                const posts = response.data;
                const postsContainer = $('#postsContainer');
                postsContainer.empty();
                posts.forEach((post, index) => {
                    const isLongContent = post.body.length > 200;
                    const avatarPath = post.user.avatar_path ? `/storage/${post.user.avatar_path}` :
                        '/storage/uploads/avatars/user-default.webp';
                    const check = post.check_user ? '' : 'hidden';
                    const postHtml = `
                            <div id="has-post" class="mx-5 rounded shadow mb-4 bg-white">
                                <div class="flex items-center justify-between mb-1 px-3 py-3">
                                    <div class ="flex gap-3"> 
                                        <img src="${avatarPath}" class="w-[48px] h-[48px] rounded-full border border-2 cursor-pointer hover:border-blue-500" alt="">
                                        <div>
                                            <h3 class="font-bold text-lg hover:underline cursor-pointer"> <a href="/profile/${post.user.id}">${post.user.name}</a></h3>
                                            <p class="text-xs text-gray-500">${new Date(post.created_at).toLocaleString()}</p>
                                        </div>    
                                    </div>

                                    <div class="relative ${check}">
                                        <button data-post-id="${post.id}" class="show-option inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>

                                        <div id="post-options-${post.id}" class="post-options hidden absolute top-full right-0 mt-1 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                <li class= "mb-2">
                                                    <button data-post-id="${post.id}" class="edit-post flex items-center gap-3 w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>
                                                        <p class="text-sm text-gray-500">Edit</p>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button data-post-id="${post.id}" class="delete-post flex items-center gap-3 w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                        <p class="text-sm text-gray-500">Delete</p>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div id="content-${index}" style="max-height: ${isLongContent ? '4.5rem' : 'none'}; overflow: hidden;">
                                        <p class="text-sm text-gray-500 overflow-hidden"  class="post-content">${post.body}</p>    
                                    </div>
                                    ${isLongContent ? `<button class="toggleBtn text-indigo-600 hover:text-indigo-500 font-semibold" data-index="${index}">Read more ...</button>` : ''}
                                </div>
                                <div class="grid ${post.attechments.length == 1 ? 'grid-cols-1 justify-items-center align-items-center' : 'grid-cols-2'} post gap-1 px-2 py-2">    
                                ${post.attechments && post.attechments.length > 0 ? post.attechments.map(attechment => `
                                    <img class="post-image ${post.attechments.length == 1 ? 'w-1/2' : 'w-full'} object-cover aspect-square cursor-pointer" src="/storage/${attechment.path}" alt="">
                                `).join('') : ''}
                                </div>
                                <div class="flex items-center gap-2 px-2 py-2">
                                    <button data-post-id = "${post.id}" class="like-${post.id} like-button py-2 bg-gray-500 rounded-full flex-1 flex items-center justify-center gap-2 hover:bg-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                        </svg>
                                        <span class="like-text text-sm text-slate-400">${post.currentReaction ? 'Unlike' : 'Like'}</span>
                                        <span class="like-count text-sm text-slate-400">(${post.totalLike})</span>
                                    </button>
                                    <button data-post-id = "${post.id}" class="comment-button py-2 bg-gray-500 rounded-full flex-1 flex items-center justify-center gap-2 hover:bg-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                        </svg>
                                        <p class="text-sm text-slate-400">Comment</p>
                                    </button>
                                </div>
                                <div id="modal-comment-${post.id}" style="display:none" class="p-5">
                                    <div class="flex items-center justify-center gap-5">
                                        <textarea id="comment-${post.id}" name="comment" class="border-2 border-purple-600 p-2 w-full rounded" required></textarea>

                                        <button data-post-id = "${post.id}"   type="submit"
                                                class="send-comment bg-purple-700 text-white font-medium py-2 px-4 rounded hover:bg-purple-600">Comment
                                        </button>
                                    </div>

                                    <div id="comment-list-${post.id}" class="comment-list w-full space-y-4 mt-5">
                                        ${post.comments && post.comments.length > 0 ? post.comments.map(comment => `
                                            <div class="flex w-full full-comment">
                                                <div class="flex-shrink-0">
                                                    <img class="w-10 h-10 rounded-full border-2 cursor-pointer hover:border-blue-500" 
                                                        src="${comment.user.avatar_path || '/storage/uploads/avatars/user-default.webp'}" 
                                                        alt="${comment.user.name}'s avatar">
                                                </div>
                                                <div class="ml-3 flex-grow overflow-hidden">
                                                    <h3 class="font-bold text-lg hover:underline cursor-pointer">
                                                        <a href="/profile/${comment.user.id}">${comment.user.name}</a>
                                                    </h3>
                                                    <div class="text-xs text-gray-500">
                                                        Posted on ${new Date(comment.created_at).toLocaleString()}
                                                    </div>
                                                    <div class="comment-container mt-1">
                                                        <div class="comment-content">
                                                            <div class="comment-text text-base text-black-500 break-words">
                                                                <p>${comment.comment}</p>    
                                                            </div>
                                                            <div class="flex mt-2 space-x-3">
                                                                <button class="edit-comment text-blue-500 hover:text-blue-700" data-comment-id="${comment.id}">Edit</button>
                                                                <button class="delete-comment text-red-500 hover:text-red-700" data-comment-id="${comment.id}">Remove</button>
                                                                <button class="like-comment text-purple-500 hover:text-purple-700" data-comment-id="${comment.id}">
                                                                    <span class="like-comment-text text-sm text-slate-400">${comment.currentReaction ? 'Unlike' : 'Like'}</span>
                                                                    <span class="like-comment-count text-sm text-slate-400">(${comment.total})</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        `).join('') : ''}
                                    </div>

                                </div>
                            </div>
                        `;
                    postsContainer.append(postHtml);
                })

                $('.toggleBtn').on('click', function() {
                    const index = $(this).data('index');
                    const content = $('#content-' + index);
                    if (content.css('max-height') === 'none') {
                        content.css('max-height', '4.5rem');
                        $(this).text('Read more ...');
                    } else {
                        content.css('max-height', 'none');
                        $(this).text('Read less ...');
                    }
                });

                $('.show-option').on('click', function(e) {
                    e.stopPropagation();
                    const postId = $(this).data('post-id');
                    $('.post-options').not(`#post-options-${postId}`).addClass('hidden');
                    $(`#post-options-${postId}`).toggleClass('hidden');
                });

                $('.edit-post').on('click', function() {
                    const postId = $(this).data('post-id');
                    showEditModal(postId);
                });

                $('.delete-post').on('click', function() {
                    const postId = $(this).data('post-id');
                    swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                deletePost(postId);
                            } else {

                            }
                        });
                });
            },

            error: function(xhr) {

            }
        });
    }

    function renderImages(type) {
        if (type == 1) {
            var previewContainer = $('#file-preview');
            previewContainer.html('');
        } else {
            var previewContainer = $('#attachments-container');
            previewContainer.html('');
        }

        // Hiển thị các ảnh đã chọn với nút xóa
        images.forEach(function(image, index) {
            var imageWrapper = $('<div>').addClass('relative');
            var imgTag = $('<img>').attr('src', image).addClass('w-full rounded-lg border');

            // Tạo nút xóa
            var deleteButton = $('<button>')
                .addClass('absolute top-1 right-1 bg-red-600 text-white px-3 py-1 rounded-full text-sm')
                .text('X')
                .attr('data-index', index) // Gắn index của ảnh để dễ xóa
                .on('click', function() {
                    deleteImage($(this).attr('data-index'), type);
                });

            imageWrapper.append(imgTag).append(deleteButton);
            previewContainer.append(imageWrapper);
        });
    }

    function deleteImage(index, type) {
        images.splice(index, 1); // Xóa ảnh khỏi mảng URL
        filesArray.splice(index, 1); // Xóa file khỏi mảng file
        renderImages(type); // Cập nhật lại danh sách ảnh hiển thị
    }

    function showEditModal(id) {
        $.ajax({
            url: '/post/edit/' + id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                const avatarPath = response.data.user.avatar_path ?
                    `/storage/${response.data.user.avatar_path}` :
                    'storage/uploads/avatars/user-default.webp';
                var created_at = new Date(response.data.created_at).toLocaleString()

                $('#img-user').attr('src', avatarPath);
                $('#name-user a').text(response.data.user.name);
                $('#name-user a').attr('href', '/user/profile/' + response.data.user.id);
                $('#created-post').text(created_at);
                $('#edit-post').val(response.data.body);
                $('#post-id').val(response.data.id);

                const attachmentsContainer = $('#attachments-container');
                attachmentsContainer.empty();

                if (response.data.attechments && response.data.attechments.length > 0) {
                    images = [];
                    filesArray = [];
                    response.data.attechments.forEach(attechment => {
                        images.push(`/storage/${attechment.path}`);
                    })
                }

                renderImages(2);

                if (editPost) {
                    editPost.destroy()
                        .then(() => {
                            ClassicEditor
                                .create(document.querySelector('#edit-post'))
                                .then(newEditor => {
                                    editPost = newEditor;
                                })
                                .catch(error => {

                                });
                        })
                        .catch(error => {

                        });
                } else {
                    ClassicEditor
                        .create(document.querySelector('#edit-post'))
                        .then(newEditor => {
                            editPost = newEditor;
                        })
                        .catch(error => {

                        });
                }

                $('#modal-edit').show();
            }
        })
    }

    function deletePost(id) {
        $.ajax({
            url: '/post/destroy/' + id,
            method: 'POST',
            dataType: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status == 'success') {
                    swal("Good job!", response.message, response.status);
                    loadPosts();
                } else {

                }
            },
            error: function(xhr, status, error) {
                swal("Oops", "Something went wrong!", "error")
            }
        })
    }

    $(document).ready(function() {

        loadPosts()

        $('#close-modal').on('click', function() {
            $('#modal-edit').hide();
        })

        $(document).on('click', '.like-button', function() {
            var postId = $(this).data('post-id');
            var type = 'like';

            $.ajax({
                url: `/post/reaction/${postId}`,
                type: 'POST',
                data: {
                    post_id: postId,
                    type: type,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    const likeButton = $(`.like-${postId}`);
                    const likeText = likeButton.find('.like-text');
                    const likeCount = likeButton.find('.like-count');

                    likeText.text(response.currentReaction ? 'Unlike' : 'Like');
                    likeCount.text(`(${response.totalLike})`);
                },
                error: function(xhr, status, error) {

                }
            });
        });

        $(document).on('click', '.comment-button', function() {
            var postId = $(this).data('post-id');
            $('#modal-comment-' + postId).toggle();
        });

        $(document).on('click', '.send-comment', function() {
            var postId = $(this).data('post-id');
            var comment = $('#comment-' + postId).val();
            $.ajax({
                url: `/post/comment/${postId}`,
                type: 'POST',
                data: {
                    post_id: postId,
                    comment: comment,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    var newComment = `
                                            <div class="flex w-full full-comment">
                                                <div class="flex-shrink-0">
                                                    <img class="w-10 h-10 rounded-full border-2 cursor-pointer hover:border-blue-500" 
                                                        src="${response.data.user.avatar_path || '/storage/uploads/avatars/user-default.webp'}" 
                                                        alt="${response.data.user.name}'s avatar">
                                                </div>
                                                <div class="ml-3 flex-grow overflow-hidden">
                                                    <h3 class="font-bold text-lg hover:underline cursor-pointer">
                                                        <a href="/profile/${response.data.user.id}">${response.data.user.name}</a>
                                                    </h3>
                                                    <div class="text-xs text-gray-500">
                                                        Posted on ${new Date(response.data.created_at).toLocaleString()}
                                                    </div>
                                                    <div class="comment-container mt-1">
                                                        <div class="comment-content">
                                                            <div class="comment-text text-base text-black-500 break-words">
                                                                <p>${response.data.comment}</p>    
                                                            </div>
                                                            <div class="flex mt-2 space-x-3">
                                                                <button class="edit-comment text-blue-500 hover:text-blue-700" data-comment-id="${response.data.id}">Edit</button>
                                                                <button class="delete-comment text-red-500 hover:text-red-700" data-comment-id="${response.data.id}">Remove</button>
                                                                <button class="like-comment text-purple-500 hover:text-purple-700" data-comment-id="${response.data.id}">
                                                                    <span class="like-comment-text text-sm text-slate-400">Like</span>
                                                                    <span class="like-comment-count text-sm text-slate-400">(0)</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                    `;
                    $('#comment-list-' + postId).prepend(newComment);
                    $('#comment-' + postId).val('');
                },
                error: function(xhr, status, error) {

                }
            });
        });

        $(document).on('click', '.edit-comment', function() {
            $('.comment-container').each(function() {
                var container = $(this);
                if (container.find('.edit-comment-textarea').length > 0) {
                    var originalText = container.find('.edit-comment-textarea').val();
                    container.find('.comment-content').html(`
                        <div class="comment-text mt-1 text-base text-black-500">
                            <p>${originalText}</p>
                        </div>
                        <div class="flex">
                            <button class="edit-comment text-blue-500 hover:text-blue-700" data-comment-id="${container.find('.edit-comment-textarea').data('comment-id')}">Edit</button>
                            <button class="delete-comment text-red-500 hover:text-red-700 ml-3" data-comment-id="${container.find('.edit-comment-textarea').data('comment-id')}">Remove</button>
                            <button class="like-comment text-purple-500 hover:text-purple-700 ml-3" data-comment-id="${container.find('.edit-comment-textarea').data('comment-id')}">Like</button>
                        </div>
                    `);
                }
            });

            var commentContainer = $(this).closest('.comment-container');
            var commentId = $(this).data('comment-id');
            var commentText = commentContainer.find('.comment-text').text();
            commentContainer.find('.comment-content').html(`
                <textarea class="edit-comment-textarea w-full p-2 border rounded" rows="3" style="vertical-align: top;" id="comment-edit-${commentId}">${commentText.trim()}</textarea>
                <div class="mt-2">
                    <button class="save-edit bg-purple-700 text-white font-medium py-2 px-4 rounded hover:bg-purple-600" data-comment-id="${commentId}">Lưu</button>
                    <button class="cancel-edit bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 ml-2" data-comment-id="${commentId}">Hủy</button>
                </div>
            `);
        });

        $(document).on('click', '.cancel-edit', function() {
            var commentId = $(this).data('comment-id');
            var commentContainer = $(this).closest('.comment-container');
            var commentText = commentContainer.find('.edit-comment-textarea').val();
            commentContainer.find('.comment-content').html(`
                <div class="comment-text mt-1 text-base text-black-500">${commentText}</div>
                <div class="flex">
                    <button class="edit-comment text-blue-500 hover:text-blue-700" data-comment-id="${commentId}">Edit</button>
                    <button class="delete-comment text-red-500 hover:text-red-700 ml-3" data-comment-id="${commentId}">Delete</button>
                    <button class="like-comment text-purple-500 hover:text-purple-700 ml-3" data-comment-id="${commentId}">Like</button>
                </div>
            `);
        });

        $(document).on('click', '.save-edit', function() {
            var commentId = $(this).data('comment-id');
            var comment = $('#comment-edit-' + commentId).val();
            var commentContainer = $(this).closest('.comment-container');
            $.ajax({
                url: `/post/comment/update/${commentId}`,
                type: 'POST',
                data: {
                    comment_id: commentId,
                    content: comment,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    commentContainer.find('.comment-content').html(`
                        <div class="comment-text mt-1 text-base text-black-500">${response.data.comment}</div>
                        <div class="flex">
                            <button class="edit-comment text-blue-500 hover:text-blue-700" data-comment-id="${commentId}">Edit</button>
                            <button class="delete-comment text-red-500 hover:text-red-700 ml-3" data-comment-id="${commentId}">Remove</button>
                            <button class="like-comment text-purple-500 hover:text-purple-700 ml-3" data-comment-id="${commentId}">Like</button>
                        </div>
                    `);
                },
                error: function(xhr, status, error) {

                }
            });
        });

        $(document).on('click', '.delete-comment', function() {
            var commentId = $(this).data('comment-id');
            var commentContainer = $(this).closest('.full-comment');
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: `/post/comment/destroy/${commentId}`,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    commentContainer.remove();
                                }
                            },
                            error: function(xhr, status, error) {

                            }
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        });

        $(document).on('click', '.like-comment', function() {
            var commentId = $(this).data('comment-id');
            var commentContainer = $(this).closest('.comment-container');
            var type = 'like';
            var likeButton = $(this);
            console.log(likeButton);
            $.ajax({
                url: `/post/comment/like/${commentId}`,
                type: 'POST',
                data: {
                    type: type,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    const likeText = likeButton.find('.like-comment-text');
                    console.log(likeText);

                    const likeCount = likeButton.find('.like-comment-count');
                    console.log(likeCount);

                    likeText.text(response.currentReaction ? 'Unlike' : 'Like');
                    likeCount.text(`(${response.total})`);

                },
                error: function(xhr, status, error) {

                }
            });
        });

        


        var currentImageIndex = 0;
        var imagesPost = [];

        // Gán sự kiện click cho mỗi ảnh trong bài post
        $(document).on('click', '.post-image', function() {
            // Lưu tất cả ảnh của bài post vào mảng images
            imagesPost = $(this).closest('.post').find('img').map(function() {
                return $(this).attr('src');
            }).get();

            // Lấy chỉ số của ảnh hiện tại
            currentImageIndex = $(this).index();
            // Hiển thị modal với ảnh được click
            $('#modal-image').attr('src', imagesPost[currentImageIndex]);
            $('#image-modal').removeClass('hidden').addClass('flex');
        });

        // Đóng modal
        $('#close-modal-image').on('click', function() {
            $('#image-modal').removeClass('flex').addClass('hidden');
        });

        // Nút "Next" để xem ảnh kế tiếp
        $('#next-image').on('click', function() {
            currentImageIndex = (currentImageIndex + 1) % imagesPost.length; // Quay lại ảnh đầu nếu hết
            $('#modal-image').attr('src', imagesPost[currentImageIndex]);
        });

        // Nút "Previous" để xem ảnh trước đó
        $('#prev-image').on('click', function() {
            currentImageIndex = (currentImageIndex - 1 + imagesPost.length) % imagesPost
                .length; // Quay về ảnh cuối nếu đang ở đầu
            $('#modal-image').attr('src', imagesPost[currentImageIndex]);
        });

        $('.btn-attechment').on('change', function(event) {
            var files = event.target.files;
            var type = $(this).data('type');

            if (type == 1) {
                var previewContainer = $('#file-preview');
            } else {
                var previewContainer = $('#attachments-container');
            }

            // Lặp qua từng file đã chọn
            Array.from(files).forEach(file => {
                // Kiểm tra nếu file là hình ảnh
                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    // Khi file được đọc xong
                    reader.onload = function(e) {
                        images.push(e.target.result); // Thêm URL ảnh vào mảng
                        filesArray.push(file); // Thêm file thực tế vào mảng

                        if (type == 1) {
                            renderImages(1);
                        } else {
                            renderImages(2);
                        }
                    }

                    reader.readAsDataURL(file);
                }
            });

        });


        ClassicEditor
            .create(document.querySelector('#new-post'))
            .then(newEditor => {
                newPost = newEditor;
                newPost.model.document.on('change:data', () => {
                    if (newPost.getData() !== '') {
                        $('.btn-group').show();
                    } else {
                        $('.btn-group').hide();
                    }
                });

                newPost.editing.view.document.on('focus', () => {
                    $('.btn-group').show();
                });

                newPost.editing.view.document.on('blur', () => {
                    if (newPost.getData().trim() === "") {
                        $('.btn-group').hide();
                    }
                });
            })
            .catch(error => {

            });



        $('#btn-save').on('click', function() {

            const value = newPost.getData();

            const body = value
                .replace(/<h1>/g, '<h1 class="ck-content">')
                .replace(/<h2>/g, '<h2 class="ck-content">')
                .replace(/<h3>/g, '<h3 class="ck-content">')
                .replace(/<ul>/g, '<ul class="ck-content">')
                .replace(/<li>/g, '<li class="ck-content">')
                .replace(/<ol>/g, '<ol class="ck-content">');

            let formData = new FormData();
            formData.append('body', body);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            filesArray.forEach(function(file, index) {
                formData.append('arrayImage[]', file);
            });

            $.ajax({
                url: '/post/store',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    swal("Good job!", response.message, response.status);
                    $('#new-post').val('');
                    newPost.setData('');
                    var previewContainer = $('#file-preview');
                    previewContainer.html('');
                    images = [];
                    filesArray = [];
                    loadPosts();
                },
                error: function(xhr, status, error) {
                    swal("Oops", "Something went wrong!", "error")
                }
            });
        });

        $('#btn-edit-post').on('click', function() {

            const value = editPost.getData();

            const body = value
                .replace(/<h1>/g, '<h1 class="ck-content">')
                .replace(/<h2>/g, '<h2 class="ck-content">')
                .replace(/<h3>/g, '<h3 class="ck-content">')
                .replace(/<ul>/g, '<ul class="ck-content">')
                .replace(/<li>/g, '<li class="ck-content">')
                .replace(/<ol>/g, '<ol class="ck-content">');

            var id = $('#post-id').val();

            let formData = new FormData();
            formData.append('body', body);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            filesArray.forEach(function(file, index) {
                formData.append('arrayImage[]', file);
            });

            images.forEach(function(image, index) {
                formData.append('arrayPath[]', image);
            })

            $.ajax({
                url: '/post/update/' + id,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    swal("Good job!", response.message, response.status);
                    $('#edit-post').val('');
                    $('#modal-edit').hide();
                    loadPosts();
                    images = [];
                    filesArray = [];
                },
                error: function(xhr, status, error) {
                    swal("Oops", "Something went wrong!", "error")
                }
            });
        });

    });
</script>

</html>
