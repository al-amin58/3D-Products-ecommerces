<template>
    <AppLayout>
      <section>
        <div class="container">
            <div   class="flex flex-col lg:flex-row lg:flex-wrap ">
              <div v-for="product in filteredProducts" :key="product.id"  class="w-full lg:w-1/5 px-2 mb-4">
                <div class=" p-2 bg-white border border-gray-300 rounded-lg">
                    <RouterLink :to="`/product-detail/${product.id}`" class="block h-40 rounded-xl overflow-hidden">
                      <img class="w-full h-full" :src="product?.images[0]?.url"  alt="">
                    </RouterLink>
                    <div class="p-3">
                      <h2 class="text-left text-lg text-gray-700  font-semibold line-clamp-2">{{product.title }}</h2>
                      <div class="flex justify-between mt-5">
                        <p class=" pt-2 text-gray-500"><spen class="font-sans text-base font-extrabold me-1">৳:</spen>{{product.bdt_price}}</p>
                        <p class=" pt-2 text-gray-500"><spen  class="font-sans  text-base me-1">$:</spen>{{product.usa_price}}</p>
                      </div>
                  </div>
                  <div>
                    <RouterLink :to="`/product-detail/${product.id}`">
                    <button  class="bg-primary text-white p-1 font-semibold block w-full  hover:bg-purple-500 rounded-full"> Details </button>
                  </RouterLink>
                  </div>
                </div>
              </div>   
            </div>
          </div>
      </section>
    </AppLayout>
  </template>
  
  <script setup>
  
  import AppLayout from "@/components/AppLayout.vue";
  import useAxios from "@/composables/useAxios.js"
  import {ref,onMounted, computed} from 'vue'
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
  const paid ="paid";
  const filteredProducts = computed(() => {
    if (!products.value) return [];
    return products.value.filter(product => product.type === paid);
    });
  </script>
  
  <style scoped>
  
  </style>