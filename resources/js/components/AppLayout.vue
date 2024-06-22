<template>
  <div class="lg:hidden flex items-center justify-between py-3 bg-black px-2 fixed top-0 left-0 right-0 w-full z-50">
    <RouterLink to="/"  class="font-extrabold  text-3xl text-white text-center">Faruk3D</RouterLink>
    <button @click="toggleNav = !toggleNav">
      <svg v-if="toggleNav" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#fff" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg>
      <svg v-else xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#fff" d="M9 18h12v-2H9zM3 6v2h18V6zm6 7h12v-2H9z"/></svg>
    </button>
  </div>
  <nav class="bg-black opacity-90 text-white text-xl p-5 font-semibold fixed top-0 right-0 bottom-0 w-80 h-screen z-40 lg:hidden transition-all ease-in-out duration-300" :class="{'translate-x-0': toggleNav, 'translate-x-80': !toggleNav}">
    <ul>
      <li class=" py-2">
        <button><svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cancel</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="work-case" fill="#000000" transform="translate(91.520000, 91.520000)"> <polygon id="Close" points="328.96 30.2933333 298.666667 1.42108547e-14 164.48 134.4 30.2933333 1.42108547e-14 1.42108547e-14 30.2933333 134.4 164.48 1.42108547e-14 298.666667 30.2933333 328.96 164.48 194.56 298.666667 328.96 328.96 298.666667 194.56 164.48"> </polygon> </g> </g> </g></svg></button>
      </li>
      <li class=" py-2">
        <a href="/">Home</a>
      </li>
      <li class=" py-2">
        <RouterLink to="/products">Products</RouterLink>
      </li>
      <li class=" py-2">
        <RouterLink to="/blog">Blogs</RouterLink>
      </li>
      <li class=" py-2">
        <RouterLink to="/contact">Contact</RouterLink>
      </li>
      <li class=" py-2">
        <RouterLink to="/profile">Profile</RouterLink>
      </li>
      <div class=" flex gap-5 text-base my-5">
        <div class="font-normal ring-1 p-1 ring-white">
          <RouterLink to="/freeproducts">
            Free 3D Models
          </RouterLink>
        </div>
        <div class="font-normal ring-1 p-1 ring-white">
          <RouterLink to="/premiumproducts">
            Premium 3D Models
          </RouterLink>
        </div>
      </div>
      <li v-if="auth?.user?.type === 0"  class=" py-2">
            <RouterLink to="/user/dashbord" class="flex mt-2 font-medium text-primary">
                <svg class="w-6 h-6"xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15t3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4T6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5t1.013-2.488T12 6t2.488 1.013T15.5 9.5t-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17t-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5t-.425-1.075T12 8t-1.075.425T10.5 9.5t.425 1.075T12 11m0 7.5"></path></svg>
                <div  class="relative">{{auth?.user?.name}}</div>
            </RouterLink>
          </li>
          <li v-else>
            <RouterLink to="/login" class="mt-5 px-3 py-1 relative rounded group font-medium text-white inline-block" >
            <span class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
            <span class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
            <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-purple-600 from-blue-500"></span>
            <div class="relative"> Login</div>
            </RouterLink>
            <!--        login / register  button design  end-->
          </li>
    </ul>
  </nav>

  <nav class=" hidden lg:block">
    <section class="py-2 bg-black text-white">
      <div class="container flex justify-between ">
        <div class="flex gap-5 items-center">
          <div>
            <a href="/"  class="font-extrabold  text-3xl text-white text-center">Faruk3D</a>
          </div>
          <div>
            <div class="w-72 max-sm:w-48  mx-auto flex items-center ">
              <input class="p-5 rounded-lg h-8 lg:h-10 hover:bg-gray-100 hover:text-black"  placeholder="Search...">
              <svg  class="-ml-14 " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path  d="M9.539 15.23q-2.398 0-4.065-1.666Q3.808 11.899 3.808 9.5t1.666-4.065T9.539 3.77t4.064 1.666T15.269 9.5q0 1.042-.369 2.017t-.97 1.668l5.909 5.907q.14.14.15.345q.009.203-.15.363q-.16.16-.354.16t-.354-.16l-5.908-5.908q-.75.639-1.725.989t-1.96.35m0-1q1.99 0 3.361-1.37q1.37-1.37 1.37-3.361T12.9 6.14T9.54 4.77q-1.991 0-3.361 1.37T4.808 9.5t1.37 3.36t3.36 1.37"/></svg>
             </div>
          </div>
          <div class=" flex gap-5 text-base">
            <div class="font-normal ">
              <RouterLink to="/freeproducts">
                Free 3D Models
              </RouterLink>
            </div>
            <div class="  font-normal">
              <RouterLink to="/premiumproducts">
                Premium 3D Models
              </RouterLink>
            </div>
          </div>
        </div>
       
        <div class=" flex items-center ">
          <div  class="flex lg:flex max-sm:justify-between gap-5  text-white"  v-if="auth?.user?.type === 0" >
         
            <div>
              <RouterLink to="/user/dashbord" class="flex jug  font-normal text-white hover:text-primary items-center" >
                <svg class="w-6 h-6 me-1"xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15t3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4T6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5t1.013-2.488T12 6t2.488 1.013T15.5 9.5t-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q1.325 0 2.5-.387t2.15-1.113q-.975-.725-2.15-1.112T12 17t-2.5.388T7.35 18.5q.975.725 2.15 1.113T12 20m0-9q.65 0 1.075-.425T13.5 9.5t-.425-1.075T12 8t-1.075.425T10.5 9.5t.425 1.075T12 11m0 7.5"></path></svg>
                <div  class="text-white font-bold text-xl">{{auth?.user?.name}}</div>
              </RouterLink>
            </div>
          </div>
          <div v-else class="flex text-sm lg:text-base ">
            <div class="font-normal" >
              <RouterLink to="/login" >
                  Login
              </RouterLink>
            </div>
            <p class="font-normal text-xs items-center pt-1 text-primary max-sm:text-xs" >-or-</p>
            <div class="font-normal ">
              <RouterLink to="/register">
                Create free Account
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
      
    </section>
  </nav>
  <section class="max-sm:mt-16  ">
      <div class="container flex items-center justify-center py-2  ">
        <div v-if="categorys"  class="flex gap-5 max-sm:overflow-x-scroll ">
          <div v-for="(category, index) in categorys.slice(0, 10)" :key="category.id" class=" flex flex-col justify-center items-center cursor-pointer ">
             <img :src="category.image" class="w-10 h-8 lg:w-16 lg:h-16 rounded-md" >
             <p class="font-medium">{{category.name}}</p>
          </div>
        </div>
      </div>
  </section>

  <slot />
<!--footer design-->

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
  
    <!-- <footer class="footer-sec-top bg-white"> -->

      <!-- <div class="container">
        <h2 class="text-center text-primary text-3xl font-extrabold p-16">How to Mechatronics</h2>
        <div class="flex flex-col lg:flex-row">
          <div class="w-full lg:w-1/4">
            <div class="text-left text-gray-600 lg:border-gray-600 mb-8 lg:my-10">
              <h2 class="text-3xl font-semibold pl-8">Tred Inc.</h2>
              <p class="text-gray-600 p-10">Lorem ipsum dolor simet and it is a long established fact that a reader will be distracted.</p>
              <div class="pl-8">
                <input class="shadow-purple-300 shadow-lg pl-2 rounded" type="email" name="email" id="email" placeholder=" Your Email ">
              </div>
              <div class="my-10 text-center ">
                <PrimaryButton href="/contact" label="Subscribe" />
              </div>
            </div>
          </div>

          <div class="w-full lg:w-1/4">
            <div class="text-center text-gray-600 lg:border-gray-600 mb-8 lg:my-10">
              <h2 class="text-3xl font-semibold pb-8">Menu</h2>
              <ul class="text-left max-w-16 mx-auto">
                <li class="pb-8 text-gray-700 hover:text-primary font-medium ">
                  <a href="/">HOME</a></li>
                <li class="pb-8 text-gray-700 hover:text-primary font-medium"><a href="/products">PRODUCTS</a></li>
                <li class=" pb-8 text-gray-700 hover:text-primary font-medium"><a href="/blog">BLOG</a></li>
                <li class=" pb-8 text-gray-700 hover:text-primary font-medium"><a href="/contact">CONTACT</a></li>
                <li class=" pb-8 text-gray-700 hover:text-primary font-medium"><a href="/profile">PROFILE</a></li>
              </ul>
            </div>
          </div>

          <div class="w-full lg:w-1/4">
            <div class="text-center text-gray-600  mb-8 lg:my-10">
              <h2 class="text-3xl font-semibold pb-8">Socials</h2>
              <ul class="text-left max-w-32 mx-auto">
                <li class="pb-8"><a href="#"><i class="fa-brands fa-facebook px-2 text-primary hover:text-[#4267B2] text-lg"></i></a>Facebook</li>
                <li class="pb-8"><a href="#"><i class="fa-solid fa-basketball px-2 text-primary hover:text-[#DE0082] text-lg"></i></a>Dribbble</li>
                <li class="pb-8"><a href="#"><i class="fa-brands fa-square-instagram px-2 text-primary hover:text-[#E1306C] text-lg"></i></a>Instagram</li>
                <li><a href="#"><i class="fa-brands fa-twitter px-2 text-primary hover:text-[#1DA1F2] text-lg"></i></a>Twitter</li>
              </ul>
            </div>
          </div>

          <div class="w-full lg:w-1/4">
            <div class="text-center text-gray-600 mb-8 lg:my-10">
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


      <--Footer Border-->
    <!-- <section class="footer-style bg-gray-500  border-gray-400 ">
      <div class="container py-2 pt-3 lg:justify-between flex flex-col lg:flex-row text-center">

        <p class="text-white"> &copy; 2024 How to Mechatronics. All Rights Reserved. </p>

        <p class="text-white"><a class="text-white "  target="_blank" href="https://creativetechpark.com/">Web Development Company </a> Creative Tech Park </p>

      </div>
    </section>  -->
  <!-- </footer> -->

</template>

<script setup>
import PrimaryButton from "@/components/PrimaryButton.vue";
import {useAuthStore} from "@/stores/useAuthStore.js";
import {ref, onMounted, onBeforeUnmount} from 'vue'
import useAxios from "@/composables/useAxios.js"
const {sendRequest} = useAxios();
const auth = useAuthStore();

const categorys = ref(null);
const getCategory = (async () => {
 const response = await sendRequest({
  method: 'get',
  url:'/api/categories',
 });
 categorys.value = response.data;
});

const isScrolled = ref(false);

const toggleNav = ref(false);
const handleScroll = () => {
  isScrolled.value = window.scrollY > 30;
};

const getUser = ref()

onMounted(() => {
  getCategory()
  window.addEventListener('scroll', handleScroll);
  
});

onBeforeUnmount(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
.scrolled{
  background: rgba(0,0,0, 0.7);

  transition: all 0.8s ease;
}
</style>