<template>

<div id="box-search">
    <div class="row">
        <div class="box-title col-xs-12 col-sm-6 col-md-6 col-lg-6  float-left">
            <h4>Laravel + FourSquare + OpenWeather</h4>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 float-right">
            <div class="search-box">
                <input type="text" class="search-txt" placeholder="Your city name" name="q" v-model="cityName" @keyup.enter.native="sendNameCity()">
                <a class="search-btn">
                    <i class="fas fa-search-location" @click="sendNameCity()"></i>
                </a>
            </div>
        </div>

    </div>
</div>
</template>

<script>
    export default {

        data(){
            return {
                cityName: ''
            }
        },

        methods:{

            sendNameCity(){
                this.$emit('onCityName', this.cityName);
            }

        }
    }
</script>

<style scoped>
    #box-search{
        padding: 30px;
    }
    .box-title{
        padding: 20px;
    }
    .search-box{
        width: 300px;
        background:#353b48;
        height: 60px;
        border-radius: 50px;
        padding: 10px;
    }

    .search-box .search-txt{
        width: 300px;
        padding: 0 6px;
    }

    .search-box .search-btn{
        background: #fff;
    }

    .search-box .search-btn{
        color: #a6d9e8 !important;
        float: right;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #487eb0;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -40px;
    }

    .search-txt{
        border:none;
        outline: none;
        background: none;
        float: left;
        color:#fff;
        font-size: 16px;
        line-height: 40px;
    }
</style>