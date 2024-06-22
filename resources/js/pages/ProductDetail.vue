<template>
  <AppLayout>
    <div class="container mt-5 border-t-black">
      <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2">
          <div class="flex flex-row flex-wrap ">
            <div class="w-full h-full p-5">
              <Swiper
                  :spaceBetween="40"
                  :centeredSlides="true"
                  :autoplay="{
                  delay: 3000,
                    disableOnInteraction: false,
                  }"
                  :pagination="{
                    clickable: true,
                  }"
                  :modules="modules"
                  class="mySwiper"
              
              >
                <SwiperSlide v-if="product" v-for="image in product.images" :key="image.id">
                  <img class="w-full h-[500px]" :src="image?.url" alt=" no image ..!">
                </SwiperSlide>
              </Swiper>
            </div>
          </div>
        </div>
        <div class="flex flex-row border border-spacing-2"></div>
        <div class="w-full lg:w-1/2">
          <div class="pl-10 pt-5">
            <h2 class="font-normal text-2xl pb-5">{{product?.title}}</h2>
            <div>
              <div class="w-full  p-2">
                <p class="py-2 rounded text-[#822EF5] w-full font-semibold">Category:{{product?.category_id}}</p>
              </div>
              <div  v-if="product?.bdt_price || usa_price">
                <div class="flex gap-5 mb-5">
                  <div>
                    <input class="hidden selectbdt" type="radio" id="bdt" name="currency" v-model="selectedCurrency" value="bdt">
                    <label for="bdt" class="flex justify-center w-20  cursor-pointer px-3 py-1 shadow rounded-md h-auto border border-gray-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="28" viewBox="0 0 24 24"><path fill="#030303" d="M18.09 10.5V9h-8.5V4.5A1.5 1.5 0 0 0 8.09 3a1.5 1.5 0 0 0-1.5 1.5A1.5 1.5 0 0 0 8.09 6v3h-3v1.5h3v6.2c0 2.36 1.91 4.27 4.25 4.3c2.34-.04 4.2-1.96 4.16-4.3c0-1.59-.75-3.09-2-4.08a4 4 0 0 0-.7-.47c-.22-.1-.46-.15-.7-.15c-.71 0-1.36.39-1.71 1c-.19.3-.29.65-.29 1c.01 1.1.9 2 2.01 2c.62 0 1.2-.31 1.58-.8c.21.47.31.98.31 1.5c.04 1.5-1.14 2.75-2.66 2.8c-1.53 0-2.76-1.27-2.75-2.8v-6.2z"/></svg>
                    </label>
                  </div>
                  <div>
                    <input class="hidden selectusa" type="radio" id="usa" name="currency" v-model="selectedCurrency" value="usa">
                      <label for="usa" class=" w-20 flex justify-center cursor-pointer px-3 py-1 shadow rounded-md h-auto border border-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="28" viewBox="0 0 256 256"><path fill="#030303" d="M204 168a52.06 52.06 0 0 1-52 52h-12v12a12 12 0 0 1-24 0v-12h-12a52.06 52.06 0 0 1-52-52a12 12 0 0 1 24 0a28 28 0 0 0 28 28h48a28 28 0 0 0 0-56h-40a52 52 0 0 1 0-104h4V24a12 12 0 0 1 24 0v12h4a52.06 52.06 0 0 1 52 52a12 12 0 0 1-24 0a28 28 0 0 0-28-28h-32a28 28 0 0 0 0 56h40a52.06 52.06 0 0 1 52 52"/></svg>
                      </label>
                    </div>
                  </div>
                  
                  <div  class="flex gap-5 ">
                    <div v-if="selectedCurrency === 'bdt'" class="w-full   "> 
                      <p  class=" rounded-md  flex justify-start text-[#822EF5] w-full  items-center p-2">
                      <span class="font-bold text-2xl"><span class="text-black"> Price:</span> {{product?.bdt_price}} </span> 
                      </p>
                    </div>
                    <div v-else class="w-full">
                      <button class="rounded-md flex justify-start  text-[#822EF5] w-full items-center p-2">
                        <span class="font-bold text-2xl "> <span class="text-black"> Price:</span> {{product?.usa_price}} </span>
                      </button>
                    </div>
                </div>
              </div>
             <h2  v-else class="font-extrabold text-3xl "> Free </h2>
            </div>
           
            <div class="mt-20">
              <RouterLink :to="`/checkout/${product?.id}`" v-if="product?.bdt_price || usa_price">
                <button class="w-40 text-white bg-[#3a3047] py-3 ps-2 rounded mb-5  flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24"  viewBox="0 0 24 24"><path fill="currentColor" d="m15.37 3.44l3.212 5.562h3.423v2h-1.167l-.757 9.083a1 1 0 0 1-.996.917H4.925a1 1 0 0 1-.997-.917l-.757-9.083H2.005v-2h3.422L8.639 3.44l1.732 1l-2.634 4.562h8.535L13.639 4.44zm3.46 7.562H5.179l.667 8h12.319zm-5.825 2v4h-2v-4zm-4 0v4h-2v-4zm8 0v4h-2v-4z"/></svg>
                  Order Now 
                </button>
              </RouterLink>
              <div v-else>
                <button class="w-40 text-white bg-[#3a3047] py-3 rounded mb-5 max-sm:mt-5 "><i class="fa-solid fa-download px-3"></i>DOWNLOAD </button>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col border border-spacing-2 mt-5 container"></div>
    <div class="container">
      <div class="w-full">
        <h2 class="font-semibold text-2xl mt-5 underline text-center">Description</h2>
        <div class=" py-4 text-left mt-2 ">
          <p class="text-black">  
           {{product?.description}} 
          </p>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from "@/components/AppLayout.vue";
const { loading, error, sendRequest } = useAxios();
import useAxios from "@/composables/useAxios.js"
import { useRoute } from 'vue-router'
import { ref, onMounted } from 'vue'
import {Swiper, SwiperSlide} from "swiper/vue";
import { Autoplay, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
const modules = [ Autoplay, Navigation];
const { params } = useRoute();

const product = ref()
const getProduct = (async () => {
const response = await sendRequest({
    method: 'get',
    url: `api/products/${params.id} `,
    });
    product.value = response.data;

});
onMounted(()=>{
  getProduct()
});

const selectedCurrency = ref(null);

const handleRadioClick = (value) => {
  if (selectedCurrency.value === value) {
    selectedCurrency.value = null;
  }
};

</script>
<style scoped>
 .selectbdt[type="radio"]:checked + label,
  .selectusa[type="radio"]:checked + label {
    background: rgb(119, 235, 171);
    color: #fff;
    transition: all ease-in-out 0.3s;
  }
</style>