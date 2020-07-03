<template>
<div class="container">
<div class="row">
    <div class="col-sm-3">
       filters
    </div>

    <div class="col-sm-9">
      <div class="card">
        <div class="card-body">
            <course v-for="course in courses" :course="course" :key="course.id">
              
            </course>
            <pagination :meta="meta" v-on:pagination="getCourses"></pagination>
        </div>
        </div>
    </div>
    
</div>
</div>


</template>
<script>
//import Course from './partials/Course.vue'
export default {
 
    data() {
        return {
            courses: [],
            meta: {}
        }
    },
    mounted() {
       this.getCourses()
    },
    methods: {
        getCourses(page = 1) {
         axios.get('/api/courses', {
             params: {
                 page
             }
         }).then((response) => {
            this.courses = response.data.data
            this.meta = response.data.meta
        })
        }
    }
}
</script>