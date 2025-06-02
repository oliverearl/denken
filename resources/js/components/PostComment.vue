<script setup lang="ts">
import { ref } from 'vue';
import type { Comment } from '@/types/comment';

const props = defineProps<{ comment: Comment }>();
const likeCount = ref(props.comment.likes || 0);

// Toggle like function
const liked = ref(false);
const toggleLike = () => {
  if (liked.value) {
    likeCount.value--;
  } else {
    likeCount.value++;
  }
  liked.value = !liked.value;
};
</script>

<template>
  <div class="flex">
    <img :src="comment.user.avatar" alt="Commenter" class="mr-3 h-8 w-8 rounded-full" />
    <div class="flex-1">
      <div class="rounded-lg bg-gray-100 p-3 dark:bg-gray-700">
        <div class="font-bold text-gray-900 dark:text-white">{{ comment.user.name }}</div>
        <div class="text-gray-800 dark:text-gray-200">{{ comment.content }}</div>
      </div>
      <div class="mt-1 flex items-center text-xs text-gray-500 dark:text-gray-400">
        <span>{{ comment.timestamp }}</span>
        <span class="mx-1">·</span>
        <button class="hover:text-blue-500">Reply</button>
        <span class="mx-1">·</span>
        <button
          @click="toggleLike"
          class="flex items-center hover:text-red-500"
          :class="{ 'text-red-500': liked }"
        >
          Like
          <span v-if="likeCount > 0" class="ml-1">({{ likeCount }})</span>
        </button>
      </div>
    </div>
  </div>
</template>
