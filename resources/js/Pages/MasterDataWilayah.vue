<template>
  <app-layout>
    <template #header>
      <header-master-wilayah></header-master-wilayah>
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
                            Nama Wilayah
                          </th>

                          <th scope="col" class="relative px-6 py-2">
                            <span class="sr-only">Edit</span>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="x in DataMasters" :key="x.id">
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.nama_wilayah }}
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
              <pagination
                :pagination="pagination"
                @paginate="getMasterData"
                :offset="4"
              />
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

          <!-- This element is to trick the browser into centering the modal contents.  -->
            
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
                      for="formControlInput2"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Nama Wilayah:</label
                    >

                    <input
                      type="text"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput2"
                      placeholder="Enter Penambahan Kasus"
                      v-model="form.namaWilayah"
                    />
                    <div v-if="errors.namaWilayah != null" class="text-red-500">
                      {{ errors.namaWilayah }}
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
                      @click="updateDataMaster(form)"
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
                    @click="deleteDataMaster(form)"
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
import Welcome from '@/Jetstream/Welcome'
import HeaderMasterWilayah from '@/Layouts/HeaderMasterWilayah'
import Pagination from '../Layouts/Pagination2.vue'

export default {
    components: {
        AppLayout,
        HeaderMasterWilayah,
        Pagination
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
            namaWilayah: null,
            id: null,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        DataMasters: [],
        DataMaster: {
            namaWilayah: null
        },
      }
    },
    methods: {
        openModal: function (id) {
            // console.log("masuk");
            this.isOpen = true;
            this.showDataMaster(id);
        },

        closeModal: function () {

            this.isOpen = false;

            this.reset();

            this.editMode=false;

        },

        reset: function () {

            this.form = {

                namaWilayah: null,
                id: null,
            }
        },

        async getMasterData(){
            let current_page = this.pagination.current_page;
            let pageNum = current_page ? current_page : 1;
            console.log(pageNum);
            try {
            const res = await axios.get('api/datawilayah?page='+pageNum);
            console.log(res.data.data);
            this.DataMasters = res.data.data;
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
        async deleteDataMaster(data){
        try {
          const res = await axios.delete('api/datawilayah/'+data.id);
          if(res.status === 200){
            Toast.fire({
              icon:'success',
              title: res.data
            })
            window.location.href = 'master-wilayah';
            this.closeModal();
          } 
        } catch (error) {
          console.log(err);
          Toast.fire({
            icon:'error'
          })
        }
      },

      async updateDataMaster(data){
        try {
          const res = await axios.put('api/datawilayah/'+data.id, data);
          if(res.status === 200){
            Toast.fire({
              icon:'success',
              title: res.data
            })
            window.location.href = 'master-wilayah';
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
      async showDataMaster(id){
        try {
          const res = await axios.get('api/datawilayah/'+id);
          // console.log(res.data.tanggal);
          this.form.namaWilayah = res.data.nama_wilayah;
          this.form.id = id;
        }
        catch(err){
          console.log(err);
        }
      },
    },
    created(){
      this.getMasterData();
    }   
}
</script>
