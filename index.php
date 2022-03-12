<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes app</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="h-screen overflow-hidden bg-gray-100 flex flex-col">
        <main class="min-w-0 flex-1 border-t border-gray-200 flex min-h-0 overflow-hidden">
            <div class="min-h-0 flex-1 overflow-y-scroll bg-white h-full w-full flex">
                <div class="p-6 w-full flex flex-col">
                    <input type="text" class="text-lg font-medium text-gray-900 w-full mb-6" placeholder="Untitled note">

                    <textarea class="w-full mb-6 flex-1 outline-none" placeholder="Start writing..." autofocus></textarea>

                    <div>
                        <button class="text-sm text-gray-900">Delete note</button>
                    </div>
                </div>
            </div>

            <aside class="block flex-shrink-0 order-first h-full relative flex flex-col w-96 border-r border-gray-200 bg-gray-100">
                <div class="flex-shrink-0 h-16 bg-white px-6 flex flex-col justify-center">
                    <div class="flex justify-between space-x-3">
                        <div class="flex items-baseline">
                            <h2 class="text-lg font-medium text-gray-900 mr-3">
                                Notes
                            </h2>
                            <p class="text-sm font-medium text-gray-500"></p>
                        </div>
                        <button class="text-sm">New note</button>
                    </div>
                </div>

                <nav class="min-h-0 flex-1 overflow-y-auto">
                    <ul class="border-b border-gray-200 divide-y divide-gray-200">
                        <li class="relative bg-white py-5 px-6 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                            <div class="flex justify-between space-x-3">
                                <a href="#" class="block focus:outline-none">
                                    <span class="absolute inset-0"></span>
                                    <p class="text-sm text-gray-500 truncate">Note title</p>
                                </a>

                                <time class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">00:00</time>
                            </div>
                            <div class="mt-1">
                                <p class="text-sm text-gray-600">Body preview</p>
                            </div>
                        </li>
                    </ul>
                </nav>
            </aside>
        </main>
    </div>
</body>
</html>
