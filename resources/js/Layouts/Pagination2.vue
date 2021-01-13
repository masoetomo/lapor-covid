<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" :disabled="disablePrev == 1" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"
    @click.prevent="change(pagination.current_page -1)">
      Previous
    </a>
    <a href="#" :disabled="disableNext == 1" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"
    @click.prevent="change(pagination.current_page + 1)">
      Next
    </a>
  </div>
  <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between md:flex-auto">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">{{ pagination.current_page }}</span>
        to
        <span class="font-medium">{{ pagination.to }}</span>
        of
        <span class="font-medium">{{ pagination.total }}</span>
        results
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
        <a href="#" :disabled="disablePrev == 1" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
        @click.prevent="change(pagination.current_page -1)">
          <span class="sr-only">Previous</span>
          <!-- Heroicon name: chevron-left -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        <ul class="flex list-reset border border-grey-light rounded w-auto front-sans">
        <li v-for="page in pages" :key="page" >
            <a :class="[page == pagination.current_page ? 'text-gray-400 bg-blue border-r border-blue':'hover:text-gray-400 hover:bg-blue text-blue border-r border-grey-light', 'block px-3 py-2']" 
               href="#"
               @click.stop="change(page)"
            >
                {{ page }}
            </a>
        </li>
        </ul>
        <!-- <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
          1
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
          2
        </a>
        <a href="#" class="hidden md:inline-flex relative items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
          3
        </a>
        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
          ...
        </span>
        <a href="#" class="hidden md:inline-flex relative items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
          8
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
          9
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
          10
        </a> -->
        <a href="#" :disabled="disableNext == 1" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
        @click.prevent="change(pagination.current_page + 1)">
          <span class="sr-only">Next</span>
          <!-- Heroicon name: chevron-right -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</div>
</template>

<script>
export default {
    props: {
        pagination: {
            type: Object,
            required: true
        },
        offset: {
            type: Number,
            default: 4
        }
    },
    data() {
        return{
            disablePrev: 0,
            disableNext: 0,
        }
    },
    computed: {
        pages() {
            if(!this.pagination.to) {
                return null;
            }

            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }

            let to = from + (this.offset * 2);
            if( to >= this.pagination.last_page ) {
                to = this.pagination.last_page;
            }

            let pages = [];
            for (let page = from; page <= to; page++) {
                pages.push(page);
            }

            return pages;
        },
    },

    methods: {
        change: function(page) {
            if(page < 1){
                return;
            } else if(page > this.pagination.last_page){
                return;
            } else {
                this.pagination.current_page = page;
                this.$emit('paginate');
            }
            // console.log(this.disableNext);
            
        }
    }
}
</script>