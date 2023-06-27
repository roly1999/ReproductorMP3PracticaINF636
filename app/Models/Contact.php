<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'path'];

    public function deleteImage()
    {
        if ($this->image != "public/images/no_image.png")
            Storage::delete($this->image);
    }
    public function deletePath()
    {
        if ($this->path != "public/musics/no_music.mp3")
            Storage::delete($this->path);
    }

    public function getUrli()
    {
        return Storage::url($this->image);
    }
    public function getUrlp()
    {
        return Storage::url($this->path);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($table) {
            if (!app()->runningInConsole()) {
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
