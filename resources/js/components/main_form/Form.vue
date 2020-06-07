<template>
<!-- v-if="loading" -->
    <form  method="post" @submit.prevent="onSubmit">
        <div v-if="loading" class="position-absolute spinner-border text-primary" role="status">
            <span class="sr-only">Загрузка...</span>
        </div>
        <div v-if="validErrors" class="bg-gradient-danger container">
            <div class="" v-for="(error, index) in errors">
                {{error.message}}
<!--                <div v-if="index === 'errorVue'"> {{error.message}}</div>-->
            </div>

        </div>
        <div class="form-row container">

            <div class="col-md-2 align-self-center">
                <div class="text-justify text-center">
                    1 этап
                </div>
            </div>
            <div class="col-md-10 shadow-lg bg-dark">
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
        <div v-if="modelDone" class="form-row container">
            <div class="col-md-2 align-self-center">
                <div class="text-justify text-center">
                    2 этап
                </div>
            </div>
            <div class="col-md-10">
                <div   v-if="categoriesDone"  class="container mt-md-2 mb-md-2 shadow rounded bg-dark">
                    <div class="row">
                        <div class="col-sm">
                            <div data-toggle="tooltip"  class="container mt-md-2 mb-md-3 text text-white text-s-custom navbar-bg-n rounded cursor-p" v-for="category in categories"  @click="onClickCategory" :value="category.id">
                                {{category.title}}
                            </div>
                        </div>
                        <div class="col-sm"  v-if="subCategories">
                            <div @click="onClickSubCategory" data-toggle="tooltip" class="container  mt-md-2 mb-md-2 text-s-custom text-white  navbar-bg-n rounded cursor-p" v-for="subCateg in subCategory" :value="subCateg.id" >
                                {{subCateg.title}}
                            </div>
                        </div>
                        <div style="color: #e4604f" class="col-sm"  v-if="services">
                            <div data-toggle="tooltip"  @click="onClickService" class="bg-light container mt-md-2 mb-md-2 text-s-custom text-color-c rounded cursor-p" v-for="serv in service" :minDate="serv.dt_from" :maxDate="serv.dt_before" :title="serv.title" :price="serv.price" :value="serv.id" >
                                {{serv.title}}
                            </div>
                        </div>
                    </div>
                </div>
                <div  v-if="services"  class="container mt-md-6 mb-md-6 shadow rounded bg-dark">
                    <div class="row">
                        <div v-if="date" class="form-group col-sm">
                            <input  @click="onClickDate" v-model="myDate" type="datetime-local" class="form-control">
                            <p class="text-white">Выбрана дата: {{ myDate }}</p>
                        </div>
                    </div>
                </div>
                <div v-if="orderAr.length > 0" class="container bg-light mt-md-4 mb-md-4 shadow rounded bg-dark text-size">
                    <div  class="row mt-md-2 mb-md-2  text-white  navbar-bg-n rounded "  v-for="(fwacth, index) in fastWatch" >
                        <div class="col-sm">{{fwacth.title}}</div>
                        <div class="col-sm">{{fwacth.price}}</div>
                        <div v-if="index > 0" class="col-sm"><button @click="onClickOrder" :value="index" class="btn btn-danger">Удалить</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="userId" class="form-group">
            <input class="form-control navbar-bg-n text-white text-s-custom" type="submit">
        </div>
        <div v-else>
                <div class="text-center">
                   Авторизуйтесь, чтобы записаться на услугу
                </div>
        </div>

    </form>
</template>
<script>
    export default {
        props:[
            'types',
            'maxTime',
            'minTime',
            'userId'
        ],
        data(){
            return {
                minDate: '',
                maxDate: '',
                myDate: '',
                errors: {},
                marks: {},
                models: {},
                categories: {},
                subCategory: {},
                service: {},
                orderAr: [],
                fastWatch: {
                    title: '',
                    price: ''
                },
                selectedType: false,
                selectedMark: false,
                selectedModel: false,
                selectedSubCategory: false,
                idType: '',
                idMark: '',
                idModel: '',
                idCategory: '',
                idService: '',
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
                if(this.idMark > 0 && this.idType > 0 && this.marks != null)
                {
                    this.getModels();
                    this.idModel = "";
                    return this.selectedMark = true;
                }
            },
            modelDone(){
                if(this.idMark > 0 && this.idType > 0 && this.idModel > 0 && this.marks != null && this.models != null)
                {
                    console.log(this.idModel);
                    this.getCategories();
                    return this.selectedModel = true;
                }
            },
            categoriesDone(){
                // this.idCategory
                this.getCategories()
                return true;
            },
            subCategories(){
                if(this.idCategory > 0){
                    this.getCategories(this.idCategory);
                    // console.log(this.subCategories);
                    console.log(this.idCategory);

                    return this.selectedSubCategory = true;
                }
            },
            services(){

                if(this.idCategory > 0){

                    // alert("sdadasdas");
                    this.getServices(this.idCategory);

                    return true;
                }
            },
            date(){
                if(this.idService > 0){
                    // this.minDate = new Date().toLocaleDateString();
                    var date = new Date(this.myDate);
                    console.log(date + 'dadasd');
                    if(date.getHours() < 18 && date.getHours() > 9){
                        delete this.errors['errorVue'];
                        console.log(date.getHours());
                        console.log(date.getMinutes());
                    }else {
                        this.errors['errorVue'] = {};
                        this.errors['errorVue']['message'] = 'Не допустимое время, заказывать можно только с 9:00 до 18:00';
                    }
                    console.log(this.errors);
                    console.log(date.getHours());
                    console.log(date.getMinutes());
                    return true;
                }
            },
            validErrors(){
                if(this.errors != null){
                    console.log(this.errors['errorVue']);
                    return true;
                }

            }
        },
        methods:{
            getMarks(){
                this.marks = null;
                this.loading = true;
                let dt = this;
                console.log(this.idType);
                axios.get('/api/marks?id=' + this.idType)
                    .then(response => {
                        console.log(response.data);
                        if(response.data.marks != null){
                            dt.marks = response.data.marks;
                        }
                        dt.loading = false;
                    });
            },
            getModels(){
                this.models = null;
                // alert(this.idMark);
                // alert(this.idType);
                this.loading = true;
                let dt = this;
                axios.get('/api/models/?idm=' + this.idMark + '&idt=' + this.idType)
                    .then(response => {
                        console.log(response.data);
                        if(response.data.models != null){
                            dt.models = response.data.models;
                        }
                        dt.loading = false;
                        console.log(dt.models);
                    });
            },
            getCategories(idCategory = null){
                this.loading = true;
                console.log(idCategory);
                let param = (idCategory != null)? '?id=' + idCategory : '';
                let dt = this;
                axios.get('/api/categories' + param)
                    .then(response => {
                        if(response.data.categories != null){
                            if(idCategory != null){
                                dt.subCategory = response.data.categories;
                                console.log(dt.subCategory);
                            }else {
                                dt.categories = response.data.categories;
                                console.log(dt.categories);
                            }
                        }

                        dt.loading = false;

                    });
            },
            getServices(){
                // alert("sdada");
                this.loading = true;
                let dt = this;
                axios.get('/api/services?id=' + this.idCategory)
                    .then(response => {
                        if(response.data.services != null){
                            dt.service = response.data.services;
                            console.log(dt.service);
                        }
                        dt.loading = false;
                    });
            },
            postOrder(){
                this.loading = true;
                let dt = this;
                // console.log(dt);
                axios.post('/api/orders', {
                    userId: this.userId,
                    arService: this.orderAr,
                    date: this.myDate,
                    idModel: this.idModel,
                    idType: this.idType,
                    idMark: this.idMark
                })
                .then((response) => {
                    console.log(response);
                    if(response.status == 201){
                        alert('Заказ принят!');
                    }else{
                        dt.errors = response.data;
                    }
                    console.log(dt.errors);

                    dt.loading = false;
                })
                .catch((error) => {
                    console.log(error);
                });
            },
            onClickCategory: function (event) {
                this.idCategory = event.target.getAttribute('value');
               console.log(event.target.getAttribute('value'));
            },
            onClickSubCategory: function (event) {
                this.idService = "";
                this.idCategory = event.target.getAttribute('value');
                console.log(event.target.getAttribute('value'));
            },
            onClickService: function (event) {
                // this.orderAr = [];
                // this.fastWatch = [];
                this.idService = event.target.getAttribute('value');
                let title = event.target.getAttribute('title');
                let price = event.target.getAttribute('price');


                this.fastWatch[this.idService] = {};
                this.fastWatch[this.idService]['title'] = title;
                this.fastWatch[this.idService]['price'] = price + " руб";
                // console.log(this.fastWatch);



                if(this.orderAr.indexOf(this.idService) === -1){
                    this.orderAr.push(this.idService);
                }
                //
                console.log(this.orderAr);
                console.log(this.fastWatch);
                // console.log(this.fastWatch[this.idService].title);
            },
            onClickDate: function (event) {
                // console.log(this.minTime.date);
                event.target.setAttribute('min', this.minTime);
                event.target.setAttribute('max', this.maxTime);
                // event.target.setAttribute('min', this.minDate);

                console.log(this.idService + this.maxDate, this.minDate);
                console.log(event.target);
            },
            onClickOrder: function (event) {
                var index = this.orderAr.indexOf(event.target.getAttribute('value'));
                if (index > -1) {
                    this.orderAr.splice(index, 1);
                }
                delete this.fastWatch[(event.target.getAttribute('value'))];

                console.log(this.fastWatch);
                console.log(this.orderAr);
            },
            onSubmit(){

                // this.errors = [];
                // if(this.orderAr == null){
                //     this.errors.push('не выбраны услуги');
                // }
                // if(this.myDate == null){
                //     this.errors.push('не выбрана дата');
                //
                // }
                // if(this.errors != null){
                //     return alert(this.errors);
                // }
                console.log(this.userId);
                console.log(this.orderAr);
                console.log(this.myDate);
                this.postOrder();
                this.validErrors();

            }
        },
    }
</script>
