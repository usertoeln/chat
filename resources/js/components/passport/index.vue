<template>
    <div class="row">
        <div class="col-8 offset-2 mt-3">
            <AuthorizedClients/>
        </div>
        <div class="col-8 offset-2 mt-3">
            <Clients/>
        </div>
        <div class="col-8 offset-2 mt-3">
            <PersonalAccessTokens/>
        </div>
    </div>
</template>

<script>
    import AuthorizedClients from "./AuthorizedClients";
    import Clients from "./Clients";
    import PersonalAccessTokens from "./PersonalAccessTokens";

    export default {
        name: "index",
        components: {AuthorizedClients, Clients, PersonalAccessTokens},
        created() {
            axios.get('/api/user').then(res => {
                console.log(res)
            }).catch(error => {
                console.log(error)
            });
        }
    }
</script>

<style scoped>

</style>
