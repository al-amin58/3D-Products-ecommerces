<template>
<!--------header start---------------------->
    <section class="back-img">
      <div class="container ">
        <!----------Nav start--------------->
        <div class="flex justify-between ">
            <div class="flex gap-x-5 items-center mt-3">
              <div >
                <button @click="isOpen = true">
                  <svg class="text-primary"mlns="http://www.w3.org/2000/svg" width="32" height="40" viewBox="0 0 56 56"><path  d="M6.063 19.539h43.851c.984 0 1.805-.773 1.805-1.758c0-.984-.82-1.781-1.805-1.781H6.063a1.78 1.78 0 0 0-1.782 1.781a1.76 1.76 0 0 0 1.782 1.758m0 10.219h43.851c.984 0 1.805-.774 1.805-1.758c0-1.008-.82-1.805-1.805-1.805H6.063c-.985 0-1.782.797-1.782 1.805a1.76 1.76 0 0 0 1.782 1.758m0 10.242h43.851c.984 0 1.805-.797 1.805-1.805c0-.984-.82-1.758-1.805-1.758H6.063a1.76 1.76 0 0 0-1.782 1.758c0 1.008.797 1.805 1.782 1.805"/></svg>
                </button>
               <aside v-if="isOpen " class="fixed bg-black opacity-75 w-full h-screen max-w-xs top-0 left-0 bottom-0 transform overflow-auto ease-in-out transition duration-300 z-30" :class="isOpen ? 'translate-x-0' : '-translate-x-full'">
                  <div class="text-white ms-5 mt-2">
                    <div class="flex justify-end me-5">
                      <button @click="isOpen = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="40" viewBox="0 0 24 24"><path fill="#fff" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg>
                      </button>
                    </div>
                  <div class="mt-10">
                    <div class="m-5 hover:text-primary font-medium text-xl">
                      <RouterLink to="/">Home</RouterLink>
                    </div>
                    <div class="m-5 hover:text-primary font-medium text-xl">
                      <RouterLink to="/products">Products</RouterLink>
                    </div>
                    <div class="m-5 hover:text-primary font-medium text-xl">
                      <RouterLink to="/blog">
                        Blogs
                      </RouterLink>
                    </div>
                    <div class="m-5 hover:text-primary font-medium text-xl">
                      <RouterLink to="/contact">Contact</RouterLink>
                    </div>
                    <div class="m-5 hover:text-primary font-medium text-lg">
                      <RouterLink to="/profile">Profile</RouterLink>
                    </div>
                  </div>
                  <div class="grid grid-cols-4 gap-2 place-items-end h-60 me-10">
                   <div ><a href="#"><i class="fa-brands fa-facebook text-white hover:text-primary "></i></a></div>
                    <div ><a href="#"><i class="fa-solid fa-basketball text-white hover:text-primary "></i></a></div>
                    <div ><a href="#"><i class="fa-brands fa-square-instagram text-white hover:text-primary "></i></a></div>
                    <div><a href="#"><i class="fa-brands fa-twitter text-white hover:text-primary "></i></a></div>
                  </div>
                  </div>
                </aside>
              </div> 

              <div class=" flex gap-5 max-sm:hidden text-lg">
                <div class=" hover:text-primary font-normal ">
                  <RouterLink to="/freeproducts">
                    Free 3D Models
                  </RouterLink>
                </div>
                <div class=" hover:text-primary font-normal">
                  <RouterLink to="/premiumproducts">
                    Premium 3D Models
                  </RouterLink>
                </div>
              </div>
            </div>  
            <div class="mt-3 items-center ">
              <div  class="flex lg:flex max-sm:justify-between gap-5 "  v-if="auth?.user?.type === 0" >
               
                <div>
                  <RouterLink to="/user/dashbord" class="flex  text-xl items-center justify-center text-black font-semibold hover:text-primary">
                    <svg class="w-6 h-6 me-1"xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15t3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4T6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5t1.013-2.488T12 6t2.488 1.013T15.5 9.5t-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17t-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5t-.425-1.075T12 8t-1.075.425T10.5 9.5t.425 1.075T12 11m0 7.5"></path></svg>
                    <div  class="relative">{{auth?.user?.name}}</div>
                  </RouterLink>
                </div>
              </div>
              <div v-else class="flex mt-3 text-sm lg:text-lg">
                  <div class="hover:text-primary font-normal" >
                    <RouterLink to="/login" >
                        Login
                    </RouterLink>
                  </div>
                  <p class="font-normal text-xs items-center pt-1 text-primary max-sm:text-xs" >-or-</p>
                  <div class=" hover:text-primary font-normal ">
                    <RouterLink to="/register">
                      Create free Account
                    </RouterLink>
                  </div>
              </div>
            </div>
        </div>
        <!----------Nav end---------------->
        <div class="flex flex-col lg:flex-row">
          <div class="w-full lg:w-1/2 mx-auto">
            <div class="lg:py-20">
              <h2  class="font-bold text-2xl lg:text-4xl text-black text-center pt-12 pb-5 lg:py-12 mx-auto">Faruke3D</h2>
             <div class="w-96 max-sm:w-72  mx-auto flex items-center ">
              <input class="p-5 rounded-lg h-10 lg:h-12 hover:bg-gray-100 hover:text-black"  placeholder="Search...">
              <svg  class="-ml-14 " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path  d="M9.539 15.23q-2.398 0-4.065-1.666Q3.808 11.899 3.808 9.5t1.666-4.065T9.539 3.77t4.064 1.666T15.269 9.5q0 1.042-.369 2.017t-.97 1.668l5.909 5.907q.14.14.15.345q.009.203-.15.363q-.16.16-.354.16t-.354-.16l-5.908-5.908q-.75.639-1.725.989t-1.96.35m0-1q1.99 0 3.361-1.37q1.37-1.37 1.37-3.361T12.9 6.14T9.54 4.77q-1.991 0-3.361 1.37T4.808 9.5t1.37 3.36t3.36 1.37"/></svg>
             </div>
            </div>
            <div class=" flex flex-row justify-center gap-5 mt-20 lg:hidden md:hidden">
                <div class=" hover:text-primary font-normal text-sm ">
                  <RouterLink to="/freeproducts">
                    Free 3D Models
                  </RouterLink>
                </div>
                <div class=" hover:text-primary font-normal text-sm">
                  <RouterLink to="/premiumproducts" >
                    Premium 3D Models
                  </RouterLink>
                </div>
              </div>
          </div>
          
        </div>
      </div>
    </section>
    <!----------header end-------------------->

    <section>
      <div class="container mb-16">
        <div v-if="categorys" class="lg:flex lg:justify-center lg:flex-row mt-5 lg:gap-5 lg:me-0  grid grid-cols-2 gap-5 me-5 ">
          <div v-for="(category, index) in categorys.slice(0, 6)" :key="category.id" class="h-20 w-40 mt-10 lg:mt-0 flex flex-col items-center">
             <img :src="category.image" class="w-28 h-28 rounded-md" >
             <p>{{category.name}}</p>
          </div>
        </div>
      </div>
    </section>
    <section >
      <div class="container relative">
        
        <div class="pt-24 relative z-20 ">
         <ProductCard />
        </div>
      </div>

    </section>
   
   <!-----------footer--------------->
   <section>
      <footer class="footer-sec-top bg-gray-500 text-white">
          <div class="container">
            <div class="flex flex-col lg:flex-row">
              <div class="w-full lg:w-1/4">
                <div class="text-left text-white lg:border-gray-600 mb-8 lg:my-10 max-sm:pt-5">
                  <h2 class="text-3xl font-semibold pl-8">Tred Inc.</h2>
                  <p class="p-10">Lorem ipsum dolor simet and it is a long established fact that a reader will be distracted.</p>
                  <div class="pl-8">
                    <input class="shadow-lg pl-2 rounded" type="email" name="email" id="email" placeholder=" Your Email ">
                  </div>
                  <div class="my-10 text-center ">
                    <PrimaryButton href="/contact" label="Subscribe" />
                  </div>
                </div>
              </div>
            
                <div class="w-full lg:w-1/4">
                  <div class="text-center  lg:border-gray-600 mb-8 lg:my-10">
                    <h2 class="text-3xl font-semibold pb-5">Menu</h2>
                    <ul class="text-left max-w-16 mx-auto">
                      <li class="pb-3  hover:text-primary font-medium ">
                        <a href="/">HOME</a></li>
                      <li class="pb-3  hover:text-primary font-medium"><a href="/products">PRODUCTS</a></li>
                      <li class=" pb-3  hover:text-primary font-medium"><a href="/blog">BLOG</a></li>
                      <li class=" pb-3  hover:text-primary font-medium"><a href="/contact">CONTACT</a></li>
                      <li class=" pb-3  hover:text-primary font-medium"><a href="/profile">PROFILE</a></li>
                    </ul>
                  </div>
                </div>

                <div class="w-full lg:w-1/4">
                  <div class="text-center mb-8 lg:my-10">
                    <h2 class="text-3xl font-semibold pb-5">Socials</h2>
                    <ul class="text-left max-w-32 mx-auto">
                      <li class="pb-3"><a href="#"><i class="fa-brands fa-facebook px-2 text-white hover:text-primary text-lg"></i></a>Facebook</li>
                      <li class="pb-3"><a href="#"><i class="fa-solid fa-basketball px-2 text-white hover:text-primary text-lg"></i></a>Dribbble</li>
                      <li class="pb-3"><a href="#"><i class="fa-brands fa-square-instagram px-2 text-white hover:text-primary text-lg"></i></a>Instagram</li>
                      <li><a href="#"><i class="fa-brands fa-twitter px-2 text-white hover:text-primary text-lg"></i></a>Twitter</li>
                    </ul>
                  </div>
                </div>
            
              <div class="w-full lg:w-1/4">
                <div class="text-center mb-8 lg:my-10">
                  <h2 class="text-3xl font-semibold pb-8">Contact</h2>

                  <a class="block" href="tel:0145678978">  1 800 123 4567</a>
                    <a class="block" href="mailto:email@email.com">info@example.com</a>
                  <address>
                    1122 Potter Rd, Antelope,
                    CA 32802
                  </address>

                </div>
              </div>

            </div>
          </div>
          <!--Footer Border-->
        <section class="footer-style bg-gray-500  ">
          <div class="container py-2 pt-3 lg:justify-between flex flex-col lg:flex-row text-center border-t-2  border-black">

            <p class="text-white text-sm font-normal"> &copy; 2024 How to Mechatronics. All Rights Reserved. </p>

            <p class="text-white text-sm font-normal"><a class="text-white "  target="_blank" href="https://creativetechpark.com/">Web Development Company </a> Creative Tech Park </p>

          </div>
        </section>
      </footer>
   </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import ProductCard from "@/components/ProductCard.vue";
import 'swiper/css';
import 'swiper/css/navigation';
import {useAuthStore} from "@/stores/useAuthStore.js"; 
import useAxios from "@/composables/useAxios.js"
const { loading, error, sendRequest } = useAxios();
const isOpen = ref(false);
const auth = useAuthStore();

const categorys = ref(null);
const getCategory = (async () => {
  const response = await sendRequest({
    method: 'get',
    url: '/api/categories',
  });
 
  categorys.value = response.data;
});
onMounted( () =>{
 getCategory()
});

</script>

<style scoped>
.thunder {
  height: 190px; /* control the size */
  aspect-ratio: 0.56;
  clip-path: polygon(100% 0, 23% 46%, 46% 44%, 15% 69%, 38% 67%, 0 100%, 76% 57%, 53% 58%, 88% 33%, 60% 37%);
 @apply bg-primary;
}
.back-img{
  background: url("https://img.freepik.com/free-photo/3d-background-with-white-cubes_23-2150473002.jpg?t=st=1717330073~exp=1717333673~hmac=5438864837dde9305aa8ae4c4071b1476230956a6441a6d8d9407cfd0fe736a8&w=740");
  @apply bg-no-repeat bg-center bg-cover h-[500px] bg-fixed;
}

</style>
