<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script lang="ts">
import Vue from "vue"
import Component from "vue-class-component";

@Component({
    watch: {
        '$route'(to, from) {
            document.title = to.meta.title || 'Teen'
        }
    },
})

export default class App extends Vue {
}
</script>
