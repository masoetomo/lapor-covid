<template>
  <app-layout>
    <template #header>
      <header-data-covid-layout> </header-data-covid-layout>
    </template>
    <template #main>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                  class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                >
                  <div
                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                  >
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Tanggal
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Penambahan Kasus
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Dalam Perawatan
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Penambahan Sembuh
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Sembuh
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Meninggal
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Sakit Bukan Covid
                          </th>
                          <th scope="col" class="relative px-6 py-2">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="x in dataCovids" :key="x.id">
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.tanggal }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.penambahan_kasus }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.dalam_perawatan }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.penambahan_sembuh }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.sembuh }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.meninggal }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.sakit_bukan_covid }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                          >
                            <a
                              @click="openModal(x.id)"
                              href="#"
                              class="text-indigo-600 hover:text-indigo-900"
                              >Edit</a
                            >
                          </td>
                        </tr>

                        <!-- More rows... -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <pagination :pagination="pagination" @paginate="getDataCovids" :offset="4" />
            </div>
          </div>
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
                    
                    <div v-if="errors.date" class="text-red-500">
                      {{ errors.date }}
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
                    {{form.penambahan_kasus}}
                    <div v-if="errors.penambahanKasus" class="text-red-500">
                      {{ errors.penambahanKasus }}
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
                    <div v-if="errors.dalamPerawatan" class="text-red-500">
                      {{ errors.dalamPerawatan }}
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
                    <div v-if="errors.penambahanSembuh" class="text-red-500">
                      {{ errors.penambahanSembuh }}
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
                    <div v-if="errors.sembuh" class="text-red-500">
                      {{ errors.sembuh }}
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
                    <div v-if="errors.meninggal" class="text-red-500">
                      {{ errors.meninggal }}
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
                    <div v-if="errors.sakitBukanCovid" class="text-red-500">
                      {{ errors.sakitBukanCovid }}
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse justify-between"
              >
                <div class="sm:flex sm:flex-row-reverse">
                  <span
                  class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                >
                  <button
                    wire:click.prevent="store()"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                    @click="updateDataCovid(form)"
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

                <span
                  class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                >
                  <button
                    @click="deleteDataCovid(form)"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-red-800 text-base leading-6 font-medium text-white shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                  >
                    Delete
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
    </div>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Button from '../Jetstream/Button.vue'
import HeaderDataCovidLayout from '@/Layouts/HeaderDataCovidLayout'
import Pagination from '../Layouts/Pagination2.vue'
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
    components: {
        AppLayout,
        Button,
        HeaderDataCovidLayout,
        Pagination,
        DatePicker
    },
    data()  {
      return{
        errors: [],
        editMode: false,
        isOpen: false,
        offset: 4,
        pagination: {
          total: null,
          per_page: null,
          current_page: null,
          last_page: null,
          from: null,
          to: null
        },
        form: {

          dalamPerawatan: null,

          penambahanKasus: null,

          date: null,

          penambahanSembuh: null,

          sembuh: null,

          meninggal: null,

          sakitBukanCovid: null,

          id: null,

          _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

        },
        dataCovids:[],
        dataCovid: {

          dalamPerawatan: null,

          penambahanKasus: null,

          date: null,

          penambahanSembuh: null,

          sembuh: null,

          meninggal: null,

          sakitBukanCovid: null

        },
      }

    },
    methods: {
      openModal: function (id) {
          console.log("masuk");
          this.isOpen = true;
          this.showDataCovid(id);
      },

      closeModal: function () {

          this.isOpen = false;

          this.reset();

          this.editMode=false;

      },

      reset: function () {

          this.form = {

            dalamPerawatan: null,

            penambahanKasus: null,

            date: null,

            penambahanSembuh: null,

            sembuh: null,

            meninggal: null,

            sakitBukanCovid: null,

            id: null,

          }

      },

      async deleteDataCovid(data){
        try {
          const res = await axios.delete('api/datacovid/'+data.id);
          if(res.status === 200){
            Toast.fire({
              icon:'success',
              title: res.data
            })
            window.location.href = 'data-covid';
            this.closeModal();
          } 
        } catch (error) {
          console.log(err);
          Toast.fire({
            icon:'error'
          })
        }
      },

      async updateDataCovid(data){
        try {
          const res = await axios.put('api/datacovid/'+data.id, data);
          if(res.status === 200){
            Toast.fire({
              icon:'success',
              title: res.data
            })
            window.location.href = 'data-covid';
            this.closeModal();
          } 
        } catch (err) {
          console.log(err);
          this.errors = err.response.data.errors;
          // console.log(this.errors.dalamPerawatan);
          Toast.fire({
            icon:'error'
          })
        }
      },
      async showDataCovid(id){
        try {
          const res = await axios.get('api/datacovid/'+id);
          // console.log(res.data.tanggal);
          this.form.date = res.data.tanggal;
          this.form.penambahanKasus = res.data.penambahan_kasus;
          this.form.dalamPerawatan = res.data.dalam_perawatan;
          this.form.penambahanSembuh = res.data.penambahan_sembuh;
          this.form.sembuh = res.data.sembuh;
          this.form.meninggal = res.data.meninggal;
          this.form.sakitBukanCovid = res.data.sakit_bukan_covid;
          this.form.id = id;
        }
        catch(err){
          console.log(err);
        }
      },
      async getDataCovids(){
        let current_page = this.pagination.current_page;
        let pageNum = current_page ? current_page : 1;
        console.log(pageNum);
        try {
          const res = await axios.get('api/datacovid?page='+pageNum);
          console.log(res.data.data);
          this.dataCovids = res.data.data;
          this.pagination.total = res.data.total;
          this.pagination.per_page = res.data.per_page;
          this.pagination.to = res.data.to;
          this.pagination.from = res.data.from;
          this.pagination.current_page = res.data.current_page;
          this.pagination.last_page = res.data.last_page;
        }
        catch(err){
          console.log(err);
        }
      },
      fetchUsers: function() {
        let current_page = this.pagination.current_page;
        let pageNum = current_page ? current_page : 1;

        axios.get('api/datacovid?page=${pageNum}')
        .then(response => {
          this.pagination = response.data.pagination;
          this.dataCovids = response.data.datas;
        })
        .catch(error => console.log(error));
      }
    },
    beforeMount(){
      // this.getDataCovids();
    },
    created(){
      this.getDataCovids();
      // this.fetchUsers();
    }     
}
</script>
