<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'name',
        'name_zh',
        'slug',
        'short_description',
        'short_description_zh',
        'description',
        'description_zh',
        'specification',
        'specification_zh',
        'price',
        'image',
        'gallery',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Product $product): void {
            if (blank($product->slug) && filled($product->name)) {
                $product->slug = Str::slug($product->name);
            }

            $product->name_zh = self::translateNameToChinese($product->name);
            $product->short_description_zh = self::translateShortDescriptionInputToChinese($product->name, $product->short_description);
            $product->description_zh = self::translateDescriptionInputToChinese($product->name, $product->description);
            $product->specification_zh = self::translateSpecificationInputToChinese($product->name, $product->specification);
        });
    }

    public static function normalizeText(?string $text): string
    {
        $text = mb_strtolower(trim((string) $text));

        $replace = [
            'berisulansi' => 'berinsulasi',
            'berisulasi' => 'berinsulasi',
            'berisolasi' => 'berinsulasi',
            'mereedam' => 'meredam',
            'unutk' => 'untuk',
            'portable' => 'portabel',
        ];

        foreach ($replace as $from => $to) {
            $text = str_replace($from, $to, $text);
        }

        return preg_replace('/\s+/', ' ', $text);
    }

    public static function isRockwoolWallPanelText(?string $name = null, ?string $text = null): bool
    {
        $source = self::normalizeText(($name ?? '') . ' ' . ($text ?? ''));

        return str_contains($source, 'rockwool')
            && (
                str_contains($source, 'dinding')
                || str_contains($source, 'wall')
                || str_contains($source, 'panel')
            );
    }

    public static function translateNameToChinese(?string $name): ?string
    {
        $key = self::normalizeText($name);

        if (self::isRockwoolWallPanelText($name)) {
            return '岩棉保温墙板';
        }

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
            'rumah kontainer bongkar pasang cepat' => '快拼集装箱房',
            'rumah kontainer' => '集装箱房',
            'container house' => '集装箱房',
            'portable panel house' => '活动板房',
            'rockwool' => '岩棉',
            'polyurethane' => '聚氨酯',
            'galvalum' => '镀铝锌',
            'spandek' => '彩钢板',
        ];

        foreach ($map as $id => $zh) {
            if ($key === $id || str_contains($key, $id)) {
                return $zh;
            }
        }

        return null;
    }

    public static function translateShortDescriptionInputToChinese(?string $name, ?string $text): ?string
    {
        if (self::isRockwoolWallPanelText($name, $text)) {
            return '岩棉保温墙板适用于模块化建筑、工业空间、仓库及建筑工程，具有结构坚固、外观整洁、耐热隔音、安装便捷等特点。';
        }

        return self::translateTextToChinese($text);
    }

    public static function translateDescriptionInputToChinese(?string $name, ?string $text): ?string
    {
        if (self::isRockwoolWallPanelText($name, $text)) {
            return "岩棉保温墙板是一种模块化建筑墙体材料，适用于工业厂房、仓库、项目办公室、活动板房、集装箱房及其他建筑项目。\n\n该产品采用金属面板与岩棉芯材结构，具有良好的隔热、耐热、隔音和防火性能，同时能够提升建筑外观的整洁度。\n\n岩棉保温墙板安装方便、施工效率高、维护简单，适合需要快速建设、稳定使用及外观整齐的现代建筑项目。";
        }

        return self::translateTextToChinese($text);
    }

    public static function translateSpecificationInputToChinese(?string $name, ?string $text): ?string
    {
        if (self::isRockwoolWallPanelText($name, $text)) {
            return "尺寸: 可根据项目需求定制\n材料: 金属面板与岩棉芯材\n颜色: 白色、灰色、蓝色或按客户需求定制\n厚度: 可根据项目需求定制\n用途: 模块化建筑墙体、工业空间、仓库、项目办公室及活动板房\n说明: 适合快速安装，外观整洁，具有耐热、隔音、便于维护等特点";
        }

        return self::translateSpecificationToChinese($text);
    }

    public static function translateTextToChinese(?string $text): ?string
    {
        $text = trim((string) $text);

        if ($text === '') {
            return null;
        }

        $key = self::normalizeText($text);

        $exact = [
            'material panel dinding untuk kebutuhan konstruksi modern' => '适用于现代建筑需求的墙板材料。',
            'panel dinding untuk kebutuhan konstruksi modern' => '适用于现代建筑需求的墙板。',
            'cocok untuk kebutuhan dinding bangunan modular' => '适用于模块化建筑墙体需求。',
            'cocok untuk rumah kontainer dan bangunan portabel' => '适用于集装箱房和活动建筑。',
            'mudah dipasang dan efisien untuk proyek' => '安装方便，适用于高效项目施工。',
            'material ringan dan kuat untuk kebutuhan proyek' => '轻质坚固，适用于项目工程需求。',
        ];

        if (isset($exact[$key])) {
            return $exact[$key];
        }

        $replace = [
            'panel dinding berinsulasi rockwool' => '岩棉保温墙板',
            'panel dinding' => '墙板',
            'dinding' => '墙体',
            'rockwool' => '岩棉',
            'lapisan panel metal' => '金属面板',
            'inti rockwool' => '岩棉芯材',
            'ketahanan panas' => '耐热性能',
            'tahan panas' => '耐热',
            'meredam suara' => '隔音',
            'bangunan modular' => '模块化建筑',
            'ruang industri' => '工业空间',
            'gudang' => '仓库',
            'kantor proyek' => '项目办公室',
            'rumah panel' => '活动板房',
            'bangunan portabel' => '便携式建筑',
            'bangunan permanen' => '永久性建筑',
            'bangunan sementara' => '临时性建筑',
            'konstruksi modern' => '现代建筑',
            'proyek konstruksi' => '建筑工程',
            'material kuat' => '坚固材料',
            'rapi' => '整洁',
            'pemasangan cepat' => '快速安装',
            'efisien' => '高效',
            'mudah dirawat' => '便于维护',
            'digunakan sebagai' => '用作',
            'digunakan untuk' => '用于',
            'produk ini' => '该产品',
            'sistem panel ini' => '该板材系统',
            'panel ini' => '该墙板',
            'cocok untuk' => '适用于',
            'kebutuhan proyek' => '项目需求',
            'berbagai kebutuhan' => '多种需求',
            'membutuhkan' => '需要',
            'membantu meningkatkan' => '有助于提高',
            'memberikan' => '提供',
            'tampilan bangunan yang lebih rapi' => '建筑外观更加整洁',
            'modern' => '现代',
            'bangunan' => '建筑',
            'modular' => '模块化',
            'proyek' => '项目',
            'material' => '材料',
            'untuk' => '用于',
            'dengan' => '采用',
            'dan' => '和',
            'serta' => '以及',
            'lebih' => '更加',
        ];

        $result = $text;

        foreach ($replace as $id => $zh) {
            $result = str_ireplace($id, $zh, $result);
        }

        $result = trim(preg_replace('/\s+/', ' ', $result));

        return $result !== $text ? $result : null;
    }

    public static function translateSpecificationToChinese(?string $text): ?string
    {
        $text = trim((string) $text);

        if ($text === '') {
            return null;
        }

        $lines = preg_split('/\r\n|\r|\n/', $text);
        $translated = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === '') {
                $translated[] = '';
                continue;
            }

            if (str_contains($line, ':')) {
                [$label, $value] = array_pad(explode(':', $line, 2), 2, '');
                $translated[] = self::translateSpecificationLabel($label) . ': ' . (self::translateSpecificationValue($value) ?: trim($value));
                continue;
            }

            $translated[] = self::translateTextToChinese($line) ?: $line;
        }

        return trim(implode("\n", $translated));
    }

    public static function translateSpecificationLabel(?string $label): string
    {
        $key = self::normalizeText($label);

        return [
            'ukuran' => '尺寸',
            'material' => '材料',
            'bahan' => '材质',
            'warna' => '颜色',
            'ketebalan' => '厚度',
            'panjang' => '长度',
            'lebar' => '宽度',
            'tinggi' => '高度',
            'berat' => '重量',
            'keterangan' => '说明',
            'fungsi' => '用途',
            'aplikasi' => '应用',
            'tipe' => '类型',
            'model' => '型号',
        ][$key] ?? trim((string) $label);
    }

    public static function translateSpecificationValue(?string $value): ?string
    {
        $key = self::normalizeText($value);

        $map = [
            'dapat disesuaikan dengan kebutuhan proyek' => '可根据项目需求定制',
            'menyesuaikan kebutuhan proyek' => '可根据项目需求定制',
            'panel metal dengan inti rockwool' => '金属面板与岩棉芯材',
            'putih, abu-abu, biru, atau sesuai permintaan' => '白色、灰色、蓝色或按客户需求定制',
            'dinding bangunan modular, ruang industri, gudang, kantor proyek, dan rumah panel' => '模块化建筑墙体、工业空间、仓库、项目办公室及活动板房',
            'cocok untuk pemasangan cepat, rapi, tahan panas, dan mudah dirawat' => '适合快速安装，外观整洁，具有耐热、便于维护等特点',
        ];

        return $map[$key] ?? self::translateTextToChinese($value);
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name_zh
            ? $this->name . ' / ' . $this->name_zh
            : $this->name;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return str_starts_with($this->image, 'http')
                ? $this->image
                : asset('storage/' . $this->image);
        }

        return asset('images/product-placeholder.svg');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
