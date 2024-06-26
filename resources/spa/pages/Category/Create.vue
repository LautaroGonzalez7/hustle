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
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="category.name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="scope">Sección</label>
                                        <select v-model="category.scope" class="form-control" id="scope">
                                            <option v-for="(scope, index) in scopes" :value="index">{{scope}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Crear</button>
                            <div class="alert alert-success mt-3" role="alert" v-if="successCreate">
                                ¡Categoría creada exitosamente!
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
import {Scopes} from "../../utils/constants/Scopes";

@Component({
    components: {}
})

export default class extends Vue {
    protected category: any = {
        name: '',
        scope: ''
    };

    protected scopes: any = Scopes;

    protected successCreate: boolean = false;
    protected failedCreate: boolean = false;

    protected categoryClient = new CategoryApiClient();

    private async create() {
        const categoryResponse = await this.categoryClient.create(this.category);
        this.category = {name: '', scope: ''};

        if (!categoryResponse.error) {
            this.successCreate = true;
        }else{
            this.failedCreate = true;
        }

        setTimeout(() => {
            this.successCreate = false;
        }, 2000)
    }

}
</script>
