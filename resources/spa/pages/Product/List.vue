<template>
    <div class="page-inner">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio</th>
                <th scope="col">Precio Anterior</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(product, index) in products">
                <td>{{index+1}}</td>
                <td>{{ product.name }}</td>
                <td>{{ getParsesCategories(product) }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.old_price }}</td>
                <td>
                    <a class="btn btn-info" :href="`app#/product/${product.id}/edit`"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts">
import Vue from "vue"
import Component from "vue-class-component";

import ProductApiClient from "../../services/api/requests/Product";

@Component({
    components: {}
})

export default class extends Vue {
    protected products: any = [];

    protected productClient = new ProductApiClient();

    async mounted() {
        await this.getProducts();
    }

    private async getProducts() {
        const productResponse = await this.productClient.getAll();
        this.products = productResponse.data;
    }

    private getParsesCategories(product: { categories: { name: string; }[]; }) {
        const categoryNames = product.categories.map((category: { name: string; }) => category.name);
        return categoryNames.join(', ')
    }

}
</script>
