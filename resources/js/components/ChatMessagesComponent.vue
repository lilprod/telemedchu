<template>
    <div class="chat-box">
        <div class="chats">
            <div class="chat chat-right" v-for="message in messages" v-bind:key="message.id">
                <div class="chat-bubble">
                    <div class="chat-content">
                        <p>{{ message.user.name }}</p>
                        <p>{{ message.message }}</p>
                        <span class="chat-time">{{ message.created_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    mounted() {
            console.log('ChatMessagesComponnent mounted.')
    },
    props: ['messages']
  };
</script>
