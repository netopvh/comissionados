<template>
    <app-pagina width="8">
        <datatable
                v-if="rows"
                v-on:row-click="onRowClick"
                title="Usuários"
                :columns="columns"
                :rows="rows"
                locale="br"
        ></datatable>
    </app-pagina>
</template>

<script>
    import DataTable from 'vue-materialize-datatable';
    import axios from 'axios';
    import locales from 'vue-materialize-datatable/src/locales/br.json'

    export default{
        components: {
            "datatable": DataTable
        },
        data(){
            return {
                columns: [
                    {label: 'ID', field: 'id', numeric: true, width: '50px'},
                    {label: 'Nome', field: 'nome', numeric: false},
                    {label: 'Email', field: 'email', numeric: false},
                    {label: 'Ações', field: 'action', html: true, sortable: false}
                ],
                rows: [],
                allRows: []
            }
        },
        methods: {
            getDataTable(){
                axios.get('/api/users')
                    .then((res) => {
                        this.rows = res.data.data;
                    })
                    .then((error) => {
                        console.log(error);
                    })
            },
            onRowClick: function (row) {
                //row contains the clicked object from `rows`
                console.log(row);
            }
        },
        created: function () {
            this.getDataTable();
        }
    }
</script>

<style>

</style>