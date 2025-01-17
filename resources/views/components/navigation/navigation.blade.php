<div>
    <ul class="flex flex-col gap-2 justify-center p-8">
        @foreach ($links as $link)
            <x-navigation.link-icons
                :text="$link['text']"
                :icon="$link['icon']"
                :url="route($link['route'])"
            />
        @endforeach
    </ul>
</div>
