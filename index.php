<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes app</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body>
    <span
        x-data="{
            init() {
                console.log(this.$store.notes.data)
            }
        }"
    >

    </span>
    <div class="h-screen overflow-hidden bg-gray-100 flex flex-col">
        <main class="min-w-0 flex-1 border-t border-gray-200 flex min-h-0 overflow-hidden">
            <div class="min-h-0 flex-1 overflow-y-scroll bg-white h-full w-full flex">
                <div x-data class="p-6 w-full flex flex-col">
                    <input x-model="$store.notes.current.title"
                           @keyup.debounce.200ms="$store.notes.touchCurrentNote()" type="text"
                           class="text-lg font-medium text-gray-900 w-full mb-6" placeholder="Untitled note">

                    <textarea x-model="$store.notes.current.body"
                              @keyup.debounce.200ms="$store.notes.touchCurrentNote()"
                              class="w-full mb-6 flex-1 outline-none" placeholder="Start writing..."
                              autofocus></textarea>

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
                    <ul x-data class="border-b border-gray-200 divide-y divide-gray-200">
                        <template x-for="note in $store.notes.data" :key="note.id">
                            <li class="relative bg-white py-5 px-6 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                                <div class="flex justify-between space-x-3">
                                    <a href="#" class="block focus:outline-none">
                                        <span class="absolute inset-0"></span>
                                        <p x-text="note.title || 'Untitled Note'" class="text-sm text-gray-500 truncate"></p>
                                    </a>

                                    <time x-text="`${new Date(note.lastEdited).toLocaleTimeString()}`" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500"></time>
                                </div>
                                <div class="mt-1">
                                    <p x-text="note.body.length > 100 ? note.body.substring(0, 100) + '...' : note.body" class="text-sm text-gray-600"></p>
                                </div>
                            </li>
                        </template>
                    </ul>
                </nav>
            </aside>
        </main>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('notes', {
                data: [
                    // { id: 1, title: 'Existing Note', body: 'A new body'},
                    // { id: 2, title: 'Another Existing Note', body: 'A new body'},
                ],
                currentNoteId: null,

                get current() {
                    return this.data.find(n => n.id === this.currentNoteId);
                },

                createNote() {
                    let id = Date.now();

                    this.data = [{id, title: '', body: '', lastEdited: 0}, ...this.data];

                    this.currentNoteId = id;

                    this.touchCurrentNote();
                },

                touchCurrentNote() {
                    this.current.lastEdited = Date.now();
                },

                setCurrentNoteByIndex(index) {
                    this.currentNoteId = this.data[index].id;
                },

                init() {
                    // don't create note if notes exist
                    if (this.data.length) {
                        this.setCurrentNoteByIndex(0);
                    }
                    else {
                        this.createNote()
                    }
                },

            });
        });
    </script>
</body>
</html>
