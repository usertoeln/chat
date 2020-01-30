<template>
    <div class="container">
        <div class="row border rounded p-3">
            <!--***** Users panel  **********-->
            <div class="col-2">
                <ul class="bg-light p-3 rounded ">
                    <li v-for="item in users">{{ item.value }}</li>
                </ul>
            </div>
            <!--***** Messages panel  **********-->
            <div class="col-10" style="max-height: 350px;overflow-y: scroll">
                <ul class="bg-light rounded p-3">
                    <li v-for="item in messages">
                        <span>{{ item.user_name }}</span>
                        <span>{{item.date}}</span>
                        <span>{{item.message}}</span>
                    </li>
                </ul>
            </div>
            <!--***** chat panel  **********-->
            <div class="col-12">
                <div class="form-group">
                    <input type="text" class="form-control mt-3" @keydown.enter="send_message"
                           id="txt_public_message" v-model="message">
                </div>
                <button class="btn btn-success" @click="send_message">Send message</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "public_chat",
        data() {
            return {
                users: [
                    {id: 1, value: 'alireza'},
                    {id: 2, value: 'parisa'},
                    {id: 3, value: 'melika'},
                ],
                messages: [],
                message: ''
            }
        },
        methods: {
            send_message() {
                // this.messages.push({id: 1, user_name: 'alireza', date: '2020-02-20', message: this.message})
                // this.message = '';
                axios.post('/api/public_chat_send', {message: this.message}).then(res => {
                    this.message = '';
                    // console.log(res)
                }).catch(error => {
                    console.log(error)
                });
            }
        },
        created() {
            window.Echo.channel('public_chat_channel')
                .listen('.public_chat_event', (data) => {
                    this.messages.push(data);
                    // console.log(data);
                });
        }
    }
</script>

<style scoped>

</style>
