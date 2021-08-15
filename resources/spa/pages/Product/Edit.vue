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
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" class="form-control" id="price" v-model="product.price">
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="old_price">Precio anterior</label>
                                        <input type="number" class="form-control" id="old_price"
                                               v-model="product.old_price">
                                    </div>
                                </div>
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
