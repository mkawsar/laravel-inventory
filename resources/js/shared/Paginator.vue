<template>
    <div class="text-center mt-6">
        <Component :is="link.url ? 'Link' : 'span'" v-for="link in links" v-html="link.label" class="px-1"
                   :href="link.url"
                   :class="{'text-gray-500' : !link.url, 'font-bold' : link.active}"/>
    </div>
</template>

<script>
export default {
    props: {
        links: Array
    }
}
</script>
