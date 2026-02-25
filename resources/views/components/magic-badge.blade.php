<div x-data="{ open: true }"
     x-show="open"
     class="fixed bottom-4 right-4 z-50">

    <button @click="open = false"
            class="absolute -top-2 -right-2 w-4 h-4 text-xs bg-gray-200 text-gray-500 rounded-full flex items-center justify-center shadow border border-blue-200">
        ×
    </button>

    <a target="_blank"
       href="https://www.magicpatterns.com/c/8mbbnevwtmuxcmmahzryoy"
       class="flex items-center gap-2 px-3 py-2 border border-blue-200 rounded shadow bg-gradient-to-r from-gray-50 to-indigo-50 hover:shadow-lg transition">

        <img src="https://www.magicpatterns.com/MP_logo.png"
             class="h-4"
             alt="Magic Patterns">

        <span class="text-sm font-light text-slate-800">
            Built with Magic Patterns
        </span>
    </a>
</div>