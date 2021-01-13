<template>
  <app-layout>
    <template #header>
      <header-data-covid-layout> </header-data-covid-layout>
    </template>
    <template #main>
      <!-- <div class="flex">
        <div>
          <p class="text-sm">{{ $page.flash.message }}</p>
        </div>
      </div> -->
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
      
    </template>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Button from '../Jetstream/Button.vue'
import HeaderDataCovidLayout from '@/Layouts/HeaderDataCovidLayout'
import Pagination from '../Layouts/Pagination2.vue'

export default {
    components: {
        AppLayout,
        Button,
        HeaderDataCovidLayout,
        Pagination
    },
    data()  {
      return{
        offset: 4,
        pagination: {
          total: null,
          per_page: null,
          current_page: null,
          last_page: null,
          from: null,
          to: null
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
