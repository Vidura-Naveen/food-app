
<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'
const form = useForm({
  csname: '',
  csphonenum: '',
  csdetails: '',
})
// function submit() {
//     router.post('customer/save',form)
//     // alert(1)
// }
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
        <h2 class="my-4">Contact Form</h2>
        <form @submit.prevent="form.post('/customer/save')">
            <div class="mb-3">
                <label for="cname" class="form-label">Company Name</label>
                <input type="text"  v-model="form.csname" class="form-control" id="cname" name="cname" placeholder="Enter company name" required>
            </div>
            
            <div class="mb-3">
                <label for="cphonenum" class="form-label">Phone Number</label>
                <input type="text"  v-model="form.csphonenum" class="form-control" id="cphonenum" name="cphonenum" placeholder="Enter phone number" required>
            </div>
            
            <div class="mb-3">
                <label for="cdetails" class="form-label">Details</label>
                <textarea class="form-control"  v-model="form.csdetails" id="cdetails" name="cdetails" rows="4" placeholder="Enter details" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
