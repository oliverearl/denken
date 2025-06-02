<script setup lang="ts">
import { ref } from 'vue';
import Post from '@/components/Post.vue';
import type { Post as PostType } from '@/types/post';

// Mock data for demonstration
const posts = ref<PostType[]>([
  {
    id: 1,
    user: {
      name: 'John Doe',
      handle: '@johndoe',
      avatar: 'https://randomuser.me/api/portraits/men/1.jpg'
    },
    content: 'Just read an interesting article about renewable energy. What do you all think about the future of solar power?',
    newsArticle: {
      title: 'Solar Power Reaches Record Efficiency Levels',
      source: 'Tech News Daily',
      url: '#',
      image: 'https://source.unsplash.com/random/800x600/?solar'
    },
    timestamp: '2h ago',
    likes: 42,
    comments: 12,
    shares: 5
  },
  {
    id: 2,
    user: {
      name: 'Jane Smith',
      handle: '@janesmith',
      avatar: 'https://randomuser.me/api/portraits/women/2.jpg'
    },
    content: 'This new policy could have major implications for the tech industry. Thoughts?',
    newsArticle: {
      title: 'New Regulations for Tech Giants Announced',
      source: 'Business Insider',
      url: '#',
      image: 'https://source.unsplash.com/random/800x600/?technology'
    },
    timestamp: '4h ago',
    likes: 78,
    comments: 34,
    shares: 21
  },
  {
    id: 3,
    user: {
      name: 'Alex Johnson',
      handle: '@alexj',
      avatar: 'https://randomuser.me/api/portraits/men/3.jpg'
    },
    content: 'The sports world is buzzing about this transfer! What a game changer!',
    newsArticle: {
      title: 'Major League Star Signs Record-Breaking Contract',
      source: 'Sports Center',
      url: '#',
      image: 'https://source.unsplash.com/random/800x600/?sports'
    },
    timestamp: '6h ago',
    likes: 125,
    comments: 67,
    shares: 42
  }
]);
</script>

<template>
  <div class="news-feed">
    <div class="mb-4 rounded-xl bg-white p-4 shadow dark:bg-gray-800">
      <div class="flex items-center space-x-4">
        <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Your avatar" />
        <div class="flex-1">
          <textarea
            placeholder="What's happening?"
            class="w-full resize-none rounded-lg border border-gray-200 bg-gray-50 p-2 text-gray-700 focus:border-blue-500 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
            rows="2"
          ></textarea>
        </div>
      </div>
      <div class="mt-3 flex justify-between">
        <div class="flex space-x-2">
          <button class="rounded-full p-2 text-blue-500 hover:bg-blue-100 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
            </svg>
          </button>
          <button class="rounded-full p-2 text-blue-500 hover:bg-blue-100 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd" />
            </svg>
          </button>
          <button class="rounded-full p-2 text-blue-500 hover:bg-blue-100 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <button class="rounded-full bg-blue-500 px-4 py-1 font-bold text-white hover:bg-blue-600">
          Post
        </button>
      </div>
    </div>

    <div class="space-y-4">
      <Post v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>
