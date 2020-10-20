<template>
    <div class="input-group">
        <textarea class="form-control" name="message" placeholder="Type message..." v-model="newMessage" @keyup.enter="sendMessage"></textarea>
        <span class="input-group-append">
            <button class="btn btn-primary" type="button" @click="sendMessage"><i class="fa fa-send"></i></button>
        </span>
    </div>            
</template>

<script>

    export default {
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            /* typing(e) {
                if(e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage();
                }        
            }, */
            scrollToEnd() {    	
                var container = this.querySelector("#input-group");
                container.scrollTop = container.scrollHeight;
            },
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });
                //this.scrollToEnd();

                this.newMessage = ''
            }
        }    
    }
</script>