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
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="images">Imágenes</label>
                                        <input type="file" class="form-control" ref="images" multiple
                                               @change="onFileChange($event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success">Crear</button>
                            <div class="alert alert-success mt-3" role="alert" v-if="successCreate">
                                ¡Producto creado exitosamente!
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
    protected product: any = {
        name: '',
        price: '',
        old_price: '',
        content: '',
        category_id: ''
    };
    protected images: any = [];
    protected categories: any = [];

    protected successCreate: boolean = false;
    protected failedCreate: boolean = false;

    protected categoryClient = new CategoryApiClient();

    async mounted() {
        await this.getCategories();
    }

    private async create() {
        const productClient = new ProductApiClient();
        const productResponse = await productClient.create(this.product);

        if (!productResponse.error) {
            this.product = {
                name: '',
                price: '',
                old_price: '',
                content: '',
                category_id: ''
            };

            await this.addImages(productResponse.data.data.id);

            this.images = [];
        } else {
            this.failedCreate = true;
        }

        setTimeout(() => {
            this.successCreate = false;
        }, 2000)
    }

    private async addImages(productId: number) {
        const productClient = new ProductApiClient();
        const imageResponse = await productClient.addImages(productId, this.images);

        if (!imageResponse.error) {
            this.successCreate = true;
        } else {
            this.failedCreate = true;
        }

        (this.$refs['images'] as any).value = '';
    }

    private async getCategories() {
        const categoryResponse = await this.categoryClient.getAll();
        this.categories = categoryResponse.data;
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
