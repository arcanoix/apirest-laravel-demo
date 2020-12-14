<template>
    <div class="row">
        <div class="col-md-4">
            <p style="margin-top: 30px">
                Mostrando {{ pagination.from ? pagination.from : 0 }}
                al {{ pagination.to ? pagination.to : 0 }}
                de {{ pagination.total ? pagination.total : 0 }}.
            </p>
        </div>
        <div class="col-md-8">
            <div class="pull-right">
                <ul class="pagination pagination-split m-t-30">
                    <li v-if="pagination.current_page > 1" class="page-item" @click.prevent="changePage(pagination.current_page - 1)">
                        <a class="page-link" href="#">Anterior</a>
                    </li>
                    <li v-if="pagination.last_page > 1 && isVisible(index + 1)" :class="isActive(index + 1) ? 'active' : ''"
                        @click.prevent="changePage(index + 1)"
                        v-for="(n, index) in pagination.last_page">
                        <a class="page-link" href="#">{{ index + 1 }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page" class="page-item"
                        @click.prevent="changePage(pagination.current_page + 1)">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['pagination'],

        methods: {
            changePage(page) {
                this.$emit('changePage', page);
            },

            isActive(page) {
                return this.pagination.current_page == page;
            },

            isVisible(page) {
                if(this.isActive(page) || page == 1 || page == this.pagination.last_page) {
                    return true;
                }

                if(this.isPrevious(page, 1) || this.isPrevious(page, 2) || this.isPrevious(page, 3)) {
                    return true;
                }

                if(this.isNext(page, 1) || this.isNext(page, 2) || this.isNext(page, 3)) {
                    return true;
                }

                return false;
            },

            isPrevious(page, diff) {
                return page == parseInt(this.pagination.current_page) - parseInt(diff);
            },

            isNext(page, diff) {
                return page == parseInt(this.pagination.current_page) + parseInt(diff);
            }
        }
    }
</script>
