<template>
    <div>
        <p v-if="info">CO-{{info.number}}</p>
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
        getComplaintView(){
            axios.get(this.viewRoute)
            .then(response => (this.info = response.data))
            .catch(error => console.log(error))
        }
    },
    mounted(){
        Echo.channel('complaint-view')
        .listen('ComplaintViewChanged', (e) => {
            this.getComplaintView();
            var audio = new Audio(this.audiopath + '/notif.ogg');
            audio.play();
        });
    }
}
</script>