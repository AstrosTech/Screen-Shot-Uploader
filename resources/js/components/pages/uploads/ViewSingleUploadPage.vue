<template>
    <div class="flex justify-center align-center">
        <div class="overflow-hidden rounded-lg bg-white shadow w-full sm:w-4/5 lg:w-3/5 2xl:w-2/4">
            <div class="px-4 py-5 sm:p-6">
                <img 
                    class="w-full"
                    :src="url"
                    alt="Placeholder"
                >
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                required: true,
            },
        },

        mounted() {
            console.log(this.url);
        }
    }
</script>