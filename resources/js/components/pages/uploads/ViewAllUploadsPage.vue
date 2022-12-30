<template>
    <ul role="list" class="grid w-1/2 grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-1 xl:gap-x-8">
        <li v-for="upload in uploads" :key="upload.slug" class="relative">
            <div
                class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                <img :src="upload.url" alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
                <button type="button" class="absolute inset-0 focus:outline-none">
                    <span class="sr-only">View details for {{ upload.slug }}</span>
                </button>
            </div>
            <!-- <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{{ file.title }}</p>
            <p class="pointer-events-none block text-sm font-medium text-gray-500">{{ file.size }}</p> -->
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            uploads: {
                type: Array,
                required: true
            }
        },
    }
</script>