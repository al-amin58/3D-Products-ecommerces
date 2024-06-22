<script setup>
import AppLayout from '@/components/Dashboard/Applayout/AppLayout.vue'
import useAxios from "@/composables/useAxios.js"
const { loading, error, sendRequest } = useAxios();
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { useRouter } from "vue-router";
import { toast } from 'vue3-toastify';

const { params } = useRoute();
const isLoading = ref(false);
const url = ref(null);
const form = ref({
   id:null,
    title: null,
    content: null,
    file:null
})
const router = useRouter();
const updateForm  = async (id) => {
    isLoading.value = true;
    const formData  = new FormData();
    formData.append("title", form.value.title);
    formData.append("content", form.value.content);
    formData.append("image", form.value.file);
try{  
   const response = await sendRequest({
        method: 'POST',
        url: `api/posts/${id}?_method=PUT`,
        data: formData,
    });
    if (response.data) {
        isLoading.value = false;
        toast.success("Successfully Update", {
            autoClose: 1000,
            position: toast.POSITION.TOP_RIGHT,
        });
        router.push('/blogs')
        reset()
      } 
   }catch (error) {
        // Handle network errors or unexpected errors
        console.error("An error occurred:", error);
        toast.error(" Please try again later.", {
            autoClose: 3000,
            position: toast.POSITION.TOP_RIGHT,
        });
    }
};
//for image select section
const onFileChange = (e) => {
     const file = e.target.files[0];
     form.value.file = file;
     url.value = URL.createObjectURL(file);
 }

const getData = (async () => {
    const responseData = await sendRequest({
    method: 'get',
    url:`api/posts/${params.id}/edit`,
    });
    form.value.id = responseData.data.id;
    form.value.title = responseData.data.title;
    form.value.content = responseData.data.content;
    form.value.image = responseData.data.image;
   
}); 

onMounted( () => {
    getData()
});


</script>
<template>
<AppLayout>
    <div class="mt-5 mb-40"> 
        <div class=" overflow-hidden  p-10 my-10  w-2/3 mx-auto shadow-xl">
          <h2 class="font-sans font-semibold underline decoration-wavy text-3xl text-center mb-10">Update Blog</h2>
          
              <div class="form-item h-20 mt-2 ">
                <label for="name" class="w-48 font-sans text-xl">Blog Title:</label>
                <input v-model="form.title" type="text" class=" font-sans h-10 rounded-md border border-gray-400 p-3" name="name" id="name"  placeholder="Enter Blog Title" />
              </div> 
              <!-----Editor------->
              <div class="mt-2">
                <label for="bdt" class="w-48 font-sans text-xl">Description:</label>
                <textarea v-model="form.content" class="w-full h-60 font-sans border rounded  border-gray-400 p-3" placeholder="Enter Description"></textarea>
              </div>
              <!-----------Images--------------->
              <div class="mt-2 mb-5">
                  <div class="flex" >
                    <label for="category-image" class=" flex w-full h-40 justify-center items-center rounded-md border-dashed border-2 border-primary bg-white text-primary">
                        <span class="cursor-pointer font-mono text-xl">
                            <svg viewBox="0 0 1024 1024" class="w-20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#D74825"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M736.68 435.86a173.773 173.773 0 0 1 172.042 172.038c0.578 44.907-18.093 87.822-48.461 119.698-32.761 34.387-76.991 51.744-123.581 52.343-68.202 0.876-68.284 106.718 0 105.841 152.654-1.964 275.918-125.229 277.883-277.883 1.964-152.664-128.188-275.956-277.883-277.879-68.284-0.878-68.202 104.965 0 105.842zM285.262 779.307A173.773 173.773 0 0 1 113.22 607.266c-0.577-44.909 18.09-87.823 48.461-119.705 32.759-34.386 76.988-51.737 123.58-52.337 68.2-0.877 68.284-106.721 0-105.842C132.605 331.344 9.341 454.607 7.379 607.266 5.417 759.929 135.565 883.225 285.262 885.148c68.284 0.876 68.2-104.965 0-105.841z" fill="#312782"></path><path d="M339.68 384.204a173.762 173.762 0 0 1 172.037-172.038c44.908-0.577 87.822 18.092 119.698 48.462 34.388 32.759 51.743 76.985 52.343 123.576 0.877 68.199 106.72 68.284 105.843 0-1.964-152.653-125.231-275.917-277.884-277.879-152.664-1.962-275.954 128.182-277.878 277.879-0.88 68.284 104.964 68.199 105.841 0z" fill="#D74825"></path><path d="M545.039 473.078c16.542 16.542 16.542 43.356 0 59.896l-122.89 122.895c-16.542 16.538-43.357 16.538-59.896 0-16.542-16.546-16.542-43.362 0-59.899l122.892-122.892c16.537-16.542 43.355-16.542 59.894 0z" fill="#312782"></path><path d="M485.17 473.078c16.537-16.539 43.354-16.539 59.892 0l122.896 122.896c16.538 16.533 16.538 43.354 0 59.896-16.541 16.538-43.361 16.538-59.898 0L485.17 532.979c-16.547-16.543-16.547-43.359 0-59.901z" fill="#312782"></path><path d="M514.045 634.097c23.972 0 43.402 19.433 43.402 43.399v178.086c0 23.968-19.432 43.398-43.402 43.398-23.964 0-43.396-19.432-43.396-43.398V677.496c0.001-23.968 19.433-43.399 43.396-43.399z" fill="#$secondary-color: var(--secondary-color, #D74825);"></path></g></svg>
                        </span>
                        <input 
                            hidden
                            type="file"
                            ref="file"
                            id="category-image"
                            accept="image/png, image/jpeg"
                            @change="onFileChange"
                        />
                        
                    </label>
                    
                    <div  class="h-40 ms-5 w-full items-center rounded-md border-dashed border-2 border-primary bg-white">
                        <img v-if="url"  :src="url" alt="" class=" h-full w-full bg-cover rounded-md"> 
                        <img v-else  :src="form.image" alt="" class=" h-full w-full bg-cover rounded-md"> 

                    </div>
                          
                  </div>
              </div>
              <div class="mt-10">
                <button @click="updateForm(form.id)" 
                type="submit" 
                class="flex justify-center font-sans p-2 rounded-3xl text-xl w-60 h-12 bg-primary hover:bg-purple-900 text-white"
                :disabled="isLoading"
                >
                <span v-if="isLoading" class="spinner-grow spinner-grow-sm text-white" aria-hidden="true"></span>
                  <span v-if="isLoading" class=" flex items-center gap-1">
                    <svg aria-hidden="true" class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    Update..
                  </span>
                  <span v-else> Update Blog</span>
                
                </button>
              </div>   
              
        </div>
    </div>

</AppLayout>
</template>