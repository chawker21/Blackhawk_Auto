


require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('Tracker', require('./components/Tracker.vue'));

const app = new Vue({
    el: '#app',

        data: {

            message: '',

            chat:{
                message:[],
                user:[],
                color:[]
            }
        },

        watch:{
        message() {
            Echo.channel('TrackerChannel')
                .listen('typing', {
                    name: this.message

                });
        }
        },

        methods: {
            send() {
                if (this.message.length != 0) {
                    this.chat.message.push(this.message);
                    this.chat.user.push('you');
                    this.chat.color.push('success');
                    axios.post('/send', {
                        message : this.message
                    })
                        .then(response => {
                            console.log(response);
                            this.message = ''
                        })
                        .catch(error => {
                            console.log(error);
                        });

                }
            }
        },
    mounted() {
        Echo.channel('TrackerChannel')
            .listen('TrackerEvent', (data) => {
                this.chat.message.push(data.message);
                this.chat.user.push(data.user);
                this.chat.color.push('info');
                    console.log(data);
            });
    }


});
