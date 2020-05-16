<template>
    <div class="row">
        <div @click="onClick" class="row col">
            {{ item.title }}
            <div class="col" v-if="item.children && item.children.length > 0">

                <form-recursive-categories
                    v-for="(child, subIndex) in item.children"
                    v-bind:item="child"
                    :index="subIndex"
                    :key="child.id"
                    :parentItem="item"
                />
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'FormRecursiveCategories',
        props: {
            onSubmit:{
                type: Object,
                required: true
            },
            item: {
                type: Object,
                required: true
            },
            index: {
                type: Number,
                required: true
            },
            parentItem: {
                required: false
            },
        },
        data () {
            return {
                id: '',
                selectedId:{},
                childrenLength: '',
                selectMenu: false,
            }
        },
        mounted() {
            console.log('Рекурсивный компонент подключен.');
            // if(this.item.children.length > 0){
            //     console.log(this.item.children);
            // }
            // console.log(this.item);
        },
        methods:{
            hide(){
                this.selectMenu = !this.selectMenu;
            },
            show(){
                this.selectMenu = true;
            },
            onClick(){
                this.onSubmit({
                    id:this.item.id
                });

                // console.log(this.item.id);
            }
        }
    }
</script>

<style scoped>

</style>
