<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import AppFooter from '@/components/AppFooter.vue';
import NewsFeed from '@/components/NewsFeed.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Main Content Area -->
            <div class="grid gap-4 md:grid-cols-3">
                <!-- News Feed (Left Column on Desktop) -->
                <div class="md:col-span-2">
                    <NewsFeed />
                </div>

                <!-- Right Sidebar (Desktop Only) -->
                <div class="hidden md:block">
                    <!-- Trending Topics -->
                    <div class="mb-4 rounded-xl bg-white p-4 shadow dark:bg-gray-800">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Trending Topics</h2>
                        <div class="space-y-3">
                            <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-700">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Technology</div>
                                <div class="font-semibold text-gray-900 dark:text-white">New AI Breakthrough</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">24.5K posts</div>
                            </div>
                            <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-700">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Politics</div>
                                <div class="font-semibold text-gray-900 dark:text-white">Global Summit 2023</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">18.3K posts</div>
                            </div>
                            <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-700">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Sports</div>
                                <div class="font-semibold text-gray-900 dark:text-white">Championship Finals</div>
                                <div class="text-sm text-gray-600 dark:text-gray-300">12.7K posts</div>
                            </div>
                        </div>
                    </div>

                    <!-- Who to Follow -->
                    <div class="rounded-xl bg-white p-4 shadow dark:bg-gray-800">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Who to Follow</h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Profile" class="mr-3 h-10 w-10 rounded-full" />
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white">Emma Wilson</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">@emmawilson</div>
                                    </div>
                                </div>
                                <button class="rounded-full bg-gray-900 px-4 py-1 text-sm font-medium text-white hover:bg-gray-800 dark:bg-blue-500 dark:hover:bg-blue-600">
                                    Follow
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Profile" class="mr-3 h-10 w-10 rounded-full" />
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white">Robert Chen</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">@robertchen</div>
                                    </div>
                                </div>
                                <button class="rounded-full bg-gray-900 px-4 py-1 text-sm font-medium text-white hover:bg-gray-800 dark:bg-blue-500 dark:hover:bg-blue-600">
                                    Follow
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Profile" class="mr-3 h-10 w-10 rounded-full" />
                                    <div>
                                        <div class="font-semibold text-gray-900 dark:text-white">Sophia Martinez</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">@sophiam</div>
                                    </div>
                                </div>
                                <button class="rounded-full bg-gray-900 px-4 py-1 text-sm font-medium text-white hover:bg-gray-800 dark:bg-blue-500 dark:hover:bg-blue-600">
                                    Follow
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <AppFooter />
        </div>
    </AppLayout>
</template>
