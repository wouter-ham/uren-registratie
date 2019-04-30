<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" style="margin-bottom:30px" data-toggle="modal"
                        data-target="#exampleModal">
                    Create a new Project
                </button>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create a new project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="createProject">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="desc" class="form-control" id="desc"
                                           placeholder="Description" required>
                                </div>
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
        <div class="row">
            <div class="col-md-3 mb-3" v-for="project in projects">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ project.title }}</h3>
                        <p class="card-text">{{ project.desc }}</p>
                        <br>
                        <p class="card-text" v-if="project.tickets.length >= 1">Most recent tickets:</p>
                    </div>
                    <ul class="list-group">
                        <li v-for="ticket in project.tickets"
                            class="list-group-item d-flex justify-content-between align-items-center">
                            {{ ticket.title }}
                            <span class="badge badge-primary badge-pill">{{ new Date(JSON.parse(ticket.updates)[JSON.parse(ticket.updates).length-1][0]*1000).toLocaleDateString() }}</span>
                        </li>
                    </ul>

                    <div class="card-body">
                        <a v-bind:href="'projects/'+project.id+''" class="card-link">Go to project -></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "ProjectOverview",
        data() {
            return {
                projects: null,
                tickets: null,
            }
        },
        created: function () {
            this.getProjects();
        },
        methods: {
            getProjects: function () {
                window.axios.post('projects/all')
                    .then((response) => {
                        this.projects = response.data;
                    });
            },
            createProject: function (e) {
                e.preventDefault();

                const formData = new FormData();

                formData.append('title', document.getElementById('title').value);
                formData.append('desc', document.getElementById('desc').value);

                document.getElementById('title').value = "";
                document.getElementById('desc').value = "";

                window.axios.post('projects/create', formData)
                    .then((response) => {
                        console.log(response.data);
                    });

                this.getProjects();
            },
            deleteProject: function (id) {
                window.axios.post('projects/' + id + '/delete')
                    .then((response) => {
                        console.log(response.data);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
