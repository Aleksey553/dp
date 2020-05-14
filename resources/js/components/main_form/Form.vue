<template>
    <form  method="post" @submit.prevent="onSubmit">
        <div v-if="loading" class="">
            Загрузка
        </div>
        <div class="form-row">
            <div class="col-md-2 align-self-center">
                <div class="text-justify text-center">
                    1 этап
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label class="text-dark">Выбор типа автомобиля</label>
                    <select class="form-control" v-model="idType">
                        <option v-for="type in types" :value="type.id">
                            {{type.title}}
                        </option>
                    </select>
                </div>
                <div  v-if="typeDone"  class="form-group">
                    <label class="text-dark">Выбор марки автомобиля</label>
                    <select class="form-control" v-model="idMark">
                        <option  v-for="mark in marks" :value="mark.id">
                            {{mark.title}}
                        </option>
                    </select>
                </div>
                <div v-if="markDone" class="form-group">
                    <label class="text-dark">Выбор модели автомобиля</label>
                    <select class="form-control"  v-model="idModel">
                        <option v-for="model in models" :value="model.id">
                            {{model.title}}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div v-if="modelDone" class="form-row">
            <div class="col-md-2 align-self-center">
                <div class="text-justify text-center">
                    2 этап
                </div>
            </div>
            <div class="col-10">
                <form-recursive-categories
                    :onSubmit='onSubmit'
                    :item="item"
                    :index="index"
                    v-for="(item, index) in categories"
                    :key="item.id"

                >
                </form-recursive-categories>
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" type="submit">
        </div>

    </form>
</template>

<script>
    alert('Работает!');
    export default {
        props:[
            'types'
        ],
        data(){
            return {
                marks: {},
                models: {},
                categories: {},
                selectedType: false,
                selectedMark: false,
                selectedModel: false,
                idType: '',
                idMark: '',
                idModel: '',
                loading : false
            }
        },
        mounted() {
            console.log('Основной компонент подключен.')
        },
        computed:{
            typeDone(){
                if(this.idType > 0)
                {
                    this.getMarks();
                    return this.selectedType = true;
                }
            },
            markDone(){
                if(this.idMark > 0 && this.idType > 0 && this.marks.length > 0)
                {
                    this.getModels();
                    this.idModel = "";
                    return this.selectedMark = true;
                }
            },
            modelDone(){
                if(this.idMark > 0 && this.idType > 0 && this.idModel > 0 && this.marks.length > 0 && this.models.length  > 0)
                {
                    console.log(this.idModel);
                    this.getCategories();
                    return this.selectedModel = true;
                }
            },


        },
        methods:{
            getMarks(){
                this.loading = true;
                let dt = this;
                axios.get('/api/mark/' + this.idType)
                    .then(response => {
                        // console.log(response.data);
                        dt.marks = response.data;
                        dt.loading = false;
                        // console.log(mk.marks);
                    });
            },
            getModels(){
                this.loading = true;
                let dt = this;
                axios.get('/api/model/' + this.idMark)
                    .then(response => {
                        // console.log(response.data);
                        dt.models = response.data;
                        dt.loading = false;
                        // console.log(mk.marks);
                    });
            },
            getCategories(){
                this.loading = true;
                let dt = this;
                axios.get('/api/category/')
                    .then(response => {
                        // console.log(response.data);
                        dt.categories = response.data;
                        dt.loading = false;
                        // console.log(dt.categories);
                    });
            },
            onSubmit(data){
                console.log(data)
            }
        },
    }
</script>
