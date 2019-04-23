<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div v-for="ticket in tickets" class="row">
                    <div class="col-md-12">
                        <div class="jumbotron" >
                            <h1>{{ ticket.title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron"></div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "TicketOverview",
        data() {
            return {
                projects: null,
                tickets: null,
                singleTicket: null
            }
        },
        created: function () {
            this.getPersonalTickets();
        },
        methods: {
            getPersonalTickets: function () {
                window.axios.get('tickets/personal')
                    .then((response) => {
                        console.log(response.data);
                        this.tickets = response.data;
                    });
            },
            getTicketById: function (id) {
                console.log(id);
                window.axios.get('tickets/' + id)
                    .then((response) => {
                        this.singleTicket = response.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
