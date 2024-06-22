<template>
  <div v-if="products"  class="flex flex-col lg:flex-row lg:flex-wrap ">
    <div v-for="(product, index) in products.slice(0, 25)" :key="product.id"  class="w-full lg:w-1/5 px-2 mb-4">
      <RouterLink :to="`/product-detail/${product.id}`">
        <div class=" p-2 bg-white border border-gray-300 rounded-lg">
            <div class="block h-40 rounded-xl overflow-hidden"> 
              <img class="w-full h-full" :src="product?.images[0]?.url"  alt="">
            </div>
            <div class="p-3">
              <h2 class="text-left text-lg text-gray-700  font-semibold line-clamp-2">{{product.title }}</h2>
              <div v-if="product?.bdt_price || usa_price"  class="flex justify-between mt-5">
                <p class=" pt-2 text-gray-500"><i class="font-sans text-base font-extrabold me-1">৳:</i>{{product.bdt_price}}</p>
                <p class=" pt-2 text-gray-500"><i  class="font-sans  text-base me-1">$:</i>{{product.usa_price}}</p>
              </div>
              <div v-else class="mt-6 font-semibold">
                Free
              </div>
          </div>
        </div>
      </RouterLink>
    </div>   
  </div>
</template>

<script setup>
import useAxios from "@/composables/useAxios.js"
import {ref,onMounted} from 'vue'
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

</script>