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
        h1.ck-content  {
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

        h3.ck-content  {
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

        .ck-content li{
            margin-bottom: 5px;
        }

        .ck-content a {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>
<x-app-layout>
    <body class="font-sans antialiased">
        <div class="grid grid-cols-12 space-x-3 px-5 py-5">
            <div class="col-span-12 md:col-span-3 ">
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
                        <div class="btn-group flex gap-3 justify-end" style="display: none;">
                            <div class="relative">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Attechment</button>
                                <input
                                    class="w-[100px] pointer opacity-0 top-0 left-0 right-0 absolute px-2 py-1 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                    type="file" name="" id="btn-attechment">
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
            <div class="col-span-12 md:col-span-3">
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
                        <div
                            class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="button" id="btn-edit-post"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    let editPost;
    let newPost;

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
                    console.log(isLongContent);
                    const avatarPath = post.user.avatar_path ? `/storage/${post.user.avatar_path}` :
                        'storage/uploads/avatars/user-default.webp';
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
                console.log(xhr);
            }
        });
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

                if (editPost) {
                    editPost.destroy()
                        .then(() => {
                            ClassicEditor
                                .create(document.querySelector('#edit-post'))
                                .then(newEditor => {
                                    editPost = newEditor;
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        })
                        .catch(error => {
                            console.error('Error while destroying CKEditor:', error);
                        });
                } else {
                    ClassicEditor
                        .create(document.querySelector('#edit-post'))
                        .then(newEditor => {
                            editPost = newEditor;
                        })
                        .catch(error => {
                            console.error(error);
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
                console.error(error);
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

            $.ajax({
                url: '/post/store',
                method: 'POST',
                data: {
                    body: body,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    swal("Good job!", response.message, response.status);
                    $('#new-post').val('');
                    newPost.setData('');
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

            $.ajax({
                url: '/post/update/' + id,
                method: 'POST',
                data: {
                    body: body,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    swal("Good job!", response.message, response.status);
                    $('#edit-post').val('');
                    $('#modal-edit').hide();
                    loadPosts();
                },
                error: function(xhr, status, error) {
                    swal("Oops", "Something went wrong!", "error")
                }
            });
        });

    });
</script>

</html>
