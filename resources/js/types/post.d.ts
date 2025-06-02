import type { User as BaseUser } from './index';

export interface PostUser extends BaseUser {
  handle: string;
}

export interface NewsArticle {
  title: string;
  source: string;
  url: string;
  image: string;
}

export interface Post {
  id: number;
  user: PostUser;
  content: string;
  newsArticle: NewsArticle;
  timestamp: string;
  likes: number;
  comments: number;
  shares: number;
}
