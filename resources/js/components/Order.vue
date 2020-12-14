<template>

    <div>
            <table class="table table-responsive">
            <thead>
                <th>#</th>
                <th>Cliente</th>
                <th>Total</th>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{ order.id }}</td>
                    <td>{{ order.customer.name }}</td>
                    <td>{{ order.total }}</td>
                </tr>
            </tbody>
        </table>
          <paginator :pagination="pagination" @changePage="index"></paginator>
    </div>

</template>
    
<script>
import Paginator from './Paginator';

    export default {
         components: {Paginator},

        data() {
            return {
                orders:[],
                pagination: {}
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

                 axios.get('/api/orders', {
                        params: params
                    })
                    .then(({data}) => {
                        console.log(data.data);
                         this.orders = data.data;
                         this.pagination = data.meta;
                    });
            }
        }
    }
</script>