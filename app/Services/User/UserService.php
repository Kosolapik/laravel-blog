<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class UserService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $post = Post::firstOrCreate($data);
            if (isset($tag_ids)) {
                $post->tags()->sync($tag_ids);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception->getMessage());
            return $exception->getMessage();
            // abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
            }
            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            if (isset($data['preview'])) {
                $data['preview'] = Storage::disk('public')->put('/images', $data['preview']);
            }
            $post->update($data);
            if (isset($tag_ids)) {
                $post->tags()->sync($tag_ids);
            }
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception->getMessage());
            return $exception->getMessage();
            // abort(500);
        }
        return $post->fresh();
    }
}