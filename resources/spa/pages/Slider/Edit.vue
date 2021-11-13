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
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="complement.name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="category">Categoría</label>
                                        <select class="form-control" v-model="complement.category_id" id="category">
                                            <option v-for="category in categories" :value="category.id">
                                                {{ category.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" class="form-control" id="price" v-model="complement.price">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Contenido</label>
                                        <textarea class="form-control" id="content"
                                                  v-model="complement.content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Editar</button>
                            <div class="alert alert-success mt-3" role="alert" v-if="successUpdate">
                                ¡Complemento editado exitosamente!
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

import ComplementApiClient from "../../services/api/requests/Complement";
import CategoryApiClient from "../../services/api/requests/Category";

@Component({
    components: {}
})

export default class extends Vue {
    protected complement: any = {};
    protected categories: any = [];

    protected successUpdate: boolean = false;
    protected failedUpdate: boolean = false;

    protected complementClient = new ComplementApiClient();
    protected categoryClient = new CategoryApiClient();

    async mounted() {
        await this.getComplement();
        await this.getCategories();
    }

    private async update() {
        const complementResponse = await this.complementClient.update(this.complement);

        if (!complementResponse.error) {
            this.successUpdate = true;
        }else{
            this.failedUpdate = true;
        }
    }

    private async getComplement() {
        let complementId = parseInt(this.$route.params['id']);
        const complementResponse = await this.complementClient.get(complementId);
        this.complement = complementResponse.data;
    }

    private async getCategories() {
        const categoryResponse = await this.categoryClient.getAll();
        this.categories = categoryResponse.data;
    }

}
</script>
