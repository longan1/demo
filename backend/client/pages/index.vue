<template>
    <div v-if="pending">
        loading...
    </div>
    <div class="flex flex-col bg-gray-100 rounded-lg h-5/6" v-else>
        <div class="flex-1 flex">
            <div class="flex-1 p-4">

                <div class="w-full p-3 ">
                    <div class="flex items-center mb-3 justify-between">
                        <div class="flex items-center">
                            <svg class="lw-28 h-18 mr-2" viewBox="0 0 128 128" width="24" height="24" data-v-c0161dce="">
                                <path fill="#42b883" d="M78.8,10L64,35.4L49.2,10H0l64,110l64-110C128,10,78.8,10,78.8,10z"
                                    data-v-c0161dce=""></path>
                                <path fill="#35495e" d="M78.8,10L64,35.4L49.2,10H25.6L64,76l38.4-66H78.8z"
                                    data-v-c0161dce="">
                                </path>
                            </svg>
                            <h2 class="font-bold text-xl text-black"> DEMO API </h2>
                        </div>
                        <div class="space-x-5">
                            <button class="text-white text-xs text-bold bg-red-500 p-2 rounded-lg" @click="isShowLoginModal=true" v-if="token == ''">
                                Authentication
                            </button>

                            <button class="text-white text-xs text-bold bg-green-500 p-2 rounded-lg" v-else  @click="token=''">
                                Logout
                            </button>


                        </div>
                    </div>

                    <div class="flex flex-col">
                        <input
                            class="w-full h-9 pl-10 pr-10 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                            type="search" placeholder="Search..." v-model="search">


                    </div>
                </div>

                <div class="h-[700px] overflow-scroll">
                    <div class="p-3 flex items-center justify-between bg-white mx-2 my-2 rounded-md"
                        v-for="item in fillterData">
                        <!-- {{ message }} -->

                        <div class="flex items-center">
                            <div class="rounded-md  p-1 w-[60px] flex item-center justify-center text-xs text-white font-lg" :class="getColor(item.method)"
                                v-if="item.method == 'DELETE'">
                                Delete
                            </div>
                            <div class="rounded-md  p-1 w-[60px] flex item-center justify-center text-xs text-white font-lg" :class="getColor(item.method)"
                                v-if="item.method == 'GET|HEAD'">
                                GET
                            </div>
                            <div class="rounded-md p-1 w-[60px] flex item-center justify-center text-xs text-white font-lg" :class="getColor(item.method)"
                                v-if="item.method == 'POST'">
                                POST
                            </div>
                            <div class="rounded-md p-1 w-[60px] flex item-center justify-center text-xs text-white font-lg" :class="getColor(item.method)"
                                v-if="item.method == 'PUT|PATCH'">
                                PUT
                            </div>
                            <p class="text-xs ml-3">
                                {{ item?.uri }}
                            </p>
                        </div>
                        <button class="text-white text-xs text-bold bg-green-500 p-1 px-3 rounded-lg" @click="handleTryItClick(item)">
                            Try it
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <!--Login Modal-->
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="isShowLoginModal">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            viewBox="0 0 330 330" xml:space="preserve">
                                        <g id="XMLID_823_">
                                            <path id="XMLID_824_" d="M265,130h-15V84.999C250,38.13,211.869,0,165,0S80,38.13,80,84.999V130H65c-8.284,0-15,6.716-15,15v170
                                                c0,8.284,6.716,15,15,15h200c8.284,0,15-6.716,15-15V145C280,136.716,273.284,130,265,130z M110,84.999
                                                C110,54.673,134.673,30,165,30s55,24.673,55,54.999V130H110V84.999z M250,300H80V160h15h140h15V300z"/>
                                            <path id="XMLID_828_" d="M196.856,198.144c-5.857-5.858-15.355-5.858-21.213,0L165,208.787l-10.644-10.643
                                                c-5.857-5.858-15.355-5.858-21.213,0c-5.858,5.858-5.858,15.355,0,21.213L143.787,230l-10.643,10.644
                                                c-5.858,5.858-5.858,15.355,0,21.213c2.929,2.929,6.768,4.394,10.606,4.394s7.678-1.464,10.606-4.394L165,251.213l10.644,10.644
                                                c2.929,2.929,6.768,4.394,10.606,4.394s7.678-1.464,10.606-4.394c5.858-5.858,5.858-15.355,0-21.213L186.213,230l10.643-10.644
                                                C202.715,213.499,202.715,204.001,196.856,198.144z"/>
                                        </g>
                                        </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-lef w-full">
                                    <!-- <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Login</h3> -->
                                    <div class="mt-2">
                                        <div class="mb-6">
                                            <label for="large-input" class="block mb-2 text-left text-sm font-medium text-gray-900 dark:text-white">Please input token</label>
                                            <input type="text" id="large-input" v-model="tempToken"  class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button"
                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 sm:ml-3 sm:w-auto" @click="saveToken()">Login</button>
                            <button type="button"
                                @click="isShowLoginModal=false"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Test Api Modal-->
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="isShowTestApiModal">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3  sm:ml-4 sm:mt-0 sm:text-lef w-full">
                                    <h3 class="font-bold text-lg leading-6" :class="`text-${getColor(currentMethod)}`" id="modal-title">Try to test: /{{currentApi}}</h3>
                                     <div class="flex items-center mt-5">
                                        <div class="w-30">
                                            <label for="first_name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                            <input type="text" id="first_name" class="bg-gray-50 border w-30 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                        </div>
                                        <div class="w-70">
                                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                            <input type="text" id="first_name" class=" w-70 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button"
                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-900 sm:ml-3 sm:w-auto" @click="testApi()">Try API</button>
                            <button type="button"
                                @click="isShowTestApiModal=false"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
</template>

<script setup lang="ts">

const { data: paths, error, pending, refresh } = await useMyFetch('/', {
    server: false
})

const search = ref('');
const token = ref('');
const tempToken = ref('');
const currentApi = ref('');
const currentMethod = ref('');
const isShowLoginModal = ref(false)
const isShowTestApiModal = ref(false)

const fillterData = computed(() => {
    const searchTerm = search.value.toLowerCase();
    return paths.value.data.filter((item: any) =>
        item.uri.toLowerCase().includes(searchTerm)
    );
});

const saveToken = () =>{
    token.value = tempToken.value
    isShowLoginModal.value = false
}

const handleTryItClick = (item:any) => {
    isShowTestApiModal.value = true
    currentApi.value = item.uri
    currentMethod.value = item.method
}

const testApi = () => {

}

const getColor = (method:string)=>{
    switch(method){
        case  'DELETE':
        return 'bg-red-300'
        case  'GET|HEAD':
        return 'bg-blue-500'
        case  'POST':
        return 'bg-green-700'
        case  'PUT|PATCH':
        return 'bg-yellow-500'
    }
}
</script>
