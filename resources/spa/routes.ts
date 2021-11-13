import Vue from "vue"
import VueRouter from "vue-router"
import CategoryList from "./pages/Category/List.vue"
import CategoryCreate from "./pages/Category/Create.vue"
import CategoryEdit from "./pages/Category/Edit.vue"
import ProductList from "./pages/Product/List.vue"
import ProductCreate from "./pages/Product/Create.vue"
import ProductEdit from "./pages/Product/Edit.vue"
import ComplementList from "./pages/Complement/List.vue"
import ComplementCreate from "./pages/Complement/Create.vue"
import ComplementEdit from "./pages/Complement/Edit.vue"
import SliderList from "./pages/Slider/List.vue"
import SliderCreate from "./pages/Slider/Create.vue"
import SliderEdit from "./pages/Slider/Edit.vue"
import Dashboard from "./pages/Dashboard/Dashboard.vue";
import MainContainer from "./containers/MainContainer.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/',
            redirect: '/dashboard',
            name: 'Categorías',
            component: MainContainer,
            children: [
                {
                    path: '/dashboard',
                    name: 'Dashboard',
                    component: Dashboard,
                    meta: {
                        title: "Dashboard"
                    }
                },
                {
                    path: '/category/list',
                    name: 'Categorías',
                    component: CategoryList,
                    meta: {
                        title: "Categorías"
                    }
                },
                {
                    path: '/category/create',
                    name: 'Categorías',
                    component: CategoryCreate,
                    meta: {
                        title: "Crear Categoría"
                    }
                },
                {
                    path: '/category/:id/edit',
                    name: 'Categorías',
                    component: CategoryEdit,
                    meta: {
                        title: "Editar Categoría"
                    }
                },
                {
                    path: '/product/list',
                    name: 'Productos',
                    component: ProductList,
                    meta: {
                        title: "Productos"
                    }
                },
                {
                    path: '/product/create',
                    name: 'Productos',
                    component: ProductCreate,
                    meta: {
                        title: "Crear Producto"
                    }
                },
                {
                    path: '/product/:id/edit',
                    name: 'Productos',
                    component: ProductEdit,
                    meta: {
                        title: "Editar Producto"
                    }
                },
                {
                    path: '/complement/list',
                    name: 'Complementos',
                    component: ComplementList,
                    meta: {
                        title: "Complementos"
                    }
                },
                {
                    path: '/complement/create',
                    name: 'Complementos',
                    component: ComplementCreate,
                    meta: {
                        title: "Crear Complemento"
                    }
                },
                {
                    path: '/complement/:id/edit',
                    name: 'Complementos',
                    component: ComplementEdit,
                    meta: {
                        title: "Editar Complemento"
                    }
                },
                {
                    path: '/slider/list',
                    name: 'Sliders',
                    component: SliderList,
                    meta: {
                        title: "Sliders"
                    }
                },
                {
                    path: '/slider/create',
                    name: 'Sliders',
                    component: SliderCreate,
                    meta: {
                        title: "Crear Slider"
                    }
                },
                {
                    path: '/slider/:id/edit',
                    name: 'Sliders',
                    component: SliderEdit,
                    meta: {
                        title: "Editar Slider"
                    }
                }
            ]
        },
    ]
});

export default router;
