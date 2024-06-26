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
                                <div class="col-md-12 col-lg-12">
                                    <div class="d-flex">
                                        <div class="form-group d-flex align-items-center" role="button" @click="pushSectionCategoryInput()">
                                            <h4 class="m-0">Agregar otra seccion</h4>
                                            <i class="ml-2 fa fa-plus"></i>
                                        </div>
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
import {Scopes} from "../../utils/constants/Scopes";

@Component({
    components: {}
})

export default class extends Vue {
    protected product: any = {
        name: '',
        code: '',
        price: '',
        old_price: '',
        content: '',
        highlight: false,
    };
    protected images: any = [];
    protected categories: any = [];

    protected scopes: any = Scopes;
    protected selectedScopes: any = {};
    protected selectedCategories: any = {};
    protected sectionCategoryInputs: number[] = [Date.now()];

    protected successCreate: boolean = false;
    protected failedCreate: boolean = false;

    protected categoryClient = new CategoryApiClient();

    async mounted() {
        await this.getCategories();
    }

    private async create() {
        const productClient = new ProductApiClient();

        const preparedProduct = {
          name: this.product.name,
          code: this.product.code,
          price: this.product.price,
          old_price: this.product.old_price,
          content: this.product.content,
          highlight: this.product.highlight,
          category_ids: Object.values(this.selectedCategories) as number[],
        };

        const productResponse = await productClient.create(preparedProduct);

        if (!productResponse.error) {
            this.product = {
                name: '',
                code: '',
                price: '',
                old_price: '',
                content: '',
                highlight: false,
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

    private getFilteredCategoriesByScope(currentTimestamp: number) {
        const currentScope: number = parseInt(this.selectedScopes[currentTimestamp])
        return this.categories.filter((category: { scope: number; }) => category.scope === currentScope);
    }

    private pushSectionCategoryInput() {
        this.sectionCategoryInputs = [...this.sectionCategoryInputs, Date.now()];
    }

    private deleteSectionCategoryInput(currentTimestamp: number) {
        this.sectionCategoryInputs = this.sectionCategoryInputs.filter((timestamp) => timestamp !== currentTimestamp);
        delete this.selectedCategories[currentTimestamp];
        delete this.selectedScopes[currentTimestamp];
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
