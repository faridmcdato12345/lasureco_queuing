<template>
  <div>
      <ul>
          <li v-for="info in infos">CO-{{info.number}}</li>
      </ul>
  </div>
</template>

<script>
  export default {
    props: [
        'route'
    ],
    data(){
        return {
            users: null,
            theroute: this.route,
            infos: null,
        }
    },
    methods: {
        getComplaintQue(){
            axios.get(this.theroute)
            .then(response => (this.infos = response.data.data))
            .catch(error => console.log(error));
        }
    },
    mounted(){
        Echo.channel('complaint-que')
        .listen('ComplaintQueChanged', (e) => {
            this.getComplaintQue();
        });
        this.getComplaintQue();
    }
  };
</script>