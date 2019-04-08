<template>
    <div>

        <div class="col-xs-12">
            <div class="tile">
                <div class="wrapper">
                    <div class="header">{{ weather.name }}</div>

                    <div class="banner-img">

                    </div>

                    <div class="dates">
                        <div class="start">
                            <strong>NOW</strong>
                            <img v-bind:src='weather.icon' class="icon"/>
                            {{ weather.temp }} °C
                        </div>
                        <div class="ends">
                            <strong>Description</strong>
                            {{ weather.description }}
                        </div>
                    </div>

                    <div class="stats">

                        <div>
                            <strong>MIN</strong> {{ weather.min }} °C
                        </div>

                        <div>
                            <strong>MAX</strong> {{ weather.max }} °C
                        </div>


                    </div>

                    <div class="stats">

                        <div>
                            <strong>PRESSURE</strong> {{ weather.pressure }} hpa
                        </div>

                        <div>
                            <strong>HUMIDITY</strong> {{ weather.humidity }} %
                        </div>

                    </div>

                    <div class="stats">

                        <div>
                            <strong>SUNRISE</strong> {{ weather.sunrise }}
                        </div>

                        <div>
                            <strong>SUNSET</strong> {{ weather.sunset }}
                        </div>

                    </div>


                </div>
                <div class="col-xs-12">
                    <small class="float-right" id="footer-weather-image"><img src="/images/openweathermap-logo.png" width="150"></small>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        props: ['weather']
    }
</script>

<style scoped>
    #footer-weather-image{
     padding: 10px;
    }

    img.icon {
        vertical-align: middle;
        margin-right: -8px;
    }

    .tile {
        width: 100%;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0px 2px 3px -1px rgba(151, 171, 187, 0.7);
        float: left;
        transform-style: preserve-3d;
        margin-top: 60px;

    }

    .header {
        border-bottom: 1px solid #ebeff2;
        padding: 20px 0;
        text-align: center;
        color: #59687f;
        font-weight: 600;
        font-size: 19px;
        position: relative;
    }

    .banner-img {
        padding: 5px 5px 0;
    }

    .banner-img img {
        width: 100%;
        border-radius: 5px;
    }

    .dates {
        border: 1px solid #ebeff2;
        border-radius: 5px;
        padding: 20px 0px;
        margin: 10px 20px;
        font-size: 16px;
        color: #5aadef;
        font-weight: 600;
        overflow: auto;
    }

    .dates div {
        float: left;
        width: 50%;
        text-align: center;
        position: relative;
    }

    .dates strong,
    .stats strong {
        display: block;
        color: #adb8c2;
        font-size: 11px;
        font-weight: 700;
    }

    .dates span {
        width: 1px;
        height: 40px;
        position: absolute;
        right: 0;
        top: 0;
        background: #ebeff2;
    }

    .stats {
        border-top: 1px solid #ebeff2;
        background: #f7f8fa;
        overflow: auto;
        padding: 15px 0;
        font-size: 16px;
        color: #59687f;
        font-weight: 600;
        border-radius: 0 0 5px 5px;
    }

    .stats div {
        border-right: 1px solid #ebeff2;
        width: 48%;
        float: left;
        text-align: center
    }

    .stats div:nth-of-type(2) {
        border: none;
    }

</style>