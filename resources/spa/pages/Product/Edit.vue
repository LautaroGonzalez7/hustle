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
                                        <input type="text" class="form-control" id="name" v-model="product.name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Codigo</label>
                                        <input type="text" class="form-control" id="name" v-model="product.code">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" class="form-control" id="price" v-model="product.price">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="old_price">Precio anterior</label>
                                        <input type="number" class="form-control" id="old_price"
                                               v-model="product.old_price">
                                    </div>
                                </div>
                            </div>
                            <template v-for="(timestamp, index) in sectionCategoryInputs">
                                <div class="row">
                                    <div :class="`col-md-${index > 0 ? '5' : 6} col-lg-${index > 0 ? '5' : 6}`">
                                        <div class="form-group">
                                            <label :for="`scope${timestamp}`">Seccion</label>
                                            <select class="form-control" v-model="selectedScopes[timestamp]" :id="`scope${timestamp}`">
                                                <option v-for="(scope, index) in scopes" :value="index">
                                                    {{ scope }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div :class="`col-md-${index > 0 ? '5' : 6} col-lg-${index > 0 ? '5' : 6}`">
                                        <div class="form-group">
                                            <label :for="`category${timestamp}`">Categoría</label>
                                            <select class="form-control" v-model="selectedCategories[timestamp]" :id="`category${timestamp}`">
                                                <option v-for="category in getFilteredCategoriesByScope(timestamp)" :value="category.id">
                                                    {{ category.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-lg-2" v-if="index > 0">
                                        <div class="form-group">
                                            <label></label>
                                            <button class="form-control btn btn-danger mt-1" @click="deleteSectionCategoryInput(timestamp)">
                                                Eliminar <i class="fa fa-trash ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="category">Categoría</label>
                                        <select class="form-control" v-model="product.category_id" id="category">
                                            <option v-for="category in categories" :value="category.id">
                                                {{ category.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group d-flex">
                                        <label for="highlight">Destacado</label>
                                        <input type="checkbox" class="ml-3" id="highlight"
                                               v-model="product.highlight">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="content">Contenido</label>
                                        <textarea class="form-control" id="content"
                                                  v-model="product.content"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Editar</button>
                            <div class="alert alert-success mt-3" role="alert" v-if="successUpdate">
                                ¡Producto editado exitosamente!
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

import ProductApiClient from "../../services/api/requests/Product";
import CategoryApiClient from "../../services/api/requests/Category";

@Component({
    components: {}
})

export default class extends Vue {
    protected product: any = {};
    protected categories: any = [];

    protected successUpdate: boolean = false;
    protected failedUpdate: boolean = false;

    protected productClient = new ProductApiClient();
    protected categoryClient = new CategoryApiClient();

    async mounted() {
        await this.getProduct();
        await this.getCategories();
    }

    private async update() {
        const productResponse = await this.productClient.update(this.product);

        if (!productResponse.error) {
            this.successUpdate = true;
        }else{
            this.failedUpdate = true;
        }
    }

    private async getProduct() {
        let productId = parseInt(this.$route.params['id']);
        const productResponse = await this.productClient.get(productId);
        this.product = productResponse.data;
    }

    private async getCategories() {
        const categoryResponse = await this.categoryClient.getAll();
        this.categories = categoryResponse.data;
    }

}
</script>
