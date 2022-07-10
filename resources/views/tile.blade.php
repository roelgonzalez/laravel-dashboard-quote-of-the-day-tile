<x-dashboard-tile :position="$position" :refresh-interval="$refreshIntervalInSeconds">
    <div class="flex flex-col justify-center w-full h-full">
        <div>
            <div class="border-l-2 border-teal-300">
                <div class="relative h-full w-full">
                    <span class="absolute left-0 top-0 h-4 w-4 text-center ml-2">❝</span>
                    <div class="ml-8 mr-4 text-sm">
                        {{ $quote }}
                    </div>
                    <span class="absolute right-0 bottom-0 h-4 w-4 text-center">❞</span>
                </div>
            </div>
            <div class="mt-4 flex justify-center text-xs font-light">
                <div>- {{ $author }}</div>
            </div>
        </div>
    </div>
</x-dashboard-tile>
