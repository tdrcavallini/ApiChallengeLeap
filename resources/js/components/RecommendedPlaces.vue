<template>
    <div>
        <div class="row">
            <div id="box_recommendedPlaces" class="col-xs-12">
                <div class="page-header">
                    <h2><small class="float-right"><img src="/images/foursquare-logo.png" width="100"></small> Recommended Places </h2>
                </div>
                <div id="boxscroll" class="recommended-places-list">
                    <div class="media" v-for="place in recommendedPlaces">

                        <div class="media-body">

                            <h4 class="media-heading">{{ place.name }}</h4>
                            <p>{{ place.address }}</p>
                            <p><i class="fas fa-tag"></i> {{ place.categories[0].name }}</p>


                        </div>
                    </div>

                </div>



            </div>
        </div>


    </div>
</template>

<script>
    export default {
        props: ["recommendedPlaces"]
    }

    $(document).ready(function() {

        $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#00F",boxzoom:true}); // First scrollable DIV


    });
</script>

<style scoped>
    @include media-breakpoint-up(sm) {
        html {
            font-size: 1.2rem;
        }
    }

    .recommended-places-list .media{
        border-bottom: 1px dotted #ccc;
    }

    .media-body{
        padding: 20px;
    }

    .page-header{
        padding: 10px;
    }

    #box_recommendedPlaces{
        width: 100%;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0px 2px 3px -1px rgba(151, 171, 187, 0.7);
        float: left;
        transform-style: preserve-3d;
        margin-top: 60px;
    }

    #boxscroll {
        height: 391px;
        width: 100%;
        border-top: 1px dotted #ccc;
        overflow: auto;
    }
</style>

