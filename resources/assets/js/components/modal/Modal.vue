<template>
    <div v-bind:id="name" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">{{title}}</h5>
                </div>

                <div class="modal-body">
                    <slot></slot>
                </div>

                <div class="modal-footer">
                    <slot name="buttons"></slot>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="icon-close2"></i> Fechar</button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name','title']
    }
</script>