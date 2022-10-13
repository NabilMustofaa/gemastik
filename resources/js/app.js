import axios from 'axios';
import './bootstrap';

const messages = document.getElementById('message-div');
const messageReceiver = document.getElementById('message-receiver');
console.log(messageReceiver.value);
const messageSender = document.getElementById('message-sender');
const username = document.getElementById('message-name');
const messageInput = document.getElementById('message-input');
const messageForm = document.getElementById('message-form');
const messageScroll = document.getElementById('message-scroll');
messageScroll.scrollTop = messageScroll.scrollHeight;



messageForm.addEventListener('submit', function (e) {
    axios.post('/api/message', {
        receiver_id: messageReceiver.value,
        sender_id: messageSender.value,
        message: messageInput.value
    });

    e.preventDefault();
    const options ={
        method: 'POST',
        url: '/messages',
        data:{
            receiver_id: messageReceiver.value,
            sender_id: messageSender.value,
            message: messageInput.value
        }
    }
    axios(options);
    messageInput.value = '';
});

window.Echo.channel('chat').listen('.messages', (e) => {
    //api send
    
    if(e.sender_id == messageSender.value && e.receiver_id == messageReceiver.value || e.sender_id == messageReceiver.value && e.receiver_id == messageSender.value){
        if(e.receiver_id === messageReceiver.value){
            messages.innerHTML += `<div class=" flex justify-end items-center py-2 px-4">
        <div class=" flex flex-col items-end">
            <h3 class=" text-xs text-white bg-pink-300 rounded-md px-4 py-2">`+ e.message +`</h3>
            <h3 class=" text-xs text-gray-500"> 12:00 </h3>
        </div>
    </div>`
        }
        else if(e.receiver_id === messageSender.value){
            messages.innerHTML += `<div class=" flex justify-start items-center py-2 px-4">
        <div class=" flex flex-col items-end">
            <h3 class=" text-xs text-white bg-pink-300 rounded-md px-4 py-2">`+ e.message +`</h3>
            <h3 class=" text-xs text-gray-500"> 12:00 </h3>
        </div>
    </div>`
        }
        else if(e.sender_id === messageReceiver.value){
            messages.innerHTML += `<div class=" flex justify-start items-center py-2 px-4">
        <div class=" flex flex-col items-start">
            <h3 class=" text-xs text-white bg-pink-300 rounded-md px-4 py-2">`+ e.message +`</h3>
            <h3 class=" text-xs text-gray-500"> 12:00 </h3>
        </div>
        </div>`
        }
        else if (e.sender_id === messageSender.value){
           messages.innerHTML += `<div class=" flex justify-start items-center py-2 px-4">
           <div class=" flex flex-col items-start">
               <h3 class=" text-xs text-white bg-pink-300 rounded-md px-4 py-2">`+ e.message+ `</h3>
               <h3 class=" text-xs text-gray-500"> 12:00 </h3>
           </div>
       </div>`
        }
    }
    messageScroll.scrollTop = messageScroll.scrollHeight;

});