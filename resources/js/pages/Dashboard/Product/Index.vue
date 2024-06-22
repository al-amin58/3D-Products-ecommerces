<script setup>
import AppLayout from '@/components/Dashboard/Applayout/AppLayout.vue';
import useAxios from "@/composables/useAxios.js"
import { ref, onMounted } from "vue";
import { toast } from 'vue3-toastify';

const { loading, error, sendRequest } = useAxios();

const products = ref(null);
 const  getData = (async () => {
const responseData = await sendRequest({
     method: 'get',
     url: '/api/products',
     });
     products.value = responseData.data;
});
onMounted(() =>{
 getData()
});

const deleteData = async(id) => {
     try{
         const response = await sendRequest({
          method:'DELETE',
          url: `/api/products/${id}`
          });
          getData()
          if (response.data) {
               toast.success("Successfully Delete product", {
               autoClose: 1000,
               position: toast.POSITION.TOP_RIGHT,
          });
          }
     } catch (error){
           // Handle network errors or unexpected errors
          console.error("An error occurred:", error);
          toast.error(" Please try again later.", {
               autoClose: 3000,
               position: toast.POSITION.TOP_RIGHT,
          });
     }
     
}


</script>
<template>
<AppLayout>
     <div class="ms-5 me-5 mt-5">
        <div class="flex justify-between">
           <h2 class="font-sans font-semibold text-3xl">Manage Product</h2>
          <button class="font-sans text-base font-semibold h-10  me-10 text-white bg-primary hover:bg-purple-900  rounded-3xl">
               <RouterLink to="/add-product" class="flex content-center align-middle ps-3 pe-3">
                    + Add Product
               </RouterLink>
          </button>  
        </div>
        <div class="mt-10 w-full ">
          <ul class="grid grid-cols-1 lg:grid-cols-2  gap-1">
               <li v-for="product in products" :key="product.id" class="mb-4 shadow-2xl shadow-primary font-sans  me-8 ">
                   
                         <div class=" rounded-xl p-5 h-52 flex flex-row bg-white">
                              <div class="basis-1/3 bg-white rounded-lg">
                                   <img  :src="product?.images[0]?.url" class="h-44 rounded-lg w-40 object-cover " alt="Don't Image..!">
                              </div>
                              <div class="basis-2/3 ms-2 rounded-md ">
                                   <div class="p-2">
                                        <RouterLink :to="`/product-detail/${product.id}`">
                                             <h2 class="font-medium text-lg line-clamp-2" >{{ product.title }}</h2>
                                        </RouterLink>
                                        <div v-if="product?.bdt_price || usa_price" >
                                             <div class="flex gap-5 mt-2 items-end pt-2 font-medium justify-between uppercase">
                                                  <h4>bdt</h4>
                                                  <h4>usa</h4>
                                             </div>
                                             <div class="flex gap-5 justify-between mt-2">
                                                  <h4>{{product.bdt_price}}</h4>
                                                  <h4>{{product.usa_price}}</h4>
                                             </div>
                                        </div>
                                        <div v-else class="mt-10 font-semibold">
                                             Free
                                        </div>
                                        
                                   </div>
                                   <div class="flex gap-5 justify-end mt-2">
                                        <!-- <h6 class="text-green-600 hover:text-green-700 w-5 "> -->
                                        <button class="flex justify-center items-center text-green-950 bg-green-100 w-12 h-7 rounded-full hover:text-green-950 hover:bg-green-200">
                                             <RouterLink :to="`/edit-product/${product.id}`"> 
                                                  <img src="@/assets/images/edit.svg" class="w-5 "> 
                                             </RouterLink>
                                        </button>
                                                  <!-- </h6> -->
                                        <button @click="deleteData(product.id)" class="flex justify-center items-center  bg-red-100 w-12 h-7 rounded-full hover:text-red-950 hover:bg-red-200">
                                             <img src="@/assets/images/trash-2.svg" class="w-5 text-red-950 "> 
                                        </button>
                                   </div>
                              </div>
                              
                         </div>
                    
               </li>
          </ul>
        </div>
     </div>

</AppLayout>
    
</template>
<style>

</style>

