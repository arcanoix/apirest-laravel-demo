<template>
    <div>
        <table class="table table-responsive">
            <thead>
                <th>Nombre</th>
                <th>Email</th>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
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
                users: [],
                pagination: {}
            }
        },

        created() {
            this.index();
        },

        methods: {
            index(page = 1)
            {
                console.log("PRUEBA");
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
            }
        }
    }

</script>