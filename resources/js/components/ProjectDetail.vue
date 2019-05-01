<template>

</template>

<script>
    export default {
        name: "ProjectDetail",
        data() {
            return {

            }
        },
        created: function () {

        }
    }
</script>

<style>

    .ticket {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .pricing .ticket {
        border: none;
        border-radius: 1rem;
        transition: all 0.2s;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        margin: 1rem 0;
    }

    .pricing .text-muted {
        opacity: 0.7;
    }

    @media (min-width: 992px) {
        .pricing .ticket:hover {
            margin-top: -.25rem;
            margin-bottom: .25rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        }

        .pricing .card:hover .btn {
            opacity: 1;
        }
    }
</style>
