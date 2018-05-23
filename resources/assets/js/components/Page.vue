<template>
    <div class="row">
        <div v-bind:class="defineTamanho">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['width'],
        computed:{
            defineTamanho: function(){
                if(this.width >= 12){
                    return "col-md-12";
                }
                if(this.width <= 2){
                    return "col-md-2";
                }
                if((this.width % 2) == 0){
                    return "col-md-"+this.width;
                }else{
                    return "col-md-"+(parseInt(this.width) + 1);
                }
            }
        }
    }
</script>
