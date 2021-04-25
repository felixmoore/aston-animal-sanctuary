
{{-- From https://tailwindcomponents.com/component/danger-alert --}}
<div class="error-alert"> 
    <div class="bg-yellow-50 p-4 rounded flex items-start text-yellow-600 my-4 shadow-lg max-w-xl mx-auto">
        <div class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 1l-12 22h24l-12-22zm-1 8h2v7h-2v-7zm1 11.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>
        </div>
        <div class=" px-3">
            <h3 class="text-yellow-800 font-semibold tracking-wider">
                Warning 
            </h3>
            <ul class="list-disc list-inside pt-2 text-yellow-700">
                {{ $slot }}
            </ul>
        </div>
    </div>
    <br/>
</div>