<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

//datos que permitimos rellenar
    protected $fillable = [
        "user_id", "category_id", "title", "content",
    ];
//para la paginación, cuantos mostraremos por página
//método paginate
    protected $perPage = 5;

// método de Laravel que se ejecuta cuando se instancia un modelo
    protected static function boot()
    {
        parent::boot();
//callback que recupera el id del autor y lo
// relaciona con el user_id=> no es un campo rellenable
// se rellena automáticamente con el id del usuario identificado
        //Sólo se ejecutará si no estamos lanzando una operación desde consola,
        //porque no tenemos el usuario identificado
        if(!app()->runningInConsole()) {
            self::creating(function (Article $article) {
                $article->user_id = auth()->id();
            });
        }
    }
//relación 1 a muchos, para saber a qué usaurio pertenece el artículo
//
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

//relación 1 a muchos, a qué categoría pertence el artículo
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
//poner la hora en formato legible para nosotros
//carbon librería para trabajar con fechas
    public function getCreatedAtFormattedAttribute(): string
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }

    //accesor para obtener un extracto del contenido del artículo
    public function getExcerptAttribute(): string
    {
        return Str::excerpt($this->content);
    }
}
