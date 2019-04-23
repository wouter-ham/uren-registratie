<template>
    <ul>
<!--        <li v-for="ïtem in items"></li>-->
    </ul>
</template>

<script>
    export default {
        name: "Home",
        data: {
            projects: null,
            tickets: null
        },
        methods: {
            getPersonalTickets: function () {
                axios.get('/tickets/personal')
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created: function(){
            this.getPersonalTickets();
        }
    }
</script>

<style scoped>

</style>
