<template>
    <div class="container">
        <div class="row">
            
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

        },
        methods: {
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

</style>
