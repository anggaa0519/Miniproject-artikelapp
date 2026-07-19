<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['title', 'slug', 'content', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation is handled in the controller so we can show
    // custom, per-field error messages in the form views.

    /**
     * Return only articles that are published, newest first.
     */
    public function getPublished()
    {
        return $this->where('status', 'published')
                     ->orderBy('created_at', 'DESC')
                     ->findAll();
    }

    /**
     * Return every article (for the admin list), newest first.
     */
    public function getAll()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    /**
     * Build a unique slug from the article title.
     */
    public function makeSlug(string $title, ?int $ignoreId = null): string
    {
        $base = url_title($title, '-', true);
        $slug = $base;
        $i    = 1;

        $builder = $this->where('slug', $slug);
        if ($ignoreId !== null) {
            $builder->where('id !=', $ignoreId);
        }

        while ($builder->first()) {
            $slug    = $base . '-' . $i;
            $i++;
            $builder = $this->where('slug', $slug);
            if ($ignoreId !== null) {
                $builder->where('id !=', $ignoreId);
            }
        }

        return $slug;
    }
}
