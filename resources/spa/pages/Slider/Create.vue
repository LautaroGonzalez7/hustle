<template>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ this.$route.meta.title }}</div>
                    </div>
                    <form @submit.prevent="create">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" v-model="slider.title">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="subtitle">Subtítulo</label>
                                        <input type="text" class="form-control" id="subtitle" v-model="slider.subtitle">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="link">Link</label>
                                        <input type="text" class="form-control" id="link" v-model="slider.link">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="active">Activo</label>
                                        <input type="checkbox" class="form-control" id="active" v-model="slider.active">
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="images">Imágenes</label>
                                        <input type="file" class="form-control" id="images" multiple
                                               @change="onFileChange($event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Crear</button>
                            <div class="alert alert-success mt-3" role="alert" v-if="successCreate">
                                ¡Slider creado exitosamente!
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    protected slider: any = {
        title: '',
        subtitle: '',
        link: '',
        active: true
    };
    protected images: any = [];

    protected successCreate: boolean = false;
    protected failedCreate: boolean = false;

    protected sliderClient = new SliderApiClient();

    private async create() {
        const sliderResponse = await this.sliderClient.create(this.slider);

        if (!sliderResponse.error) {
            this.successCreate = true;
            this.slider = {
                title: '',
                subtitle: '',
                link: '',
                active: true
            };

            await this.addImages(sliderResponse.data.data.id);
        } else {
            this.failedCreate = true;
        }
    }

    private async addImages(sliderId: number) {
        const sliderResponse = await this.sliderClient.addImages(sliderId, this.images);

        if (!sliderResponse.error) {
            this.successCreate = true;
        } else {
            this.failedCreate = true;
        }
    }

    private onFileChange(e: any) {
        let files = e.target.files || e.dataTransfer.files;

        let formData = new FormData();
        for (let i = 0; i < files.length; i++) {
            formData.append('images[]', files[i], files[i].name);
        }

        this.images = formData;
    }

}
</script>
