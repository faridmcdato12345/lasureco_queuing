<template>
  <div>
        <video id="myVideo" muted autoplay style="width: 100%" v-if="video">
            <source src=""+this.src+"" id="mp4Source" type="video/mp4">
        </video>
  </div>
</template>

<script>
  export default {
    props: [
        'route',
        'src'
    ],
    data(){
        return {
            video: null,
            theroute: this.route,
            thesrc: this.src
        }
    },
    methods: {
        getVideo(){
            axios.get(this.theroute)
            .then(response => (this.video = response.data.data))
            .catch(error => console.log(error));
        }
    },
    mounted(){
        Echo.channel('video')
        .listen('VideoChanged', (e) => {
            this.getVideo();
        });
        this.getVideo();
    }
  };
</script>