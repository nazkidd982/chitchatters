<script setup>
import {onMounted, onUpdated, ref} from 'vue';
import axios from 'axios';
import moment from 'moment';

const props = defineProps({
    user: Object,
});

const messages = ref([]);
const newMessage = ref('');
const hasScrolledToBottom = ref('');

onMounted(() => {
    fetchMessages();
});

onUpdated(() => {
    scrollBottom();
});

Echo.private('chat-channel')
    .listen('SendMessage', (e) => {
        messages.value.push({
            message: e.message.message,
            user: e.user
        });
    });

const fetchMessages = async () => {
    axios.get('/messages').then(response => {
        messages.value = response.data;
    });
};

const addMessage = async () => {
    let user_message = {
        user: props.user,
        message: newMessage.value
    };
    messages.value.push(user_message);
    axios.post('/messages', user_message).then(response => {
        // console.log(response.data);
    });
    newMessage.value = ''
};

const scrollBottom = () => {
    if (messages.value.length > 1) {
        let el = hasScrolledToBottom.value;
        el.scrollTop = el.scrollHeight;
    }
};
</script>

<template>
    <div class="chat card">
        <div ref="hasScrolledToBottom" class="scrollable card-body">
            <template v-for="message in messages">
                <div v-if="user.id !== message.user.id" class="message message-receive">
                    <p>
                        <strong class="primary-font">
                            {{ message.user.username }} :
                        </strong><br>
                        {{ message.message }}<br>
                        <span class="message-time-receive">{{ moment(message.created_at).format('DD-MM-YY hh:mm a') }}</span>
                    </p>
                </div>
                <div v-else class="message message-send">
                    <p>
                        <strong class="primary-font">
                            {{ message.user.username }} :
                        </strong><br>
                        {{ message.message }}<br>
                        <span class="message-time-send">{{ moment(message.created_at).format('DD-MM-YY hh:mm a') }}</span>
                    </p>
                </div>
            </template>
        </div>

        <div class="chat-form input-group">
            <input id="btn-input" v-model="newMessage" class="form-control input-sm message-input" name="message"
                   placeholder="Type your message here..." type="text" @keyup.enter="addMessage">
            <div class="input-group-append">
	            <button id="btn-chat" class="btn btn-primary" @click="addMessage">
	                Send
	            </button>
            </div>
        </div>

    </div>
</template>
