<script setup lang="ts">
import { Search } from 'lucide-vue-next';
import { ref } from 'vue';

const searchQuery = ref('');
</script>

<template>
  <div class="relative w-full">
    <div class="relative">
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Search Denken"
        class="w-full rounded-full bg-gray-100 py-2 pl-10 pr-4 text-sm text-gray-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-gray-200 dark:placeholder-gray-400"
      />
      <div class="absolute inset-y-0 left-0 flex items-center pl-3">
        <Search class="h-4 w-4 text-gray-500 dark:text-gray-400" />
      </div>
    </div>
  </div>
</template>
