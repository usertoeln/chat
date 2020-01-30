<template>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="form-group">
                    <label for="txt_public_message">Send message to public:</label>
                    <input type="text" class="form-control"
                           id="txt_public_message" v-model="public_message">
                </div>
                <button class="btn btn-success" @click="send_message">Send</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "public_send",
        data() {
            return {
                public_message: '',
            }
        },
        methods: {
            send_message() {
                axios.post('/api/public_send', {message: this.public_message}).then(res => {
                    console.log(res)
                }).catch(error => {
                    console.log(error)
                });
            }
        },
    }
</script>

<style scoped>

</style>
