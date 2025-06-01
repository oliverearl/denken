<script setup lang="ts">
import { ref } from 'vue';
import PostComment from '@/components/PostComment.vue';
import CommentIcon from '@/components/ui/icon/CommentIcon.vue';
import ShareIcon from '@/components/ui/icon/ShareIcon.vue';
import HeartIcon from '@/components/ui/icon/HeartIcon.vue';

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
        <CommentIcon class="mr-1" />
        {{ post.comments }}
      </button>
      <button class="flex items-center hover:text-green-500">
        <ShareIcon class="mr-1" />
        {{ post.shares }}
      </button>
      <button class="flex items-center hover:text-red-500">
        <HeartIcon class="mr-1" />
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
