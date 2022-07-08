<template>
    <div>
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Estadisticas generales</div>
                            <div class="card-category">Informacion general del sitio</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Usuarios</h6>
                                    <span>25</span>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Productos</h6>
                                    <span>120</span>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Ordenes</h6>
                                    <span>70</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Total ganancias y ordenes</div>
                            <div class="row py-3">
                                <div class="col-md-4 d-flex flex-column justify-content-around">
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-success op-8">Total Ganancias</h6>
                                        <h3 class="fw-bold">$9.782</h3>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-uppercase text-danger op-8">Total de ordenes</h6>
                                        <h3 class="fw-bold">$1,248</h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="chart-container">
                                        <canvas id="totalIncomeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <h4 class="card-title">Ordenes</h4>
                                <div class="card-tools">
                                    <button class="btn btn-icon btn-link btn-primary btn-xs"><span
                                        class="fa fa-angle-down"></span></button>
                                    <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span
                                        class="fa fa-sync-alt"></span></button>
                                    <button class="btn btn-icon btn-link btn-primary btn-xs"><span
                                        class="fa fa-times"></span></button>
                                </div>
                            </div>
                            <p class="card-category">Listado de ordenes</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="accordion">
                                        <div v-for="(order, index) in orders" class="card full-height">
                                            <summary class="d-flex justify-between p-4 collapsed border border-top-0 border-left-0 border-right-0" data-toggle="collapse"
                                                 :data-target="`#collapse${index}`" aria-expanded="false"
                                                 :aria-controls="`collapse${index}`">
                                                <h4 class="m-0">Orden #{{order.id}}</h4>
                                                <span class="p-2 badge badge-success">Pendiente de aprobacion</span>
                                            </summary>
                                            <div :id="`collapse${index}`" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center pb-4">
                                                        <h3 class="font-weight-bold mb-0">{{JSON.parse(order.productDetail).name}}</h3>
                                                        <h3 class="font-weight-bold mb-0">Total S/ {{order.total}}</h3>
                                                    </div>
                                                    <div class="d-flex align-items-center pb-4">
                                                        <h5 class="font-weight-bold mb-0 mr-1">Complementos:</h5>
                                                        <span v-for="(complement, index) in JSON.parse(order.complements)">- {{complement.name}}&nbsp;</span>
                                                    </div>
                                                    <div class="row pb-4">
                                                        <div class="col-md-4 d-flex align-items-center">
                                                            <h5 class="font-weight-bold mb-0 mr-1">
                                                                <CalendarMonth/> Dia de entrega:
                                                            </h5>
                                                            <span>{{JSON.parse(order.shipment).date}}</span>
                                                        </div>
                                                        <div class="col-md-4 d-flex align-items-center">
                                                            <h5 class="font-weight-bold mb-0 mr-1">
                                                                <ClockTimeEight/> Horario de entrega:
                                                            </h5>
                                                            <span>{{JSON.parse(order.shipment).hour}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center pb-4">
                                                        <h5 class="font-weight-bold mb-0 mr-1">Metodo de pago:</h5>
                                                        <span>{{JSON.parse(order.payment).type}}</span>
                                                    </div>
                                                    <div class="d-flex align-items-center pb-4">
                                                        <h5 class="font-weight-bold mb-0 mr-1">Comprobantes:</h5>
                                                        <span>En desarrollo</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Vue from "vue"
import Component from "vue-class-component";

import OrderApiClient from "../../services/api/requests/Order";
import CalendarMonth from 'vue-material-design-icons/CalendarMonth.vue';
import ClockTimeEight from 'vue-material-design-icons/ClockTimeEight.vue';
@Component({
    components: {CalendarMonth, ClockTimeEight}
})

export default class extends Vue {
    protected orders: any = [];

    protected orderClient = new OrderApiClient();

    async mounted() {
        await this.getOrders();
    }

    private async getOrders() {
        const orderResponse = await this.orderClient.getAll();
        this.orders = orderResponse.data;
    }

}
</script>
