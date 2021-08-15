<template>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ this.$route.meta.title }}</div>
                    </div>
                    <form @submit.prevent="update">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="category.name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="scope">Sección</label>
                                        <input type="text" class="form-control" id="scope" v-model="category.scope">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Editar</button>
                            <div class="alert alert-success mt-3" role="alert" v-if="successUpdate">
                                ¡Categoría editada exitosamente!
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

import CategoryApiClient from "../../services/api/requests/Category";

@Component({
    components: {}
})

export default class extends Vue {
    protected category: any = {};

    protected successUpdate: boolean = false;
    protected failedUpdate: boolean = false;

    protected categoryClient = new CategoryApiClient();

    async mounted() {
        await this.getCategory();
    }

    private async getCategory() {
        let categoryId = parseInt(this.$route.params['id']);
        const categoryResponse = await this.categoryClient.get(categoryId);
        this.category = categoryResponse.data;
    }

    private async update() {
        const categoryResponse = await this.categoryClient.update(this.category);

        if (!categoryResponse.error) {
            this.successUpdate = true;
        }else{
            this.failedUpdate = true;
        }
    }

}
</script>
