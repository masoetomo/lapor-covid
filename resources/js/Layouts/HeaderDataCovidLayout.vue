<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate"
            >
            Data Covid
            </h2>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">

            <span class="sm:ml-3">
                <!-- <button @click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post</button> -->
            <button
                @click="openModal()"
                type="button"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                <!-- Heroicon name: check -->
                <svg
                class="-ml-1 mr-2 h-5 w-5 text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
                >
                <path
                    fill-rule="evenodd"
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                    clip-rule="evenodd"
                />
                </svg>
                Tambah Data
            </button>
            </span>
        </div>
    </div>
    <div
        class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
        v-if="isOpen"
      >
        <div
          class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
          <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

          <!-- This element is to trick the browser into centering the modal contents. -->

          <span
            class="hidden sm:inline-block sm:align-middle sm:h-screen"
          ></span
          >​

          <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog"
            aria-modal="true"
            aria-labelledby="modal-headline"
          >
            <form>
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                  <div class="mb-4">
                    <!-- <input type="hidden" v-model="form._token" name="_token" :value="csrf"> -->
                    <label
                      for="formControlInput1"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Tanggal:</label
                    >
                    <date-picker id="formControlInput1" class="shadow" v-model="form.date" valueType="format"></date-picker>
                    <!-- <input
                      type="text"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput1"
                      placeholder="Enter Tanggal"
                      v-model="form.tanggal"
                    /> -->

                    <div v-if="$page.errors.date" class="text-red-500">
                      {{ $page.errors.date }}
                    </div>
                  </div>

                  <div class="mb-4">
                    <label
                      for="formControlInput2"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Penambahan Kasus:</label
                    >

                    <input
                      type="number"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput2"
                      placeholder="Enter Penambahan Kasus"
                      v-model="form.penambahanKasus"
                    />
                    <div v-if="$page.errors.penambahanKasus" class="text-red-500">
                      {{ $page.errors.penambahanKasus }}
                    </div>
                  </div>

                  <div class="mb-4">
                      <label
                      for="formControlInput3"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Dalam Perawatan :</label
                    >

                    <input
                      type="number"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput3"
                      placeholder="Enter Dalam Perawatan"
                      v-model="form.dalamPerawatan"
                    />
                    <div v-if="$page.errors.dalamPerawatan" class="text-red-500">
                      {{ $page.errors.dalamPerawatan }}
                    </div>
                  </div>
                  <div class="mb-4">
                      <label
                      for="formControlInput4"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Penambahan Sembuh :</label
                    >

                    <input
                      type="number"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput4"
                      placeholder="Enter Penambahan Sembuh"
                      v-model="form.penambahanSembuh"
                    />
                    <div v-if="$page.errors.penambahanSembuh" class="text-red-500">
                      {{ $page.errors.penambahanSembuh }}
                    </div>
                  </div>

                  <div class="mb-4">
                      <label
                      for="formControlInput5"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Sembuh :</label
                    >

                    <input
                      type="number"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput5"
                      placeholder="Enter Sembuh"
                      v-model="form.sembuh"
                    />
                    <div v-if="$page.errors.sembuh" class="text-red-500">
                      {{ $page.errors.sembuh }}
                    </div>
                  </div>

                  <div class="mb-4">
                      <label
                      for="formControlInput6"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Meninggal :</label
                    >

                    <input
                      type="number"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput6"
                      placeholder="Enter Meninggal"
                      v-model="form.meninggal"
                    />
                    <div v-if="$page.errors.meninggal" class="text-red-500">
                      {{ $page.errors.meninggal }}
                    </div>
                  </div>
                  <div class="mb-4">
                      <label
                      for="formControlInput7"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Sakit Bukan Covid :</label
                    >

                    <input
                      type="number"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput7"
                      placeholder="Enter Sakit Bukan Covid"
                      v-model="form.sakitBukanCovid"
                    />
                    <div v-if="$page.errors.sakitBukanCovid" class="text-red-500">
                      {{ $page.errors.sakitBukanCovid }}
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
              >
                <span
                  class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                >
                  <button
                    wire:click.prevent="store()"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                    v-show="!editMode"
                    @click="save(form)"
                  >
                    Save
                  </button>
                </span>

                <span
                  class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                >
                  <button
                    wire:click.prevent="store()"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                    v-show="editMode"
                    @click="update(form)"
                  >
                    Update
                  </button>
                </span>

                <span
                  class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                >
                  <button
                    @click="closeModal()"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                  >
                    Cancel
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import Button from '../Jetstream/Button.vue';
// import datepicker from '../../../node_modules/js-datepicker'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

// import { Datetime } from 'vue-datetime';
    export default {
        components: {
            Button,
            DatePicker
        },
        props: ['data', 'errors'],
        
        data() {

            return {

                editMode: false,

                isOpen: false,

                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                form: {

                    dalamPerawatan: null,

                    penambahanKasus: null,

                    date: null,

                    penambahanSembuh: null,

                    sembuh: null,

                    meninggal: null,

                    sakitBukanCovid: null,

                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                },

            }

        },
            methods: {

            openModal: function () {
                console.log("masuk");
                this.isOpen = true;

            },

            closeModal: function () {

                this.isOpen = false;

                this.reset();

                this.editMode=false;

            },

            reset: function () {

                this.form = {

                    title: null,

                    body: null,

                }

            },

            async save(data) {

              console.log(data);
              const res = await axios.post('api/datacovid', data);
              if(res.status === 201){
                Toast.fire({
                  icon:'success',
                  title: res.data
                })
              } else {
                Toast.fire({
                  icon:'error'
                })
              }
                // this.$inertia.post('/posts', data)

                // this.reset();

                // this.closeModal();

                // this.editMode = false;

            },
    }
    }
    
</script>
