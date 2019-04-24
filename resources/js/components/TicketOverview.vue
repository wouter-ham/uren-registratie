<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Create a new ticket
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create a new ticket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="createTicket">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="desc" class="form-control" id="desc" placeholder="Description">
                                    </div>
                                    <select class="form-control" id="project" name="project">
                                        <option selected disabled>Project:</option>
                                        <option v-for="project in projects" v-bind:value="project.id">{{ project.title }}</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div v-for="ticket in tickets" class="row">
                    <div class="col-md-12">
                        <div class="jumbotron click" v-on:click="getTicketById(ticket.id)">
                            <h1>{{ ticket.title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <div class="info" v-if="singleTicket !== null">
                        <h1>{{ singleTicket.title }}</h1>
                        <p>{{ singleTicket.desc }}</p>
                        <line-chart v-if="chartData != null" :data="chartData"></line-chart>
                    </div>
                    <div class="default" v-else>
                        <h1>Ticket overview</h1>
                        <p>Click on a ticket in the left panel to show detailed information.</p>
                    </div>
                </div>
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
                singleTicket: null,
                chartData: {}
            }
        },
        created: function () {
            this.getPersonalTickets();
            this.getProjects();
        },
        methods: {
            getPersonalTickets: function () {
                window.axios.post('tickets/personal')
                    .then((response) => {
                        this.tickets = response.data;
                    });
            },
            getTicketById: function (id) {
                window.axios.post('tickets/' + id)
                    .then((response) => {
                        this.singleTicket = response.data[0];
                        this.chartData = JSON.parse(this.singleTicket.updates);
                    });
            },
            createTicket: function (e) {
                e.preventDefault();

                const formData = new FormData();

                formData.append('title', document.getElementById('title').value);
                formData.append('desc', document.getElementById('desc').value);
                formData.append('project', document.getElementById('project').value);

                window.axios.post('tickets/create', formData)
                    .then((response) => {
                        console.log(response.data);
                    });

                this.getPersonalTickets();
            },
            getProjects: function () {
                window.axios.post('projects/all')
                    .then((response) => {
                        this.projects = response.data;
                    });
            }
        }
    }
</script>

<style scoped>
    .click {
        cursor: pointer;
    }
</style>
