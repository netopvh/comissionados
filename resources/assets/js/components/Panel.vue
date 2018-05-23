<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading"><span class="text-bold">{{ title }}</span></div>
        <div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'title','color'
        ],
        computed: {
            defineCor: function(){
                return "panel "+ (this.color || "panel-default")+ " panel-bordered";
            }
        }
    }
</script>
