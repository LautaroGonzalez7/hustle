<template>
    <div class="wrapper">
        <div v-if="spinner" class="spinner-container">
            <div class="spinner-border spinner-size" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <Header></Header>

        <div class="main-panel">
            <div :class="`${spinner ? 'opacity-3' : 'opacity-10'} content`">
                <router-view
                    @showSpinner="showSpinner"
                    @hideSpinner="hideSpinner">
                </router-view>
            </div>
            <Footer></Footer>
        </div>
    </div>
</template>

<script lang="ts">
import Header from './Header.vue';
import Footer from './Footer.vue';
import Vue from "vue";
import Component from "vue-class-component";

@Component({
    components: {Header, Footer}
})

export default class MainContainer extends Vue {
    protected spinner: boolean = false;

    public showSpinner(){
        this.spinner = true;
    }

    public hideSpinner(){
        this.spinner = false;
    }
}
</script>
