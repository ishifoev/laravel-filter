<template>
    <div class="filters">
       <div class="list-group" v-for="map, key in filters">
           <a href="#" class="list-group-item" v-for="filter, value in map">{{ filter }}</a>
       </div>
    </div>
</template>
<script>
export default {
    props: [
      'endpoints'
    ],
    data() {
        return {
            filters: {}
        }
    },
    mounted() {
      axios.get(this.endpoints).then((response)=> {
          this.filters = response.data.data
      })
    }
}
</script>