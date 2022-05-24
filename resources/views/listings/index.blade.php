<x-layout>
    <x-flash-message/>
        <x-Hero/>

        <main>
        <x-search/>
            <x-listing-section :listings="$listings"/>
        </main>

       <x-footer/>
</x-layout>

    
