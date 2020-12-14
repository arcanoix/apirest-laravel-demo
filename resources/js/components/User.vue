<template>
    <div>

        <div  v-if="active == 1">
            <table class="table table-responsive">
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>...</th>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <a href="#" class="btn btn-success" @click="orders(user.id)">Ver ordenes</a>
                            <a href="#" class="btn btn-warning">Ver Direcciones</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <paginator :pagination="pagination" @changePage="index"></paginator>
        </div>

        <div v-if="active == 2">
                        <a href="#" @click="back(1)">Volver</a>
                        <table class="table table-responsive">
                            <thead>
                                <th>Order</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                <tr v-for="order in orders_data" :key="order.id">
                                    <td>{{ order.id }}</td>
                                    <td>{{ order.total }}</td>
                                </tr>
                            </tbody>
                        </table>
        </div>

    </div>

</template>

<script>

import Paginator from './Paginator';

 export default {

        components: {Paginator},
     
        data() {
            return {
                users: [],
                orders_data:[],
                address_data:[],
                pagination: {},
                active: 1
            }
        },

        created() {
            this.index();
        },

        methods: {
            index(page = 1)
            {
               
                let params = {
                    page: page
                };

                 axios.get('/api/users', {
                        params: params
                    })
                    .then(({data}) => {
                         this.users = data.data;
                         this.pagination = data.meta;
                    });
            },

            orders(user)
            {
                    this.active = 2;
                    axios.get(`/api/orders/${user}`).then(({data}) => this.orders_data = data.data);
            },

            address()
            {


            },

            back(data)
            {
                this.active = data;
            }
        }
    }

</script>