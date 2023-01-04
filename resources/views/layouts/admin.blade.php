<!DOCTYPE html>
<html lang="en">
<head>
    <title>Another-Vunerable-Web</title>
    <meta name="referrer" content="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
</head>
<body>
    <!-- This example requires Tailwind CSS v2.0+ -->
    
    <div class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->

        <!-- Static sidebar for desktop -->
        <div class="flex flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col h-0 flex-1 bg-gray-800">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4 text-white text-xl font-medium">
                            AVW Administration
                        </div>
                        <nav class="mt-5 flex-1 px-2 bg-gray-800 space-y-1">
                            <?php
                            $url= $_SERVER['REQUEST_URI'];
                            //echo $url;
                            ?>
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('admin/listusers') }}" class="<?php if($url=='/admin/listusers') {echo 'bg-gray-900 text-white';} else echo 'text-gray-300 hover:bg-gray-700 hover:text-white';?> group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <!-- Heroicon name: outline/users -->
                                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Users
                            </a>
                            <a href="{{ route('admin/listloan') }}" class="<?php if($url=='/admin/listloan') {echo 'bg-gray-900 text-white';} else echo 'text-gray-300 hover:bg-gray-700 hover:text-white';?> group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                <!-- Heroicon name: outline/folder -->
                                <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Loan Request
                            </a>
                        </nav>
                    </div>
                    <div class="flex-shrink-0 flex bg-gray-700 p-4">
                        <a href="#" class="flex-shrink-0 w-5/6 group block">
                            <div class="flex ">
                                <div class="flex items-center left-0">

                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-white">
                                           {{ Auth::User()->name }}
                                        </p>
                                        <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">
                                            View profile
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="flex-none right-0 w-1/6" href="{{ route('admin/logout') }}">
                            <div>
                                <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"/></svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            @yield('content')
        </div>
    </div>

    
</body>
</html>