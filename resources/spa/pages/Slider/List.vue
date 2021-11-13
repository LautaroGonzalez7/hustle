<template>
    <div class="page-inner">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(slider, index) in sliders">
                <td>{{index+1}}</td>
                <td>{{ slider.title }}</td>
                <td>
                    <a class="btn btn-info" :href="`app#/slider/${slider.id}/edit`"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts">
import Vue from "vue"
import Component from "vue-class-component";

import SliderApiClient from "../../services/api/requests/Slider";

@Component({
    components: {}
})

export default class extends Vue {
    protected sliders: any = [];

    protected sliderClient = new SliderApiClient();

    async mounted() {
        await this.getSliders();
    }

    private async getSliders() {
        const sliderResponse = await this.sliderClient.getAll();
        this.sliders = sliderResponse.data;
    }

}
</script>
