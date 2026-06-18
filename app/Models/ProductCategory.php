<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_zh',
        'slug',
        'description',
        'icon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (ProductCategory $category): void {
            if (blank($category->slug) && filled($category->name)) {
                $category->slug = Str::slug($category->name);
            }

            if (filled($category->name)) {
                $category->name_zh = self::translateNameToChinese($category->name);
            }
        });
    }

    public static function translateNameToChinese(?string $name): ?string
    {
        $key = mb_strtolower(trim((string) $name));

        $map = [
            'dinding' => '墙体',
            'atap' => '屋顶',
            'lantai' => '地板',
            'pintu' => '门',
            'jendela' => '窗户',
            'panel' => '板材',
            'aksesoris' => '配件',
            'clean board' => '洁净板',
            'ubin baja warna' => '彩钢瓦',
            'ubin resin' => '树脂瓦',
            'ubin pvc' => 'PVC瓦',
            'rumah panel portabel' => '活动板房',
            'rumah kontainer' => '集装箱房',
            'container house' => '集装箱房',
            'portable panel house' => '活动板房',
            'baja ringan' => '轻钢',
            'plafon' => '天花板',
            'kaca' => '玻璃',
            'keramik' => '瓷砖',
            'cat' => '油漆',
            'pipa' => '管材',
            'sanitair' => '卫浴',
            'semen' => '水泥',
            'pasir' => '沙子',
            'bata' => '砖',
            'kanopi' => '雨棚',
        ];

        return $map[$key] ?? null;
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name_zh
            ? $this->name . ' / ' . $this->name_zh
            : $this->name;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
