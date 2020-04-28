<template>
    <div class="conversation">
        <h1>{{ contact ? contact.name : 'Select a contact'}}</h1>
        <messagesFeed :contact="contact" :messages="messages" />
        <MessageComposer @send="SendMessage"/>
    </div>
</template>

<script>
import MessageComposer from './MessageComposer';
import MessagesFeed from './MessagesFeed';

export default {
    props:{
        contact:{
            type: Object,
            default: null
        },
        messages: {
            type:Array,
            default: []
        }
    },
    methods: {
        SendMessage(text){
         if (!this.contact){
             return;
         }
         axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
         }).then((response)=>{
             this.$emit('new',response.data); 
         })
        }
    },

     components: {MessageComposer, MessagesFeed }
}
</script>

<style lang="scss" scoped>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed lightgray;
    }
}
</style>