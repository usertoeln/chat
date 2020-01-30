<template>
    <div class="row">
        <div class="col-6 offset-3">
            <p>Public channel messages : </p>
            <ul>
                <li v-for="item in messages">
                    <span>{{ item.date }} : </span>
                    <span>{{ item.value}}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "public_board",
        data() {
            return {
                messages: [],
            }
        },
        created() {
            window.Echo.channel('public_channel')
                .listen('.public_message_event', (data) => {
                    this.messages.push(data);
                    console.log(data);
                });
        }
    }
</script>

<style scoped>

</style>
