<template>
  <app-layout>
    <template #header>
      <header-master-user></header-master-user>
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
                            Nama
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Email
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Username
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Tipe Akun
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Wilayah Kerja
                          </th>
                          <th
                            scope="col"
                            class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                          >
                            Nama Unit
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
                            {{ x.name }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.email }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            {{ x.username }}
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                          <!-- {{x.tipe_akun}} -->
                            <template v-for="(data,tipe_akun) in x.tipe_akun">
                              <div v-if="tipe_akun === 'tipe_akun'">
                                {{ data }}
                              </div>
                            </template>
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            <!-- {{ x.wilayah }} -->
                            <template v-for="(data,tipe_akun) in x.wilayah">
                              <div v-if="tipe_akun === 'nama_wilayah'">
                                {{ data }}
                              </div>
                            </template>
                          </td>
                          <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                          >
                            <!-- {{ x.idPusatUnit.nama }} -->
                            <template v-for="(data,tipe_akun) in x.id_unit">
                              <div v-if="tipe_akun === 'unit'">
                                {{ data }}
                              </div>
                            </template>
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
                      for="formControlInput3"
                      class="block text-gray-700 text-sm font-bold mb-2"
                      >Nama:</label
                    >

                    <input
                      type="text"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="formControlInput3"
                      placeholder="Enter Nama Unit"
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
import Pagination from '../Layouts/Pagination2.vue'
import HeaderMasterUser from '../Layouts/HeaderMasterUser.vue'

export default {
    components: {
        AppLayout,
        Pagination,
        HeaderMasterUser
    },
    data()  {
      return{
        loading: false,
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
            nama: null,

            username: null,

            email: null,

            password: null,

            tipeAkun: null,

            idWilayah: null,

            idUnit: null,
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        DataMasters: {},
        tipeAkun: {},
        idWilayah: {},
        idUnit: {}
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
                nama: null,

                username: null,

                email: null,

                password: null,

                tipeAkun: null,

                idWilayah: null,

                idUnit: null,

                id: null,
            }
        },

        async getMasterData(){
            let current_page = this.pagination.current_page;
            let pageNum = current_page ? current_page : 1;
            try {
              this.loading = true;
              const res = await axios.get('api/datauser?page='+pageNum);
              // console.log(res.data.data);
              this.DataMasters = res.data.data;
              this.pagination.total = res.data.total;
              this.pagination.per_page = res.data.per_page;
              this.pagination.to = res.data.to;
              this.pagination.from = res.data.from;
              this.pagination.current_page = res.data.current_page;
              this.pagination.last_page = res.data.last_page;
              this.loading = false;
            }
            catch(err){
            console.log(err);
            this.loading = false;
            }
            console.log(this.DataMasters);
        },
        async deleteDataMaster(data){
        try {
          const res = await axios.delete('api/datauser/'+data.id);
          if(res.status === 200){
            Toast.fire({
              icon:'success',
              title: res.data
            })
            window.location.href = 'master-user';
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
            const res = await axios.put('api/datauser/'+data.id, data);
            if(res.status === 200){
              Toast.fire({
                icon:'success',
                title: res.data
              })
              window.location.href = 'master-user';
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
            const res = await axios.get('api/datauser/'+id);
            // console.log(res.data.tanggal);
            this.form.nama = res.data.name;
            this.form.email = res.data.email;
            this.form.username = res.data.username;
            this.form.password = null;
            this.form.tipeAkun = res.data.tipe_akun;
            this.form.idWilayah = res.data.id_wilayah;
            if(res.data.id_wilayah != null){
              try {
                const unit = await axios.get('api/datapusat/get-unit/'+res.data.id_wilayah);
                console.log(unit.data);
                this.idUnit = unit.data;
              }
              catch(err){
              console.log(err);
              }
            }
            this.form.idUnit = res.data.id_unit;
            this.form.id = id;
          }
          catch(err){
            console.log(err);
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
    },
    created(){
      this.getMasterData();
      this.getMasterDataTipeAkun();
      this.getMasterDataWilayahAkun();
    }   
}
</script>
