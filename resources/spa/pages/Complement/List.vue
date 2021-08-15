<template>
    <div class="page-inner">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(complement, index) in complements">
                <td>{{index+1}}</td>
                <td>{{ complement.name }}</td>
                <td>{{ complement.category.name }}</td>
                <td>{{ complement.price }}</td>
                <td>
                    <a class="btn btn-info" :href="`app#/complement/${complement.id}/edit`"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script lang="ts">
import Vue from "vue"
import Component from "vue-class-component";

import ComplementApiClient from "../../services/api/requests/Complement";

@Component({
    components: {}
})

export default class extends Vue {
    protected complements: any = [];

    protected complementClient = new ComplementApiClient();

    async mounted() {
        await this.getComplements();
    }

    private async getComplements() {
        const complementResponse = await this.complementClient.getAll();
        this.complements = complementResponse.data;
    }

}
</script>
