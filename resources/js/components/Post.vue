<script setup lang="ts">
import { ref } from 'vue';
import PostComment from '@/components/PostComment.vue';

interface User {
  name: string;
  handle: string;
  avatar: string;
}

interface NewsArticle {
  title: string;
  source: string;
  url: string;
  image: string;
}

interface CommentUser {
  name: string;
  avatar: string;
}

interface Comment {
  id: number;
  user: CommentUser;
  content: string;
  timestamp: string;
  likes: number;
}

interface PostProps {
  id: number;
  user: User;
  content: string;
  newsArticle: NewsArticle;
  timestamp: string;
  likes: number;
  comments: number;
  shares: number;
}

defineProps<{ post: PostProps }>();

const showComments = ref(false);

// Sample comments data
const sampleComments = ref<Comment[]>([
  {
    id: 1,
    user: {
      name: 'Sarah Johnson',
      avatar: 'https://randomuser.me/api/portraits/women/5.jpg'
    },
    content: 'I completely agree with your thoughts on this article!',
    timestamp: '1h ago',
    likes: 5
  },
  {
    id: 2,
    user: {
      name: 'Michael Brown',
      avatar: 'https://randomuser.me/api/portraits/men/7.jpg'
    },
    content: 'Interesting perspective. I think there\'s more to consider though.',
    timestamp: '45m ago',
    likes: 2
  }
]);
</script>

<template>
  <div class="post rounded-xl bg-white p-4 shadow dark:bg-gray-800">
    <!-- Post Header -->
    <div class="mb-3 flex items-center">
      <img :src="post.user.avatar" :alt="post.user.name" class="mr-3 h-10 w-10 rounded-full" />
      <div>
        <div class="font-bold text-gray-900 dark:text-white">{{ post.user.name }}</div>
        <div class="text-sm text-gray-500 dark:text-gray-400">{{ post.user.handle }} · {{ post.timestamp }}</div>
      </div>
    </div>

    <!-- Post Content -->
    <div class="mb-3 text-gray-800 dark:text-gray-200">
      {{ post.content }}
    </div>

    <!-- News Article -->
    <div class="mb-3 overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
      <img :src="post.newsArticle.image" :alt="post.newsArticle.title" class="h-48 w-full object-cover" />
      <div class="p-3">
        <div class="mb-1 font-bold text-gray-900 dark:text-white">{{ post.newsArticle.title }}</div>
        <div class="text-sm text-gray-500 dark:text-gray-400">{{ post.newsArticle.source }}</div>
      </div>
    </div>

    <!-- Post Actions -->
    <div class="flex justify-between text-gray-500 dark:text-gray-400">
      <button @click="showComments = !showComments" class="flex items-center hover:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
        </svg>
        {{ post.comments }}
      </button>
      <button class="flex items-center hover:text-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
        </svg>
        {{ post.shares }}
      </button>
      <button class="flex items-center hover:text-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
        </svg>
        {{ post.likes }}
      </button>
    </div>

    <!-- Comments Section (Toggle) -->
    <div v-if="showComments" class="mt-4 border-t border-gray-200 pt-4 dark:border-gray-700">
      <div class="mb-4 flex">
        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Your avatar" class="mr-3 h-8 w-8 rounded-full" />
        <div class="flex-1">
          <input
            type="text"
            placeholder="Write a comment..."
            class="w-full rounded-full border border-gray-200 bg-gray-50 px-4 py-2 text-sm text-gray-700 focus:border-blue-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
          />
        </div>
      </div>

      <!-- Comments List -->
      <div class="space-y-3">
        <PostComment
          v-for="comment in sampleComments"
          :key="comment.id"
          :comment="comment"
        />
      </div>
    </div>
  </div>
</template>
