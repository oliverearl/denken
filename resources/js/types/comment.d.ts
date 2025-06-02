import type { User } from './index';

export interface CommentUser {
  name: string;
  avatar: string;
}

export interface Comment {
  id: number;
  user: CommentUser | User;
  content: string;
  timestamp: string;
  likes: number;
}
