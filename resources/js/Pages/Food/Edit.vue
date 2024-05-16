
<script setup>
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps(
    {
        errors:Object,
        foodpassfromedit:Object
    }
);

const form = useForm({
  foodname: props.foodpassfromedit.foodname,
  foodprice:  props.foodpassfromedit.foodprice,
  fooddetails:  props.foodpassfromedit.fooddetails,
})

function submit(id) {
    router.put('/food/update/'+id,form)
    // alert(id)
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                    <h2 class="my-4">Edit Food Form</h2>
                    <form @submit.prevent="submit(foodpassfromedit.id)">
                        <div class="mb-3">
                            <label for="cname" class="form-label">foodname</label>
                            <input type="text"  v-model="form.foodname" class="form-control" id="" name="" placeholder="Enter name" >
                            <div class="text-danger text-xs" v-if="errors.foodname">{{errors.foodname}}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cphonenum" class="form-label">foodprice</label>
                            <input type="text"  v-model="form.foodprice" class="form-control" id="" name="" placeholder="Enter price" >
                            <div class="text-danger text-xs" v-if="errors.foodprice">{{errors.foodprice}}</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cdetails" class="form-label">fooddetails</label>
                            <textarea class="form-control"  v-model="form.fooddetails" id="" name="" rows="4" placeholder="Enter details" ></textarea>
                            <div class="text-danger text-xs" v-if="errors.fooddetails">{{ errors.fooddetails }}</div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
