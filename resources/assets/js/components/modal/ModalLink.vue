<template>
    <span>
        <span v-if="item">
            <button v-on:click="preencheForm()" v-if="!type || (type != 'button' && type != 'link')" type="button"
                    v-bind:class="css || 'btn-sm btn-primary'" data-toggle="modal" v-bind:data-target="'#' + name"><i
                    v-if="icon" v-bind:class="icon"></i> {{title}} </button>
        <button v-on:click="preencheForm()" v-if="type == 'button'" type="button" v-bind:class="css || 'btn-sm btn-primary'" data-toggle="modal"
                v-bind:data-target="'#' + name"><i v-if="icon" v-bind:class="icon"></i> {{title}} </button>
        <a v-on:click="preencheForm()" v-if="type == 'link'" href="#" v-bind:class="css || 'btn-sm btn-primary'" data-toggle="modal"
           v-bind:data-target="'#' + name"><i v-if="icon" v-bind:class="icon"></i> {{title}} </a>
        </span>

        <span v-if="!item">
            <button v-if="!type || (type != 'button' && type != 'link')" type="button"
                    v-bind:class="css || 'btn-sm btn-primary'" data-toggle="modal" v-bind:data-target="'#' + name"><i
                    v-if="icon" v-bind:class="icon"></i> {{title}} </button>
            <button v-if="type == 'button'" type="button" v-bind:class="css || 'btn-sm btn-primary'" data-toggle="modal"
                v-bind:data-target="'#' + name"><i v-if="icon" v-bind:class="icon"></i> {{title}} </button>
            <a v-if="type == 'link'" href="#" v-bind:class="css || 'btn-sm btn-primary'" data-toggle="modal"
           v-bind:data-target="'#' + name"><i v-if="icon" v-bind:class="icon"></i> {{title}} </a>
        </span>
    </span>
</template>

<script>
    export default {
        props: ['type', 'name', 'title', 'css', 'icon', 'item','url'],
        methods:{
            preencheForm: function(){
                axios.get(this.url + this.item.id).then(res => {
                    this.$store.commit('setItem',res.data)
                });
            }
        }
    }
</script>