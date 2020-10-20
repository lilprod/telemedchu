
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

//const files = require.context('./', true, /\.vue$/i);
//files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-messages', require('./components/ChatMessagesComponent.vue').default);
Vue.component('chat-form', require('./components/ChatFormComponent.vue').default);
//require('./components/ChatFormComponent.vue').default;



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',

  data: {
      message: '',
      messages: [],
      typing: false,
      userID: null,
  },
  mounted () {
    // Assign the ID from meta tag for future use in application
    this.userID = document.head.querySelector('meta[name="userID"]').content
  },

  watch: {
    message() {
      Echo.private('chat')
        .whisper('typing', {
          name:this.message
        });
    }
  },
  created() {
      this.fetchMessages();
      Echo.private('chat')
            .listen('MessageSent', (e) => {
              this.messages.push({
                message: e.message.message,
                user: e.user
        });
      });
  },

  methods: {
    
      fetchMessages() {
          axios.get('/messages').then(response => {
              this.messages = response.data;
          });
      },

      addMessage(message) {
          this.messages.push(message);

          axios.post('/messages', message).then(response => {
            console.log(response.data);
          });
      }
  }
});