<template>
  <div>
      <ul>
          <li v-for="info in infos">CA-{{info.number}}</li>
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
        getCashierQue(){
            axios.get(this.theroute)
            .then(response => (this.infos = response.data.data))
            .catch(error => console.log(error));
        }
    },
    mounted(){
        Echo.channel('cashier-que')
        .listen('CashierQueChanged', (e) => {
            this.getCashierQue();
        });
        this.getCashierQue();
    }
  };
</script>