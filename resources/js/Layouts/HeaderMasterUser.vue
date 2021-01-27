<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
  <div>
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2
            class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate"
            >
            Master Data User
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
                Tambah Master Data
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
                    <label
                      for="formControlInput1"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Nama:</label
                    >

                    <input
                      type="text"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput1"
                      placeholder="Enter Nama"
                      v-model="form.nama"
                    />
                    <div v-if="errors.nama != null" class="text-red-500">
                      {{ errors.nama }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <label
                      for="formControlInput3"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Username:</label
                    >

                    <input
                      type="text"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput3"
                      placeholder="Enter Username"
                      v-model="form.username"
                    />
                    <div v-if="errors.username != null" class="text-red-500">
                      {{ errors.username }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <label
                      for="formControlInput3"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Email:</label
                    >

                    <input
                      type="email"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput3"
                      placeholder="Enter Email"
                      v-model="form.email"
                    />
                    <div v-if="errors.email != null" class="text-red-500">
                      {{ errors.email }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <label
                      for="formControlInput2"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Password:</label
                    >

                    <input
                      type="password"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput2"
                      placeholder="Enter Penambahan Kasus"
                      v-model="form.password"
                    />
                    <div v-if="errors.password != null" class="text-red-500">
                      {{ errors.password }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <label
                      for="formControlInput1"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Tipe Akun:</label
                    >

                    <div class="col-span-6 sm:col-span-3">
                      <select v-model="form.tipeAkun" id="tipe_akun" name="tipeAkun" placeholder="Please select one" class="shadow border rounded w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option disabled value="">Please select one</option>
                        <option v-for="option in tipeAkun" v-bind:value="option.id">
                          {{ option.tipe_akun }}
                        </option>
                      </select>
                    </div>
                    <div v-if="errors.tipeAkun != null" class="text-red-500">
                      {{ errors.tipeAkun }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <label
                      for="formControlInput1"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Wilayah Kerja:</label
                    >

                    <div class="col-span-6 sm:col-span-3">
                      <select v-model="form.idWilayah" @change="getMasterUnit($event)" id="tipe_akun" name="tipeAkun" placeholder="Please select one" class="shadow border rounded w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option disabled value="">Please select one</option>
                        <option v-for="option in idWilayah" v-bind:value="option.id">
                          {{ option.nama_wilayah }}
                        </option>
                      </select>
                    </div>
                    <div v-if="errors.idWilayah != null" class="text-red-500">
                      {{ errors.idWilayah }}
                    </div>
                  </div>
                  <div class="mb-4">
                    <label
                      for="formControlInput1"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Unit:</label
                    >

                    <div class="col-span-6 sm:col-span-3">
                      <select v-model="form.idUnit" id="unit" name="unit" placeholder="Please select one" class="mt-1 shadow border rounded w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option disabled value="">Please select one</option>
                        <option v-for="option in idUnit" v-bind:value="option.id">
                          {{ option.unit }}
                        </option>
                      </select>
                    </div>
                    <div v-if="errors.idWilayah != null" class="text-red-500">
                      {{ errors.idUnit }}
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
        
        data() {

            return {

                errors: [],

                loading: false,

                editMode: false,

                isOpen: false,

                form: {

                    nama: null,

                    username: null,

                    email: null,

                    password: null,

                    tipeAkun: null,

                    idWilayah: null,

                    idUnit: null,

                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                },
                tipeAkun: {},
                idWilayah: {},
                idUnit: {}
            }

        },
        methods: {

          openModal: function () {
              this.isOpen = true;
          },

          closeModal: function () {

              this.isOpen = false;

              this.reset();

              this.editMode=false;

          },

          reset: function () {

              this.form = {

                  nama: null,

                  email: null,

                  username: null,

                  password: null,

                  tipeAkun: null,

                  idWilayah: null,

                  idUnit: null,

              }

          },

          async getMasterDataTipeAkun(){
            try {
              this.loading = true;
              const res = await axios.get('api/data-tipe-akun');
              console.log(res.data.data);
              this.tipeAkun = res.data;
              this.loading = false;
            }
            catch(err){
              console.log(err);
              this.loading = false;
            }
          },

          async getMasterDataWilayahAkun(){
            try {
              this.loading = true;
              const res = await axios.get('api/datawilayah');
              // console.log(res.data.data);
              this.idWilayah = res.data.data;
              this.loading = false;
            }
            catch(err){
            console.log(err);
            this.loading = false;
            }
          },

          async getMasterUnit(event){
            const id = event.target.value;
            try {
              const res = await axios.get('api/datapusat/get-unit/'+id);
              // console.log(res.data.data);
              this.idUnit = res.data;
            }
            catch(err){
            console.log(err);
            }
          },

          async save(data) {

            try {
            const res = await axios.post('api/datauser', data);
            if(res.status === 201){
              setTimeout(() => { Toast.fire({
                icon:'success',
                title: res.data
              }) }, 2000);
              this.dataVersion += 1;
              window.location.href = 'master-user';
              this.closeModal();
              } 
            }
            catch(err){
                // console.log(err);
              this.errors = err.response.data.errors;
              Toast.fire({
                icon:'error'
              })
            }
          },
        },
        created(){
          this.getMasterDataTipeAkun();
          this.getMasterDataWilayahAkun();
        }   
      }
    
</script>
