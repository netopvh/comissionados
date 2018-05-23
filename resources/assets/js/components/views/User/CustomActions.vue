<template>
   <span>
        <a href="" @click.stop.prevent="update(rowData,index)">Editar</a>&nbsp;
        <a href="" @click.stop.prevent="deleteRow(rowData,index)">Deletar</a>
        </span>
</template>

<script>
    export default {
        name: 'user-operation',
        props: {
            rowData: {
                type: Object
            },
            field: {
                type: String
            },
            index: {
                type: Number
            }
        },
        methods: {
            update(){
                let params = {type: 'edit', index: this.index, rowData: this.rowData};
                this.$emit('on-custom-comp', params);
            },

            deleteRow(){
                let params = {type: 'delete', index: this.index};
                this.$emit('on-custom-comp', params);

            }
        }
    }
</script>

<style>
    .custom-actions button.ui.button {
        padding: 8px 8px;
    }

    .custom-actions button.ui.button > i.icon {
        margin: auto !important;
    }
</style>