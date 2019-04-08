<template>
    <div class="row">
        <div class="col-md-12">
            <city-input @onCityName="getCityInformation($event)"></city-input>
        </div>

        <div class="col-md-4">
            <wheather v-if="city.weather" :weather="city.weather"></wheather>
        </div>

        <div class="col-md-8">
            <recommended-places v-if="city.recommendedPlaces"
                                :recommendedPlaces="city.recommendedPlaces"></recommended-places>
        </div>

        <div class="col-md-12">
            <footer-dev></footer-dev>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                city: {}
            }
        },

        methods: {
            getCityInformation(cityName) {
                if (cityName !== '') {
                    this.city = {};

                    axios.get('/' + cityName).then(
                        (response) => {
                            this.city = response.data;
                            console.log(this.city);
                        }
                    )
                }
            },
        }
    }
</script>


<style scoped>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: #fbfbfb;
    }
</style>