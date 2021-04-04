<template>
    <div>
        <p v-if="info">CA-{{info.number}}</p>
    </div>
</template>
<script>
export default {
    props:[
        'route',
        'audiopath'
    ],
    data(){
        return{
            viewRoute: this.route,
            info: null,
            audioPath: this.audiopath,
        }
    },
    methods:{
        getCashierView(){
            axios.get(this.viewRoute)
            .then(response => (this.info = response.data))
            .catch(error => console.log(error))
        }
    },
    mounted(){
        Echo.channel('cashier-view')
        .listen('CashierViewChanged', (e) => {
            this.getCashierView();
            var audio = new Audio(this.audiopath + '/notif.ogg');
            audio.play();
        });
    }
}
</script>