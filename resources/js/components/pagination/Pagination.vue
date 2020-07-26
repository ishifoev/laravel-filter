<template>
   <nav aria-label="...">
  <ul class="pagination">
    <li :class="{'page-item disabled': meta.current_page === 1}">
      <a class="page-link" href="#" tabindex="-1"  @click.prevent="switched(meta.current_page -1)">Previous</a>
    </li>
    <li
        :class="{ 'page-item active': meta.current_page === x}" 
        v-for="x in meta.last_page"
    >
    <a class="page-link" href="#" @click.prevent="switched(x)">
        {{ x }}
        </a>
    </li>
   
    <li :class="{'page-item disabled': meta.current_page === meta.last_page}">
      <a class="page-link" href="#"  @click.prevent="switched(meta.current_page + 1)">Next</a>
    </li>
  </ul>
</nav>
</template>
<script>
export default {
      props: [
        'meta'
    ],
    methods: {
        switched(page) {
            if(this.pageIsOutOfBounds(page)) {
              return;
            } 
            this.$emit('pagination', page)

            this.$router.replace({
                query: Object.assign({}, this.$route.query, {page})
            })
        },
        pageIsOutOfBounds(page) {
           return page <= 0 || page > this.meta.last_page
        }
    }
}
</script>