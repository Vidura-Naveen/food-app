<!-- <script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
export default {
    components:{
        Link
    },
props:{
    customerpass:{
        type:Array,
        default:[]
    }
}
}
</script> -->
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
defineProps({
    foodpassprops: Object
});

function destroy(foodid) {
  router.delete('/food/delete/'+foodid)
  // alert(foodid)
}
function edit(foodid) {
  router.get('/food/'+foodid+'/edit')
  // alert(foodid)
}
</script>

<template>
      <AppLayout title="Customer">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Food
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              
              <div class="text-center">
                <button type="button" class="btn btn-primary btn-lg btn-block" ><Link :href="`/food/create`" >Add Post</Link></button>
              </div>
              <div>
              <br><br>
              <div v-if="$page.props.flash.message" class="alert alert-success">
              <strong>{{ $page.props.flash.message }} </strong>
              </div>
              <br><br>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Food</th>
                <th scope="col">Price</th>
                <th scope="col">Food Details</th>
                <th scope="col">Read</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>

            <tbody class="blog_block" v-for="foodfor in foodpassprops" :key="foodfor.foodid">
              <tr>
                    <th scope="row">{{ foodfor.foodid }}</th>
                    <td> {{ foodfor.foodname }} </td>
                    <td> {{ foodfor.foodprice }} </td>
                    <td> {{ foodfor.fooddetails }} </td>
                    <td> <button class="btn btn-outline-info">View</button> </td>
                    <td> <button @click.prevent="edit(foodfor.foodid)" class="btn btn-outline-primary">Edit</button></td>
                    <td> <button @click.prevent="destroy(foodfor.foodid)" class="btn btn-outline-danger">Delete</button> </td>
              </tr>
            </tbody>
          </table>
    </div>
            </div>
        </div>
    </AppLayout> 
</template>



<style>
</style>
