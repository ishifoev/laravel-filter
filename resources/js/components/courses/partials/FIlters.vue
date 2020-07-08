<template>
    <div class="filters">
        {{ selectedFilters }}
       <div class="list-group" v-for="map, key in filters">
           <a href="#"
            class="list-group-item" 
            v-for="filter, value in map" @click.prevent="activateFilter(key, value)">
            {{ filter }}
            </a>
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
            filters: {},
            selectedFilters: {}
        }
    },
    mounted() {
      axios.get(this.endpoints).then((response)=> {
          this.filters = response.data.data
      })
    },

    methods: {
       activateFilter(key, value) {
          this.selectedFilters = Object.assign({ }, this.selectedFilters, { [key]: value })
          this.$router.replace({
              query: {
                  ...this.selectedFilters
              }
          })
       }
    }
}
</script>