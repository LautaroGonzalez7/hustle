<template>
    <div class="page-inner">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sección</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(category, index) in categories">
                <td>{{index+1}}</td>
                <td>{{ category.name }}</td>
                <td>{{ scopes[category.scope] }}</td>
                <td>
                    <a class="btn btn-info" :href="`app#/category/${category.id}/edit`"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
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
    protected categories: any = [];

    protected scopes: any = Scopes;

    protected categoryClient = new CategoryApiClient();

    async mounted() {
        await this.getCategories();
    }

    private async getCategories() {
        const categoryResponse = await this.categoryClient.getAll();
        this.categories = categoryResponse.data;
    }

}
</script>
